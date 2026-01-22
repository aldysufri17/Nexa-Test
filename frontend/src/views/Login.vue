<template>
    <div class="container mt-5" style="max-width:400px">
        <h3 class="mb-3 text-center">Login</h3>

        <div class="card p-4">
            <div class="mb-3">
                <label>Email</label>
                <input type="email" class="form-control" v-model="form.email" />
            </div>

            <div class="mb-3">
                <label>Password</label>
                <input type="password" class="form-control" v-model="form.password" />
            </div>

            <button class="btn btn-primary w-100" @click="login">Login</button>

            <p v-if="error" class="text-danger mt-3">{{ error }}</p>
        </div>
    </div>
</template>

<script setup>
    import axios from 'axios'
    import { ref } from 'vue'

    const form = ref({
        email: '',
        password: ''
    })

    const api = axios.create({
        baseURL: 'http://127.0.0.1:8099/api',
    })

    const error = ref('')

    const login = async () => {
        try {
            const res = await api.post('/login', form.value)

            localStorage.setItem('token', res.data.access_token)
        } catch (err) {
            error.value = 'Login gagal, email atau password salah'
        }
    }
</script>