<template>
    <div class="container mt-5" style="max-width:400px">
        <h3 class="mb-3 text-center">Login</h3>

        <div class="card p-4">
            <form @submit.prevent="login">
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" class="form-control" v-model="form.email" />
                </div>
    
                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" class="form-control" v-model="form.password" />
                </div>
    
                <button type="submit" class="btn btn-primary w-100">Login</button>
    
                <p v-if="error" class="text-danger mt-3">{{ error }}</p>
            </form>
        </div>
    </div>
</template>

<script setup>
    import { ref } from 'vue'
    import api from '../api';
    import { useRouter } from 'vue-router'

    const router = useRouter()

    const form = ref({
        email: '',
        password: ''
    })

    const error = ref('')

    const login = async () => {
        try {
            const res = await api.post('/login', form.value)

            localStorage.setItem('token', res.data.access_token)

            router.push('/task')
        } catch (err) {
            error.value = 'Login gagal, email atau password salah'
        }
    }
</script>