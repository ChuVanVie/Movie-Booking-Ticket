<script setup>
import { reactive, onBeforeMount } from 'vue';
import { useRouter } from "vue-router";
import TheLoading from "@/components/TheLoading.vue";
import VueDatePicker from "@vuepic/vue-datepicker";
import { useAuthStore } from "../store/useAuth";
import { useMovieStore } from "../store/useMovie"
import { useCinemaStore } from "../store/useCinema"
import { useShowtimeStore } from "../store/useShowtime"

const router = useRouter();


const authStore = useAuthStore();
const movieStore = useMovieStore();
const cinemaStore = useCinemaStore();
const showtimeStore = useShowtimeStore();

const currentDate = new Date();
// const daysOfWeek = ['Chủ Nhật', 'Thứ Hai', 'Thứ Ba', 'Thứ Tư', 'Thứ Năm', 'Thứ Sáu', 'Thứ Bảy'];
// const customPosition = () => ({ top: 0 });
const customDateFormat = (date) => {
    date = new Date(date);
    return `${date.getDate()}/${date.getMonth() + 1}/${date.getFullYear()}`;
};

const customDateApi = (date) => {
    date = new Date(date);
    return `${date.getFullYear()}-${date.getMonth() + 1}-${date.getDate()}`;
};

const showtimeInfo = reactive({
    dateChoosed: customDateFormat(currentDate),
    cinemaChoosed: {
        id: null,
        cinemaName: null,
    },
    theaterChoosed: {
        id: null,
        cinemaId: null,
        theaterName: null,
    },
    movieChoosed: {
        id: "",
        movieName: "",
    }
});

onBeforeMount(async () => {
    await cinemaStore.getAllCinema();
    await movieStore.getAllMovie();
    // console.log(movieStore.movieChoosed);
    if (movieStore.movieChoosed) {
        showtimeInfo.movieChoosed.id = movieStore.movieChoosed.movieId;
        showtimeInfo.movieChoosed.movieName = movieStore.movieChoosed.movieName;
    }
});

const selectCinema = async (cinema) => {
    showtimeInfo.cinemaChoosed.id = cinema.id;
    showtimeInfo.cinemaChoosed.cinemaName = cinema.cinema_name;

    await cinemaStore.getInfoCinema(cinema.id);
}

const selectMovie = async (movie) => {
    showtimeInfo.movieChoosed.id = movie.id;
    showtimeInfo.movieChoosed.movieName = movie.movie_name;

    if (showtimeInfo.dateChoosed && showtimeInfo.theaterChoosed.cinemaId) {
        await showtimeStore.getAllShowtime(showtimeInfo.movieChoosed.id, showtimeInfo.theaterChoosed.cinemaId, customDateApi(showtimeInfo.dateChoosed));
    }
}

const removeMovie = async () => {
    showtimeInfo.movieChoosed.id = "";
    showtimeInfo.movieChoosed.movieName = "";

    if (showtimeInfo.dateChoosed && showtimeInfo.theaterChoosed.cinemaId) {
        await showtimeStore.getAllShowtime(showtimeInfo.movieChoosed.id, showtimeInfo.theaterChoosed.cinemaId, customDateApi(showtimeInfo.dateChoosed));
    }
}

const selectTheater = async (theater) => {
    showtimeInfo.theaterChoosed.id = theater.id;
    showtimeInfo.theaterChoosed.cinemaId = theater.cinema_id;
    showtimeInfo.theaterChoosed.theaterName = theater.theater_name;

    if (showtimeInfo.dateChoosed) {
        await showtimeStore.getAllShowtime(showtimeInfo.movieChoosed.id, showtimeInfo.theaterChoosed.cinemaId, customDateApi(showtimeInfo.dateChoosed));
    }
}

const removeTheater = () => {
    showtimeInfo.theaterChoosed.id = null;
    showtimeInfo.theaterChoosed.cinemaId = null;
    showtimeInfo.theaterChoosed.theaterName = null;
}

const selectShowtime = (showtime) => {
    if (!authStore.isLoggedIn) {
        router.push("/auth/login");
    }
    else {
        console.log(showtime);
        router.push({ name: "Seats in Showtime", params: { id: showtime.id } });
    }
}

</script>
<template>
    <div id="showtime-info">
        <div class="calendar" style="text-align: center;">
            <p style="font-size: 18px; font-weight: bold;">Ngày chiếu: </p>
            <VueDatePicker v-model="showtimeInfo.dateChoosed" :alt-position="customPosition" :format="customDateFormat"
                placeholder="Chọn ngày chiếu..." style="width: 180px">
            </VueDatePicker>
        </div>
        <div class="all-info">
            <div class="cinema-info">
                <TheLoading v-if="cinemaStore.isLoading"></TheLoading>
                <p class="header-i">Rạp</p>
                <div class="sub-i" style="gap: 48px;">
                    <p style="font-size: 16px; font-weight: bold; color: #231f20;">Rạp chiếu phim của tôi</p>
                    <p style="font-size: 13px; color: #777;" v-if="!authStore.isLoggedIn">Bạn có thể kiểm tra sau khi đăng
                        nhập.</p>
                </div>
                <div class="cinema-container">
                    <div class="cinema-list">
                        <div class="cinema-item" v-for="cinema in cinemaStore.allCinema" :key="cinema.id"
                            :class="{ 'cinema-selected': cinema.id == showtimeInfo.cinemaChoosed.id }"
                            @click="selectCinema(cinema)">
                            <p>{{ cinema.cinema_name }}</p>
                        </div>
                    </div>
                    <div class="theater-list">
                        <div class="theater-item" v-for="theater in cinemaStore.infoCinema.theaters" :key="theater.id"
                            :class="{ 'theater-selected': theater.id == showtimeInfo.theaterChoosed.id }"
                            @click="selectTheater(theater)">
                            <font-awesome-icon icon="fa-solid fa-check" class="i-theater-selected"
                                style="margin-right: 24px; visibility: hidden;" />
                            <p>{{ theater.theater_name }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="movie-info">
                <p class="header-i">Phim</p>
                <div class="sub-i" style="justify-content: center; gap: 12px;">
                    <p style="font-size: 16px; font-weight: bold; color: #231f20; cursor: pointer;">Xem nhiều nhất</p>
                    <div style="border-left: 1px solid #dedede;"></div>
                    <p style="font-size: 16px; cursor: pointer;">Đánh giá tốt nhất</p>
                </div>
                <div class="movie-container">
                    <div class="movie-item" v-for="movie in movieStore.allMovie" :key="movie.id"
                        :class="{ 'movie-selected': movie.id == showtimeInfo.movieChoosed.id }" @click="selectMovie(movie)">
                        <font-awesome-icon icon="fa-solid fa-check" class="i-movie-selected"
                            style="margin-right: 12px; visibility: hidden;" />
                        <p>{{ movie.movie_name }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="ticketing-container">
        <div class="showtime-choosed">
            <div class="date showtime-item">
                <p>Ngày</p>
                <p class="ptent">{{ customDateFormat(showtimeInfo.dateChoosed) }}</p>
            </div>
            <div class="cinema showtime-item">
                <p>Rạp</p>
                <p class="ptent" v-if="showtimeInfo.theaterChoosed.id == null">Vui lòng chọn phòng chiếu</p>
                <div class="choosed" v-else>
                    <p>{{ showtimeInfo.theaterChoosed.theaterName }}</p>
                    <font-awesome-icon icon="fa-solid fa-square-xmark" class="i-cancel" @click="removeTheater" />
                </div>
            </div>
            <div class="movie showtime-item">
                <p>Phim</p>
                <p class="ptent" v-if="!showtimeInfo.movieChoosed.id">Vui lòng chọn phim</p>
                <div class="choosed" v-else>
                    <p>{{ showtimeInfo.movieChoosed.movieName }}</p>
                    <font-awesome-icon icon="fa-solid fa-square-xmark" class="i-cancel" @click="removeMovie" />
                </div>
            </div>
        </div>
        <div class="showtime-list">
            <div class="time-title">
                <p style="font-size: 24px; font-weight: bold; line-height: 30px;">Giờ chiếu</p>
                <p style="font-weight: normal; color: #777; margin-left: 8px; margin-top: 6px;">Thời gian
                    chiếu phim có thể chênh lệch 15 phút do chiếu quảng cáo, giới thiệu phim ra rạp</p>
            </div>
            <div class="screen-list">
                <TheLoading v-if="showtimeStore.isLoading"></TheLoading>
                <div class="screen" v-if="Array.isArray(showtimeStore.allShowtime) && showtimeStore.allShowtime.length > 0">
                    <div class="screen-container" v-for="showtime in showtimeStore.allShowtime" :key="showtime.id">
                        <div class="movie-choosed">
                            <p>{{ showtime.movie.movie_name }}</p>
                            <font-awesome-icon icon="fa-solid fa-circle-exclamation"
                                style="font-size: 20px; color: #777;" />
                        </div>
                        <div class="cinema-choosed">{{ showtime.cinema.cinema_name }}</div>
                        <div class="all-screen">
                            <div class="screen-item" @click="selectShowtime(showtime)">
                                <div class="theater-name">{{ showtime.theater.theater_name }}</div>
                                <div class="theater-time">{{ showtime.start_time.substring(11, 16) }} ~ {{
                                    showtime.end_time.substring(11, 16) }}</div>
                                <div class="available-seats">{{ showtime.theater.available_seats_count }} / {{
                                    showtime.theater.capacity }} Ghế trống</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="please-choose"
                    v-else-if="Array.isArray(showtimeStore.allShowtime) && showtimeStore.allShowtime.length == 0">
                    <font-awesome-icon icon="fa-solid fa-circle-exclamation" style="font-size: 24px; color: #777;" />
                    <p style=" font-size: 18px; color: #777; margin-left: 8px;">Không tìm thấy lịch chiếu phù hợp.</p>
                </div>
                <div class="please-choose" v-else>
                    <font-awesome-icon icon="fa-solid fa-circle-exclamation" style="font-size: 24px; color: #777;" />
                    <p style=" font-size: 18px; color: #777; margin-left: 8px;">Kính mời quý khách
                        chọn phim để xem lịch chiếu chi tiết tại rạp</p>
                </div>
            </div>
        </div>
    </div>
</template>
<style scoped>
#showtime-info {
    background-color: #f9f6ec;
}

#showtime-info .calendar {
    height: 80px;
    padding-top: 32px;
    margin: 0 200px;
    display: flex;
    align-items: center;
    gap: 16px;
}

#showtime-info .all-info {
    height: 540px;
    margin: 0 200px;
    background-color: #fff;
    border-top: 1px solid #000;
    display: flex;
    position: relative;
}

.all-info .header-i {
    padding: 20px 32px;
    border-bottom: 1px solid #dedede;
    font-size: 24px;
    font-weight: bold;
}

.all-info .sub-i {
    padding: 20px 32px;
    border-bottom: 1px solid #dedede;
    display: flex;
}

.all-info .sub-i p {
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.all-info .cinema-info {
    width: 65%;
    border-right: 1px solid #c0c0c0;
}

.cinema-info .cinema-container {
    display: flex;
    padding: 20px 32px;
}

.cinema-container .cinema-list {
    margin: 0 12px;
}

.cinema-list .cinema-item {
    height: 40px;
    padding: 10px 40px;
    margin-bottom: 8px;
    color: #666;
    text-align: center;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    cursor: pointer;
}

.cinema-list .cinema-item.cinema-selected {
    color: #fff;
    font-weight: bold;
    background-color: #000;
}

.cinema-container .theater-list {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    position: relative;
}

.theater-list .theater-item {
    height: 40px;
    color: #666;
    font-size: 13px;
    padding: 10px 40px 10px 10px;
    margin-bottom: 8px;
    background-color: #efefef;
    display: flex;
    align-items: center;
    cursor: pointer;
}

.theater-list .theater-item.theater-selected {
    color: #000;
    font-weight: bold;
    background-color: #fff;
    border: 1px solid #666;
}

.theater-list .theater-selected .i-theater-selected {
    visibility: visible !important;
}

.all-info .movie-info {
    width: 35%;
}

.movie-info .movie-container {
    height: calc(100% - 126px);
    overflow-y: auto;
    position: relative;
}

.movie-container .movie-item {
    padding: 10px;
    margin: 8px 0;
    display: flex;
    align-items: center;
}

.movie-item p {
    font-size: 16px;
    font-weight: normal;
    text-transform: uppercase;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    cursor: pointer;
}

.movie-container .movie-selected {
    border: 1px solid #999;
}

.movie-container .movie-selected p {
    font-weight: bold;
}

.movie-container .movie-selected .i-movie-selected {
    visibility: visible !important;
}

#ticketing-container {
    padding: 0 200px;
    position: relative;
    z-index: 2;
}

#ticketing-container .showtime-choosed {
    padding: 20px 15px 15px;
    background-color: #dad2b4;
    display: flex;
    align-items: center;
    gap: 80px;
    /* justify-content: space-around; */
}

.showtime-choosed .showtime-item {
    display: flex;
    align-items: center;
    gap: 12px;
}

.showtime-item p {
    font-size: 16px;
}

.showtime-item p.ptent {
    font-weight: bold;
}

.choosed {
    padding: 6px 10px;
    background-color: #e5e0cb;
    border: 1px solid #bab093;
    display: flex;
    align-items: center;
}

.choosed p {
    font-weight: 600;
}

.choosed .i-cancel {
    font-size: 20px;
    color: #808080;
    margin-left: 10px;
    cursor: pointer;
}

#ticketing-container .showtime-list {
    background-color: #fff;
    padding: 48px 0;
}

.showtime-list .time-title {
    display: flex;
    align-items: center;
}

.showtime-list .screen-list {
    min-height: 480px;
    margin-top: 48px;
    position: relative;
}

.screen-list .please-choose {
    display: flex;
    align-items: center;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

.screen-container {
    width: 100%;
    margin-bottom: 24px;
}

.screen-container .movie-choosed {
    background-color: #efebdb;
    padding: 16px 20px;
    gap: 12px;
    display: flex;
    align-items: center;
}

.movie-choosed p {
    font-size: 28px;
    font-weight: 400;
}

.screen-container .cinema-choosed {
    font-size: 16px;
    font-weight: bold;
    padding: 24px 20px 12px;
}

.all-screen {
    display: flex;
    flex-wrap: wrap;
    padding: 0 20px;
}

.all-screen .screen-item {
    width: auto;
    border: 1px solid #d0d0d0;
    cursor: pointer;
}

.all-screen .screen-item:hover {
    color: #fff;
    background-color: #000;
}

.screen-item .theater-name {
    text-align: center;
    border-bottom: 1px solid #d0d0d0;
}

.screen-item .theater-time {
    font-size: 16px;
    font-weight: bold;
    margin: 4px 0;
    text-align: center;
    border-bottom: 1px solid #d0d0d0;
}

.screen-item .available-seats {
    margin: 0 8px;
    text-align: center;
}
</style>