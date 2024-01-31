// router.js
import { createRouter, createWebHistory } from 'vue-router'
import AuthLayout from '../layout/AuthLayout.vue'
import DefaultLayout from '../layout/DefaultLayout.vue'

import RegisterPage from '../views/RegisterPage.vue'
import LoginPage from '../views/LoginPage.vue'

import HomePage from '@/views/HomePage.vue'
import CinemaPage from '@/views/CinemaPage.vue'
import DetailMoviePage from '@/views/DetailMoviePage.vue'
import BookingTicketPage from '@/views/BookingTicketPage.vue'
import SeatsPage from '@/views/SeatsPage.vue'
import ReservationPage from '@/views/ReservationPage.vue'
import SearchPage from '@/views/SearchPage.vue'



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
        path: "movies/:id/detail",
        name: "Detail Movie",
        component: DetailMoviePage,
      },
      {
        path: "cinemas/:id",
        name: "Infomation Cinema",
        component: CinemaPage,
      },
      {
        path: "ticketing",
        name: "Booking Ticket",
        component: BookingTicketPage,
      },
      {
        path: "showtime/:id/seats",
        name: "Seats in Showtime",
        component: SeatsPage,
      },
      {
        path: "reservations",
        name: "All Reservation",
        component: ReservationPage,
      },
      {
        path: "search",
        name: "Search Movie",
        component: SearchPage,
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
  routes,
  scrollBehavior() {
    return { x: 0, y: 0 };
  },
})

export default router