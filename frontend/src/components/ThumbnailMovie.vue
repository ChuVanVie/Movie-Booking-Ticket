<script setup>
import { reactive } from 'vue'

const movie = reactive(
    {
        movie_name: "Đại Chiến Người Khổng Lồ (Phần Cuối)",
        slug: "dai-chien-nguoi-khong-lo-phan-cuoi",
        thumb_url: "https://img.ophim9.cc/uploads/movies/dai-chien-nguoi-khong-lo-phan-cuoi-poster.jpg",
        duration: "60 phút",
        rating: 8.7,
        showtime: "12/12/2023",
        caption: "Đại Chiến Người Khổng Lồ (Phần Cuối)",
    },
);

</script>
<template>
    <div class="thumbnail-container">
        <div class="thumb-box">
            <span class="movie-rating">1</span>
            <span class="movie-img">
                <img :src="movie.thumb_url" alt="">
            </span>
        </div>
        <div class="layer-hover">
            <a href="">Đặt vé</a>
            <a href="">Chi tiết</a>
        </div>
        <div class="text-box">
            <div class="movie-name">
                <a href="">{{ movie.movie_name }}</a>
            </div>
            <div class="movie-info">
                <div>
                    <span>{{ movie.duration }}</span>
                    <span>{{ movie.showtime }}</span>
                </div>
                <div class="rating">
                    <b>{{ movie.rating }}</b>
                    <font-awesome-icon icon="fa-solid fa-star" style=" color: #ffff00; margin-left: 4px;" />
                </div>
            </div>
        </div>
    </div>
</template>
<style scoped>
.thumbnail-container {
    width: 230px;
    height: auto;
    border: 1px solid #d6d6d6;
}

.thumb-box {
    position: relative;
}

.thumb-box .movie-rating {
    position: absolute;
    left: 0;
    bottom: 0;
    z-index: 11;
    display: block;
    width: 100%;
    height: 49px;
    /* background: url(/LCHS/Image/Bg/bg_w_mk.png) repeat-y left bottom; */
    font-size: 28px;
    color: #fff;
    font-family: 'linlivertine';
    font-weight: bold;
    padding: 5px 0 0 20px;
    font-style: italic;
    line-height: 45px;
    /* box-sizing: border-box; */
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    text-align: left;
}

.thumb-box .movie-img img {
    width: 100%;
    height: 330px;
}

.text-box .movie-name {
    padding: 12px 15px 11px 15px;
}

.text-box .movie-name a {
    font-size: 18px;
    line-height: 20px;
    overflow: hidden;
    display: block;
    width: 100%;
    white-space: nowrap;
    text-overflow: ellipsis;
    text-decoration: none;
    color: #231f20;
    font-weight: bold;
}

.text-box .movie-info {
    padding: 8px 16px;
    border-top: 1px solid #d6d6d6;
    display: flex;
    justify-content: space-between;
}
</style>