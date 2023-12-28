// router.js
import { createRouter, createWebHistory } from 'vue-router'
import AuthLayout from '../layout/AuthLayout.vue'
import DefaultLayout from '../layout/DefaultLayout.vue'

import RegisterPage from '../views/RegisterPage.vue'
import LoginPage from '../views/LoginPage.vue'

import HomePage from '../views/HomePage.vue'
import DetailMoviePage from '@/views/DetailMoviePage.vue'



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
      {
        path: "/movies/:id/detail",
        name: "Detail Movie",
        component: DetailMoviePage,
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