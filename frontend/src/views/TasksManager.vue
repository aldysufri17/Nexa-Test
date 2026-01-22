<template>
    <div class="container mt-4">
        <div class="d-flex justify-content-between mb-3">
            <h3>Task Manager</h3>
            <button class="btn btn-outline-danger">Logout</button>
        </div>

        <div class="card p-3 mb-4">
            <div class="row g-2">
                <div class="col">
                    <input class="form-control" placeholder="Judul" v-model="form.title" />
                </div>
                <div class="col">
                    <select class="form-select" v-model="form.status">
                        <option value="todo">To Do</option>
                        <option value="progress">On Progress</option>
                        <option value="done">Done</option>
                    </select>
                </div>
                <div class="col">
                    <input type="date" class="form-control" v-model="form.deadline" />
                </div>
                <div class="col">
                    <button class="btn w-100" :class="isEdit ? 'btn-warning' : 'btn-primary'"
                        @click="isEdit ? updateTask() : saveTask()">
                        {{ isEdit ? 'Update' : 'Tambah' }}
                    </button>
                </div>
            </div>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Deadline</th>
                    <th width="160">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(task, index) in tasks" :key="task.id">
                    <td width="5%">{{ index + 1 }}</td>
                    <td>{{ task.title }}</td>
                    <td>{{ task.status }}</td>
                    <td>{{ task.deadline }}</td>
                    <td>
                        <button
                            class="btn btn-sm btn-warning me-2"
                            @click="editTask(task)"
                        >
                            Edit
                        </button>

                        <button
                            v-if="!isEdit"
                            class="btn btn-sm btn-danger"
                            @click="deleteTask(task.id)"
                        >
                            Hapus
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script setup>
    import axios from 'axios'
    import { ref, onMounted } from 'vue'

    const api = axios.create({
        baseURL: 'http://127.0.0.1:8099/api',
    })

    api.interceptors.request.use(config => {
        const token = localStorage.getItem('token')
        if (token) {
            config.headers.Authorization = `Bearer ${token}`
        }
        return config
    })

    const tasks = ref([])

    const form = ref({
        title: '',
        status: 'todo',
        deadline: ''
    })

    const isEdit = ref(false)
    const editId = ref(null)

    const loadTasks = async () => {
        const params = {}
        const res = await api.get('/tasks', { params })
        tasks.value = res.data
    }

    const saveTask = async () => {
        await api.post('/tasks', form.value)
        resetForm()
        loadTasks()
    }

    const editTask = (task) => {
        isEdit.value = true
        editId.value = task.id

        form.value = {
            title: task.title,
            status: task.status,
            deadline: task.deadline
        }
    }

    const updateTask = async () => {
        await api.put(`/tasks/${editId.value}`, form.value)
        resetForm()
        loadTasks()
    }

    const deleteTask = async (id) => {
        await api.delete(`/tasks/${id}`)
        loadTasks()
    }

    const resetForm = () => {
        form.value = { title: '', status: 'todo', deadline: '' }
        isEdit.value = false
        editId.value = null
    }

    onMounted(() => {
        loadTasks()
    })
</script>
