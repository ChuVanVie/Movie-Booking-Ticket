<script setup>
import { ref, reactive, onMounted } from 'vue'
import { useRouter, useRoute } from "vue-router";
import { toast } from "vue3-toastify";
import TheLoading from "@/components/TheLoading.vue";
import { formatDate } from "../helper/formatDateTime";
import { useAuthStore } from "../store/useAuth"
import { useMovieStore } from "../store/useMovie"
import { useRateStore } from "../store/useRate"

const route = useRoute();
const router = useRouter();
const movieId = ref(route.params.id);

const rateInfo = reactive({
    movieId: movieId.value,
    star: null,
    comment: "",
});

const authStore = useAuthStore();
const movieStore = useMovieStore();
const rateStore = useRateStore();
onMounted(async () => {
    await movieStore.getDetailMovie(movieId.value);
});

const handleBooking = (movie) => {
    // console.log(movie.id, movie.movie_name);
    movieStore.setMovieData({ movieId: movie.id, movieName: movie.movie_name });
    router.push({ path: '/ticketing' });
}

const handleTyping = () => {
    if (!authStore.isLoggedIn) {
        router.push('/auth/login');
    }
}

const handleNewRate = async (movieId, star, comment) => {
    if (star === null || isNaN(star)) {
        toast.error("Please fill a rate star!");
    }
    else {
        await rateStore.createNewRate({
            movieId: movieId,
            star: star,
            comment: comment,
            token: authStore.accessToken
        });
        if (rateStore.isRateSuccess) {
            rateInfo.star = null;
            rateInfo.comment = "";
            toast.success("Create new rate successful!");
        }
        else {
            toast.error(rateStore.errMsg.message);
        }
    }
}


</script>
<template>
    <TheLoading v-if="movieStore.isLoading"></TheLoading>
    <div id="detail-movie">
        <div class="badge">
            <p>Trang chủ</p>
            <font-awesome-icon icon="fa-solid fa-chevron-right" style="font-size: 16px; margin: 8px 12px 0 12px;" />
            <p style="color: #03599d">Phim</p>
        </div>
        <div class="intro-container">
            <div class="left-intro">
                <div class="poster">
                    <img :src="movieStore.detailMovie.poster_url" alt=""
                        style="width: 100%; height: 400px; cursor: pointer">
                </div>
                <div class="btn-reserve" @click="handleBooking(movieStore.detailMovie)">
                    <button>Đặt vé</button>
                </div>
            </div>
            <div class="right-intro">
                <p class="movie-name">{{ movieStore.detailMovie.movie_name }}</p>
                <p class="movie-desc">{{ movieStore.detailMovie.desc }}</p>
                <div class="movie-info">
                    <p class="key">Thể loại:</p>
                    <p class="value"><span v-for="category in movieStore.detailMovie.categories"
                            :key="category.category_id">{{ category.category_name }}, </span></p>
                </div>
                <div class="movie-info">
                    <p class="key">Quốc gia: </p>
                    <!-- <p class="value">{{ movieStore.detailMovie.country.country_name }}</p> -->
                </div>
                <div class="movie-info">
                    <p class="key">Thời lượng:</p>
                    <p class="value">{{ movieStore.detailMovie.duration }}</p>
                </div>
                <div class="movie-info">
                    <p class="key">Năm: </p>
                    <p class="value">{{ movieStore.detailMovie.year }}</p>
                </div>
                <div class="movie-info">
                    <p class="key">Ngày khởi chiếu: </p>
                    <p class="value">{{ formatDate(movieStore.detailMovie.premiere_date) }}</p>
                </div>
                <div class="movie-info">
                    <p class="key">Đánh giá: </p>
                    <p class="value">{{ movieStore.detailMovie.rating ? movieStore.detailMovie.rating : 0 }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="trailer-container">
        <div class="trailer">
            <p>Trailer</p>
            <div class="line"></div>
        </div>
        <video width="640" height="360" controls>
            <source src="../assets/ctc8ns.mp4" type="video/mp4">
            <!-- <source src="https://1080.opstream4.com/share/9d2f78b13eda78c1cb7627677db9935f" type="video/mp4"> -->
            <!-- <source src="https://1080.opstream4.com/share/9d2f78b13eda78c1cb7627677db9935f" type="video/ogg"> -->
            Your browser does not support the video tag.
        </video>
        <div class="rating-container">
            <div class="total-rate">
                <div class="number-rate">{{ movieStore.detailMovie.rates ? movieStore.detailMovie.rates.length : 0 }}
                    ratings</div>
                <div class="sort-by">
                    Sort by Oldest/Newest
                </div>
            </div>
            <div class="b-line"></div>
            <div class="all-rate">
                <p>Xếp hạng và đánh giá phim</p>
                <div class="new-rate">
                    <div class="star-area">
                        <p class="star-title">Xếp hạng</p>
                        <div class="starscore"></div>
                        <div class="star-sum" style="margin-top: 4px;">
                            <input type="number" min="1" max="10" style="padding-left: 4px;" v-model="rateInfo.star"> điểm
                        </div>
                    </div>
                    <textarea title="Nhập đánh giá phim" id="" cols="30" rows="10"
                        placeholder="Bạn có thể đánh giá phim sau khi đăng nhập." v-model="rateInfo.comment"
                        @click="handleTyping"></textarea>
                    <div class="btn-send-rate" @click="handleNewRate(rateInfo.movieId, rateInfo.star, rateInfo.comment)">
                        <button>Gửi đánh giá</button>
                    </div>
                </div>
                <div class="b-line" style="margin-top: 16px;"></div>
                <div class="list-rate">
                    <div class="rate-item" v-for="rate in movieStore.detailMovie.rates" :key="rate.id">
                        <div class="left-rate">
                            <div class="items-center gap-12">
                                <span class="user-name">{{ rate.user.name }}</span>
                                <div class="starscore"></div><span>{{ rate.star }}</span>
                            </div>
                            <div class="rate-comment">{{ rate.comment }}</div>
                        </div>
                        <div class="right-rate">
                            <p class="rate-created-at">{{ formatDate(rate.created_at) }}</p>
                        </div>
                    </div>
                    <div class="c-line"></div>
                </div>
            </div>
        </div>
    </div>
</template>
<style scoped>
#detail-movie {
    padding: 24px 250px 64px 250px;
}

.badge {
    display: flex;
    align-items: center;
    margin-bottom: 24px;
}

.badge p {
    font-size: 28px;
    font-weight: 500;
}

.intro-container {
    display: flex;
}

.intro-container .left-intro {
    width: 25%;
    margin-right: 48px;
}

.left-intro .poster img {
    width: 256px;
    height: 400px;
    border-radius: 16px;
}

.left-intro .btn-reserve button {
    width: 100%;
    padding: 16px 0;
    margin-top: 12px;
    border: unset;
    background-color: #231f20;
    cursor: pointer;
    color: #c0b687;
    font-size: 20px;
    font-weight: bold;
    text-align: center;
}

.right-intro {
    max-width: 60%;
    padding: 16px 0;
}

.right-intro p,
.right-intro span {
    font-size: 18px;
}

.right-intro .movie-name {
    font-size: 33px !important;
    font-weight: bold;
    margin-bottom: 15px !important;
}

.right-intro .movie-desc {
    margin: 24px 0;
}

.right-intro .movie-info {
    display: flex;
    margin-bottom: 4px;
}

.right-intro .movie-info .key {
    width: 250px;
    font-weight: bold;
    text-transform: uppercase;
}

.trailer-container {
    color: #fff;
    background-color: #3c3e4d;
    overflow: hidden;
    padding: 0 200px;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.trailer-container .trailer {
    width: fit-content;
}

.trailer-container .trailer p {
    color: #fff;
    font-size: 33px !important;
    line-height: 1.5em;
    letter-spacing: -2px;
    font-weight: bold;
    text-transform: uppercase;
    margin: 40px 0 16px 0 !important;
}

.trailer-container .trailer .line {
    margin-bottom: 24px;
    border-bottom: 4px solid transparent;
    border-image: linear-gradient(to right, #39adf0 0%, #075fa3 100%);
    border-image-slice: 1;
    border-width: 0px 0px 4px 0px;
}

.rating-container {
    width: 100%;
}

.rating-container .total-rate {
    padding: 40px 0 24px 0;
    display: flex;
    justify-content: space-between;
}

.rating-container .all-rate {
    padding: 40px 0;
}

.all-rate>p {
    font-size: 32px;
    font-weight: 600;
    margin-bottom: 24px;
}

.all-rate .new-rate {
    border: 1px solid #dedede;
    display: flex;
}

.new-rate .star-area {
    width: 15%;
    border-right: 1px solid #dedede;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.star-area .star-title {
    font-size: 16px;
    font-weight: 600;
}

.starscore {
    display: inline-block;
    vertical-align: middle;
    width: 80px;
    height: 15px;
    background: url(../assets/img/icon_score_star.png) no-repeat 0 -18px;
}

.new-rate textarea {
    width: 70%;
    height: 100px;
    color: #666;
    background-color: #f5f5f5;
    padding: 10px;
    border: none;
    resize: none;
}

.new-rate textarea:focus {
    outline: none;
}

.new-rate .btn-send-rate {
    width: 15%;
}

.btn-send-rate button {
    width: 100%;
    height: 100%;
    font-size: 18px;
    font-weight: bold;
    background-color: #3c3e4d;
    border: none;
    text-align: center;
    color: #cdc197;
    cursor: pointer;
}

.all-rate .list-rate {
    min-height: 480px;
    color: #000;
    background-color: #fff;
    padding: 16px 0;
}


.all-rate .list-rate .rate-item {
    padding: 0 48px;
    margin-bottom: 16px;
    display: flex;
    Justify-content: space-between;
}

.rate-item .user-name {
    font-size: 20px;
    font-weight: 600;
}

.rate-item .rate-comment {
    margin-top: 4px;
}

.b-line {
    border: 1px solid #fff;
}

.c-line {
    margin: 16px 0;
    border-bottom: 1px solid #dadada;
}
</style>