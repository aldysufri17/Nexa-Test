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
        component: TasksManager,
        meta: { requiresAuth: true }
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

router.beforeEach((to, from, next) => {
    if (to.meta.requiresAuth) {
        const token = localStorage.getItem('token')
        if (!token) {
            next('/login')
        } else {
            next()
        }
    } else {
        next()
    }
})

export default router