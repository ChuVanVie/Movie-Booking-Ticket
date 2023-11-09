<script setup>
    import {  reactive  } from 'vue'
    import Flicking from "@egjs/vue3-flicking";
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
    ]);


</script>
<template>
    <div id="homepage">
        <Flicking :options="{ align: 'prev', circular: true, moveType: 'strict', panelsPerView: 1 }" :plugins="plugins" id="slideshow">
            <!-- <div v-for="(item, index) in items" :key="index" style="width: 60%; margin: 0 16px;"> -->
            <div v-for="(item, index) in items" :key="index" class="slide-container">
                <img :src="item.image" :alt="item.caption" style="">
            </div>
            <template #viewport>
                <div class="flicking-pagination"></div>
            </template>
        </Flicking>
        <div id="home-content">
            <div class="film-btn-container">
                <button class="film-btn film-btn-active">Phim đang chiếu</button>
                <button class="film-btn">Phim sắp chiếu</button>
            </div>
            <div class="films-list">

            </div>
        </div>
    </div>
</template>

<style scoped>
    #homepage {
        height: 1800px;
        padding: 24px 200px;
    }

    #slideshow .slide-container {
        display: flex;
        justify-content: center;
    }

    #slideshow .slide-container img {
        width: 70%;
        height: 480px;
        border-radius: 8px;
        cursor: pointer;
    }

    #home-content {
        padding: 24px;
    }

    #home-content .film-btn-container {
        display: flex;
        justify-content: center;
        gap: 8px;
    }

    .film-btn-container .film-btn {
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
    }

    .film-btn-container .film-btn-active {
        background: #231f20 ;
        color: #cdc197;
        font-weight: bold;
    }
    
</style>