<script setup>
import { reactive } from 'vue'
import Flicking from "@egjs/vue3-flicking";
import ThumbnailMovie from "@/components/ThumbnailMovie.vue";
import { AutoPlay, Pagination } from "@egjs/flicking-plugins";
import "@egjs/vue3-flicking/dist/flicking.css";
import "@egjs/flicking-plugins/dist/pagination.css";

const plugins = [new AutoPlay({ duration: 2000, direction: "NEXT", stopOnHover: false }), new Pagination({ type: 'bullet' })];

const items = reactive([
    {
        image: "https://img.ophim9.cc/uploads/movies/dai-chien-nguoi-khong-lo-phan-cuoi-poster.jpg",
        caption: "Đại Chiến Người Khổng Lồ (Phần Cuối)",
    },
    {
        image: "https://img.ophim9.cc/uploads/movies/tet-o-lang-dia-nguc-poster.jpg",
        caption: "Tết ở làng địa ngục",
    },
    {
        image: "https://img.ophim9.cc/uploads/movies/high-cookie-poster.jpg",
        caption: "Bánh Quy Ma Thuật",
    },
    {
        image: "https://img.ophim9.cc/uploads/movies/mau-va-co-vat-phan-2-poster.jpg",
        caption: "Máu và Cổ Vật (Phần 2)",
    },
    {
        image: "https://img.ophim9.cc/uploads/movies/tho-san-ac-linh-poster.jpg",
        caption: "Thợ săn ác linh",
    },
    {
        image: "https://img.ophim9.cc/uploads/movies/dang-sau-ke-phan-dien-poster.jpg",
        caption: "Đằng Sau Kẻ Phản Diện",
    },
]);


</script>
<template>
    <div id="homepage">
        <Flicking :options="{ align: 'prev', circular: true, moveType: 'strict', panelsPerView: 1 }" :plugins="plugins"
            id="slideshow">
            <!-- <div v-for="(item, index) in items" :key="index" style="width: 60%; margin: 0 16px;"> -->
            <div v-for="(item, index) in items" :key="index" class="slide-container">
                <img :src="item.image" :alt="item.caption" style="">
            </div>
            <template #viewport>
                <div class="flicking-pagination"></div>
            </template>
        </Flicking>
        <div id="home-content">
            <div class="movie-btn-container">
                <button class="movie-btn movie-btn-active">Phim đang chiếu</button>
                <button class="movie-btn">Phim sắp chiếu</button>
            </div>
            <div class="movies-list">
                <div class="movies-row">
                    <ThumbnailMovie></ThumbnailMovie>
                    <ThumbnailMovie></ThumbnailMovie>
                    <ThumbnailMovie></ThumbnailMovie>
                    <ThumbnailMovie></ThumbnailMovie>
                </div>
                <div class="movies-row">
                    <ThumbnailMovie></ThumbnailMovie>
                    <ThumbnailMovie></ThumbnailMovie>
                    <ThumbnailMovie></ThumbnailMovie>
                    <ThumbnailMovie></ThumbnailMovie>
                </div>
                <div class="movies-row">
                    <ThumbnailMovie></ThumbnailMovie>
                    <ThumbnailMovie></ThumbnailMovie>
                </div>
                <div class="btn-more">
                    <button>Xem Thêm ...</button>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
#homepage {
    height: auto;
    padding: 24px 250px 120px 250px;
}

#slideshow .slide-container {
    display: flex;
    justify-content: center;
}

#slideshow .slide-container img {
    width: 100%;
    height: 480px;
    border-radius: 8px;
    cursor: pointer;
}

#home-content {
    padding: 24px;
}

#home-content .movie-btn-container {
    display: flex;
    justify-content: center;
    gap: 8px;
    margin: 36px 0;
}

.movie-btn-container .movie-btn {
    display: block;
    width: 175px;
    height: 50px;
    margin-left: 1px;
    border: none;
    background: #efebdb;
    color: #6f6247;
    font-size: 16px;
    line-height: 50px;
    text-align: center;
    cursor: pointer;
}

.movie-btn-container .movie-btn-active {
    background: #231f20;
    color: #cdc197;
    font-weight: bold;
}

.movies-list .movies-row {
    display: flex;
    justify-content: center;
    gap: 48px;
    margin-bottom: 36px;
}

.movies-list .btn-more {
    display: flex;
    justify-content: center;
}

.movies-list .btn-more button {
    background-color: #f3f3f3;
    padding: 8px 16px;
    border-radius: 4px;
    border: 1px solid #d5d5d5;
    cursor: pointer;
}

.movies-list .btn-more button:hover {
    color: #fff;
    background-color: rgb(108, 142, 173);
}
</style>