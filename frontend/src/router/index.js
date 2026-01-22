import { createRouter,createWebHistory } from 'vue-router'
import Login from '../views/Login.vue'
import TasksManager from '../views/TasksManager.vue'

const routes = [
    {
        path: '/login',
        component: Login
    },
    {
        path: '/task',
        component: TasksManager
    },
    {
        path: '/',
        redirect: '/login'
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router