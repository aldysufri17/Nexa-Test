<template>
    <div class="container mt-5" style="max-width:400px">
        <h3 class="mb-3 text-center">Register</h3>

        <div class="card p-4">
            <form @submit.prevent="register">
                <div class="mb-3">
                    <label>Name</label>
                    <input type="text" class="form-control" v-model="form.name" />
                </div>

                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" class="form-control" v-model="form.email" />
                </div>

                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" class="form-control" v-model="form.password" />
                </div>

                <button type="submit" class="btn btn-success w-100">
                    Register
                </button>

                <div class="text-center mt-3">
                    <small>
                        Sudah punya akun?
                        <router-link to="/login">Login</router-link>
                    </small>
                </div>

                <p v-if="error" class="text-danger mt-3 text-center">
                    {{ error }}
                </p>
            </form>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue'
import { useRouter } from 'vue-router'
import api from '../api'

const router = useRouter()

const form = ref({
    name: '',
    email: '',
    password: ''
})

const error = ref('')

const register = async () => {
    try {
        await api.post('/register', form.value)

        alert('Register success, please login')
        router.push('/login')
    } catch (err) {
        error.value = 'Register failed, please check your data'
    }
}
</script>
