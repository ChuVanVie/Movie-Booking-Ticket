<script setup>
import { reactive } from 'vue';
import { useRouter } from 'vue-router';
import { useAuthStore } from "../store/useAuth";
import { allCinema, allCategory, allCountry } from "../helper/resource";
import SearchCard from './SearchCard.vue';

const router = useRouter();
const authStore = useAuthStore();

// Handle Logout
const handleLogout = () => {
    authStore.isLoggedIn = false;
    authStore.logout({ token: authStore.accessToken });
    router.push("/");
};

const filmType = reactive([
    'Phim đang chiếu',
    'Phim sắp chiếu'
]);

</script>
<template lang="">
    <div id="header">
        <router-link to="/">
            <img src="../assets/img/teeiv-cinema-logo.png" alt="Logo" width="140" height="60" style="cursor: pointer">
        </router-link>
        <SearchCard/>
        <div class="flex gap-24">
            <div class="dropdown">
                <p>Phim</p>
                <div class="dropdown-menu">
                    <div class="dropdown-item" v-for="item in filmType" :key="item">
                        <router-link :to="'/'" class="text">{{ item }}</router-link>
                    </div>
                </div>
            </div>
            <div class="dropdown">
                <p>Rạp</p>
                <div class="dropdown-menu">
                    <div class="dropdown-item" v-for="cinema in allCinema" :key="cinema.id">
                        <router-link :to="'/cinemas/' + cinema.id" class="text">{{ cinema.cinema_name }}</router-link>
                    </div>
                </div>
            </div>
            <div class="dropdown">
                <p>Thể Loại</p>
                <div class="dropdown-menu">
                    <div class="dropdown-item" v-for="category in allCategory" :key="category.id">
                        <router-link :to="'/search?name=&category=' + category.slug + '&country='" class="text">{{ category.category_name }}</router-link>
                    </div>
                </div>
            </div>
            <div class="dropdown">
                <p>Quốc Gia</p>
                <div class="dropdown-menu">
                    <div class="dropdown-item" v-for="country in allCountry" :key="country.id">
                        <router-link :to="'/search?name=&category=&country=' + country.slug" class="text">{{ country.country_name }}</router-link>
                    </div>
                </div>
            </div>
            <p style="font-size: 18px; font-weight: 600; cursor: pointer;" @click="router.push('/ticketing')">Đặt vé</p>
        </div>
        <div class="home-user" v-if="authStore?.isLoggedIn">
            <p>{{ authStore?.userLogin?.name }}</p>
            <div class="auth" @click="handleLogout">Đăng xuất</div>
        </div>
        <div class="home-user" v-else>
            <router-link to="/auth/login" class="auth">Đăng nhập</router-link>
            <router-link to="/auth/register" class="auth">Đăng kí</router-link>
        </div>
        
    </div>
</template>

<style scoped>
#header {
    height: 80px;
    background-color: antiquewhite;
    /* background: linear-gradient(90deg, rgb(0, 45, 255) 0%, rgb(0, 188, 212) 47%, rgb(0, 188, 212) 48%, rgb(130, 238, 198) 100%); */
    padding: 8px;
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 64px;
    box-shadow: 0px 1px 2px 0px #bbb;
    position: sticky;
    top: 0;
    z-index: 12;
    /* backdrop-filter: blur(10px); */
}

.dropdown {
    position: relative;
}

.dropdown p {
    font-size: 18px;
    font-weight: 600;
    cursor: pointer;
}

.dropdown .dropdown-menu {
    position: absolute;
    left: -50%;
    z-index: 1;
    display: none;
    margin-top: 2px;
    background-color: #f9f9f9;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);

}

.dropdown:hover .dropdown-menu {
    display: block;
}

.dropdown-menu .dropdown-item {
    width: 130px;
    padding: 8px 12px;
}

.dropdown .text {
    color: #000;
    text-decoration: none;
}

.dropdown .text:hover {
    color: #337ab7;
}

.home-user {
    display: flex;
    align-items: center;
    gap: 20px;
}

.home-user .auth {
    font-size: 16px;
    color: #000;
    text-decoration: none;
    cursor: pointer;
}

.home-user .auth:hover {
    color: #337ab7;
    text-decoration: underline;
}
</style>