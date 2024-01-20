<script setup>
import { reactive } from 'vue';
import { useRouter } from 'vue-router';
import SearchCard from './SearchCard.vue';

const router = useRouter();

const allCinema = reactive([
    {
        id: 1,
        cinemaName: 'Rạp Hà Nội',
    },
    {
        id: 2,
        cinemaName: 'Rạp Hải Phòng',
    },
    {
        id: 3,
        cinemaName: 'Rạp Vĩnh Phúc',
    },
    {
        id: 4,
        cinemaName: 'Rạp Phú Thọ',
    },
]);

const allCategory = reactive([
    {
        id: 1,
        categoryName: 'Tình Cảm',
        slug: 'tinh-cam'
    },
    {
        id: 2,
        categoryName: 'Tâm Lý',
        slug: 'tam-ly'
    },
    {
        id: 3,
        categoryName: 'Hành Động',
        slug: 'hanh-dong'
    },
    {
        id: 4,
        categoryName: 'Kinh Dị',
        slug: 'kinh-di'
    },
    {
        id: 5,
        categoryName: 'Phiêu Lưu',
        slug: 'phieu-luu'
    },
    {
        id: 6,
        categoryName: 'Hình Sự',
        slug: 'hinh-su'
    },
    {
        id: 7,
        categoryName: 'Bí Ẩn',
        slug: 'bi-an'
    },
    {
        id: 8,
        categoryName: 'Chính Kịch',
        slug: 'chinh-kich'
    },
    {
        id: 9,
        categoryName: 'Khoa Học',
        slug: 'khoa-hoc'
    },
    {
        id: 10,
        categoryName: 'Viễn Tưởng',
        slug: 'vien-tuong'
    },
]);

const allCountry = reactive([
    {
        id: 1,
        countryName: 'Hàn Quốc',
        slug: 'han-quoc'
    },
    {
        id: 2,
        countryName: 'Trung Quốc',
        slug: 'trung-quoc'
    },
    {
        id: 3,
        countryName: 'Canada',
        slug: 'canada'
    },
    {
        id: 4,
        countryName: 'Âu Mỹ',
        slug: 'au-my'
    },
    {
        id: 5,
        countryName: 'Thổ Nhĩ Kỳ',
        slug: 'tho-nhi-ky'
    },
    {
        id: 6,
        countryName: 'Việt Nam',
        slug: 'viet-nam'
    },
    {
        id: 7,
        countryName: 'Nhật Bản',
        slug: 'nhat-ban'
    },
]);

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
                        <router-link :to="'/cinemas/' + cinema.id" class="text">{{ cinema.cinemaName }}</router-link>
                    </div>
                </div>
            </div>
            <div class="dropdown">
                <p>Thể Loại</p>
                <div class="dropdown-menu">
                    <div class="dropdown-item" v-for="category in allCategory" :key="category.id">
                        <router-link :to="'/search?category=' + category.slug" class="text">{{ category.categoryName }}</router-link>
                    </div>
                </div>
            </div>
            <div class="dropdown">
                <p>Quốc Gia</p>
                <div class="dropdown-menu">
                    <div class="dropdown-item" v-for="country in allCountry" :key="country.id">
                        <router-link :to="'/search?country=' + country.slug" class="text">{{ country.countryName }}</router-link>
                    </div>
                </div>
            </div>
            <p style="font-size: 18px; font-weight: 600; cursor: pointer;" @click="router.push('/ticketing')">Đặt vé</p>
        </div>
        <div class="home-user">
            <!-- <font-awesome-icon icon="fa-solid fa-user" /> -->
            <span>
                <router-link to="/auth/login" class="auth">Đăng nhập</router-link>
            </span>
            <span> / </span> 
            <span>
                <router-link to="/auth/register" class="auth">Đăng kí</router-link>
            </span>
        </div>
        
    </div>
</template>

<style scoped>
#header {
    height: 80px;
    background-color: antiquewhite;
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
    width: 120px;
    padding: 8px 12px;
}

.dropdown .text {
    color: #000;
    text-decoration: none;
}

.dropdown .text:hover {
    color: #337ab7;
}

.home-user span .auth{
    font-size: 16px;
    color: #000;
    text-decoration: none;
}

.home-user span .auth:hover {
    color: #337ab7;
    text-decoration: underline;
}

</style>