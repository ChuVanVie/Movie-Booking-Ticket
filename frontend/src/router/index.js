// router.js
import { createRouter, createWebHistory } from 'vue-router'
import DefaultLayout from '../layout/DefaultLayout.vue'
import HomePage from '../views/HomePage.vue'

import AuthLayout from '../layout/AuthLayout.vue'
import RegisterPage from '../views/RegisterPage.vue'
import LoginPage from '../views/LoginPage.vue'

const routes = [
  {
    path: '/',
    component: DefaultLayout,
    children: [
      {
        path: "",
        name: "Home",
        component: HomePage,
      },
    ],
  },
  {
    path: "/auth",
    component: AuthLayout,
    children: [
      {
        path: "register",
        name: "Register",
        component: RegisterPage,
      },
      {
        path: "login",
        name: "Login",
        component: LoginPage,
      },
    ],
  },
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router