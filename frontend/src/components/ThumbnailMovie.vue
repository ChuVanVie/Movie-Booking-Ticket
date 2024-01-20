<script setup>
import { reactive } from 'vue'

const movie = reactive(
    {
        id: 1,
        movie_name: "Đại Chiến Người Khổng Lồ (Phần Cuối)",
        slug: "dai-chien-nguoi-khong-lo-phan-cuoi",
        thumb_url: "https://img.ophim10.cc/uploads/movies/dai-chien-nguoi-khong-lo-phan-cuoi-thumb.jpg",
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
            <div class="overlay">
                <router-link to="/ticketing">
                    <button>Đặt vé</button>
                </router-link>
                <router-link :to="'/movies/' + movie.id + '/detail'">
                    <button>Chi tiết</button>
                </router-link>
            </div>
        </div>
        <div class="text-box">
            <div class="movie-name">
                <router-link :to="'/movies/' + movie.id + '/detail'">{{ movie.movie_name }}</router-link>
            </div>
            <div class="movie-info">
                <div class="time">
                    <span>{{ movie.duration }}</span>
                    <div style="height: 16px; margin: 0 4px; border: 1px solid #c5c5c5;"></div>
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
    position: relative;
}

.thumb-box {
    position: relative;
}

.thumb-box .movie-rating {
    position: absolute;
    left: 0;
    bottom: 0;
    z-index: 2;
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

.thumb-box .overlay {
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.7);
    position: absolute;
    top: 0;
    left: 0;
    z-index: 5;
    display: none;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 16px;
}

.thumb-box:hover .overlay {
    display: flex;
}

.overlay button {
    width: 180px;
    height: 50px;
    border: 1px solid #c0b687;
    color: #c0b687;
    background-color: rgba(0, 0, 0, 0.5);
    text-align: center;
    font-size: 16px;
    font-weight: bold;
    line-height: 50px;
    cursor: pointer;
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
    padding: 8px;
    border-top: 1px solid #d6d6d6;
    display: flex;
    justify-content: space-between;
}

.movie-info .time {
    display: flex;
    align-items: center;
}
</style>