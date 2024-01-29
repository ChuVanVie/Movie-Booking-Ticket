<script setup>
import { defineProps } from 'vue'
import { useRouter } from "vue-router";
import { useMovieStore } from "../store/useMovie"
import { formatDate } from "../helper/formatDateTime";

const router = useRouter();
const movieStore = useMovieStore();

const props = defineProps({
    movie: Object,
});

const handleBooking = (movie) => {
    movieStore.setMovieData({ movieId: movie.id, movieName: movie.movie_name });
    router.push({ path: '/ticketing' });
}

</script>
<template>
    <div class="thumbnail-container">
        <div class="thumb-box">
            <span class="movie-rating">1</span>
            <span class="movie-img">
                <img :src="props.movie.thumb_url" alt="">
            </span>
            <div class="overlay">
                <div @click="handleBooking(props.movie)">
                    <button>Đặt vé</button>
                </div>
                <router-link :to="{ name: 'Detail Movie', params: { id: props.movie.id }, }">
                    <button>Chi tiết</button>
                </router-link>
            </div>
        </div>
        <div class="text-box">
            <div class="movie-name">
                <router-link :to="'/movies/' + props.movie.id + '/detail'">{{ props.movie.movie_name
                }}</router-link>
            </div>
            <div class="movie-info">
                <div class="time">
                    <span>{{ props.movie.duration }}</span>
                    <div style="height: 16px; margin: 0 4px; border: 1px solid #c5c5c5;"></div>
                    <span>{{ formatDate(props.movie.premiere_date) }}</span>
                </div>
                <div class="rating">
                    <b>{{ props.movie.rating ? props.movie.rating : 0 }}</b>
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
    width: 228px;
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