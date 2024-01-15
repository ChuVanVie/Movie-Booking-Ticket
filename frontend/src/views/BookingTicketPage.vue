<script setup>
import { reactive } from 'vue';
const movieList = reactive([
    {
        id: 1,
        movieName: "Người đánh cá",
    },
    {
        id: 2,
        movieName: "Người đánh cá",
    },
    {
        id: 3,
        movieName: "Người đánh cá",
    },
    {
        id: 4,
        movieName: "Người đánh cá",
    },
    {
        id: 5,
        movieName: "Người đánh cá",
    },
    {
        id: 6,
        movieName: "Người đánh cá",
    },
    {
        id: 7,
        movieName: "Người đánh cá",
    },
    {
        id: 8,
        movieName: "Người đánh cá",
    },
    {
        id: 9,
        movieName: "Người đánh cá",
    },
    {
        id: 10,
        movieName: "Người đánh cá",
    }
]);

const cinemaList = reactive([
    {
        id: 1,
        cinemaName: 'Hà Nội(3)',
    },
    {
        id: 2,
        cinemaName: 'Hải Phòng(1)',
    },
    {
        id: 3,
        cinemaName: 'Vĩnh Phúc(1)',
    },
    {
        id: 4,
        cinemaName: 'Phú Thọ(1)',
    },
]);

const theaterList = reactive([
    {
        id: 1,
        cinemaId: 1,
        theaterName: 'HN001',
    },
    {
        id: 2,
        cinemaId: 1,
        theaterName: 'HN002',
    },
    {
        id: 3,
        cinemaId: 1,
        theaterName: 'HN003',
    },
    // {
    //     id: 4,
    //     cinemaId: 2,
    //     theaterName: 'HP001',
    // },
    // {
    //     id: 5,
    //     cinemaId: 3,
    //     theaterName: 'VP001',
    // },
    // {
    //     id: 6,
    //     cinemaId: 4,
    //     theaterName: 'PT001',
    // },
]);

const currentDate = new Date();
const daysOfWeek = ['Chủ Nhật', 'Thứ Hai', 'Thứ Ba', 'Thứ Tư', 'Thứ Năm', 'Thứ Sáu', 'Thứ Bảy'];

const showNow = () => {
    console.log(`Ngày: ${currentDate.getDate()}, Tháng: ${currentDate.getMonth() + 1}, Năm: ${currentDate.getFullYear()}, Thứ: ${daysOfWeek[currentDate.getDay()]}`);
}

const cinemaChoosed = reactive({
    id: cinemaList[0].id,
    cinemaName: cinemaList[0].cinemaName,
});

const theaterChoosed = reactive({
    id: null,
    cinemaId: null,
    theaterName: null,
});

const movieChoosed = reactive({
    id: null,
    movieName: null,
});

const selectCinema = (cinema) => {
    cinemaChoosed.id = cinema.id;
    cinemaChoosed.cinemaName = cinema.cinemaName;
    // theaterList = theaterList.map((item) => {
    //     return item.cinemaId = cinema.id;
    // })
}

const selectMovie = (movie) => {
    movieChoosed.id = movie.id;
    movieChoosed.movieName = movie.movieName;
}

const removeMovie = () => {
    movieChoosed.id = null;
    movieChoosed.movieName = null;
}

const selectTheater = (theater) => {
    theaterChoosed.id = theater.id;
    theaterChoosed.cinemaId = theater.cinemaId;
    theaterChoosed.theaterName = theater.theaterName;
}

const removeTheater = () => {
    theaterChoosed.id = null;
    theaterChoosed.cinemaId = null;
    theaterChoosed.theaterName = null;
}

</script>
<template>
    <div id="showtime-info">
        <div class="calendar" style="text-align: center;">
            <button @click="showNow">Chọn ngày</button>
        </div>
        <div class="all-info">
            <div class="cinema-info">
                <p class="header-i">Rạp</p>
                <div class="sub-i" style="gap: 48px;">
                    <p style="font-size: 16px; font-weight: bold; color: #231f20;">Rạp chiếu phim của tôi</p>
                    <p style="font-size: 13px; color: #777;">Bạn có thể kiểm tra sau khi đăng nhập.</p>
                </div>
                <div class="cinema-container">
                    <div class="cinema-list">
                        <div class="cinema-item" v-for="cinema in cinemaList" :key="cinema.id"
                            :class="{ 'cinema-selected': cinema.id == cinemaChoosed.id }" @click="selectCinema(cinema)">
                            <p>{{ cinema.cinemaName }}</p>
                        </div>
                    </div>
                    <div class="theater-list">
                        <div class="theater-item" v-for="theater in theaterList" :key="theater.id"
                            :class="{ 'theater-selected': theater.id == theaterChoosed.id }"
                            @click="selectTheater(theater)">
                            <font-awesome-icon icon="fa-solid fa-check" class="i-theater-selected"
                                style="margin-right: 24px; visibility: hidden;" />
                            <p>{{ theater.theaterName }}</p>
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
                    <div class="movie-item" v-for="movie in movieList" :key="movie.id"
                        :class="{ 'movie-selected': movie.id == movieChoosed.id }" @click="selectMovie(movie)">
                        <font-awesome-icon icon="fa-solid fa-check" class="i-movie-selected"
                            style="margin-right: 12px; visibility: hidden;" />
                        <p>{{ movie.movieName }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="ticketing-container">
        <div class="showtime-choosed">
            <div class="date showtime-item">
                <p>Ngày</p>
                <p class="ptent">13/01/2024(Thứ Bảy)</p>
            </div>
            <div class="cinema showtime-item">
                <p>Rạp</p>
                <p class="ptent" v-if="theaterChoosed.id == null">Vui lòng chọn phòng chiếu</p>
                <div class="choosed" v-else>
                    <p>{{ theaterChoosed.theaterName }}</p>
                    <font-awesome-icon icon="fa-solid fa-square-xmark" class="i-cancel" @click="removeTheater" />
                </div>
            </div>
            <div class="movie showtime-item">
                <p>Phim</p>
                <p class="ptent" v-if="movieChoosed.id == null">Vui lòng chọn phim</p>
                <div class="choosed" v-else>
                    <p>{{ movieChoosed.movieName }}</p>
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
                <div class="screen" v-if="theaterChoosed.id != null">
                    <div class="screen-container">
                        <div class="movie-choosed">
                            <p>Quỷ Cẩu</p>
                            <font-awesome-icon icon="fa-solid fa-circle-exclamation"
                                style="font-size: 20px; color: #777;" />
                        </div>
                        <div class="cinema-choosed">Hà Đông</div>
                        <div class="all-screen">
                            <div class="screen-item" v-for="i in 3" :key="i">
                                <div class="theater-name">Screen 06</div>
                                <div class="theater-time">11:30 ~ 13:29</div>
                                <div class="available-seats">100 / 120 Ghế trống</div>
                            </div>
                        </div>
                    </div>
                    <div class="screen-container">
                        <div class="movie-choosed">
                            <p>Quỷ Cẩu</p>
                            <font-awesome-icon icon="fa-solid fa-circle-exclamation"
                                style="font-size: 20px; color: #777;" />
                        </div>
                        <div class="cinema-choosed">Hà Đông</div>
                        <div class="all-screen">
                            <div class="screen-item" v-for="i in 8" :key="i">
                                <div class="theater-name">Screen 06</div>
                                <div class="theater-time">11:30 ~ 13:29</div>
                                <div class="available-seats">100 / 120 Ghế trống</div>
                            </div>
                        </div>
                    </div>
                    <div class="screen-container">
                        <div class="movie-choosed">
                            <p>Quỷ Cẩu</p>
                            <font-awesome-icon icon="fa-solid fa-circle-exclamation"
                                style="font-size: 20px; color: #777;" />
                        </div>
                        <div class="cinema-choosed">Hà Đông</div>
                        <div class="all-screen">
                            <div class="screen-item" v-for="i in 2" :key="i">
                                <div class="theater-name">Screen 06</div>
                                <div class="theater-time">11:30 ~ 13:29</div>
                                <div class="available-seats">100 / 120 Ghế trống</div>
                            </div>
                        </div>
                    </div>
                    <div class="screen-container">
                        <div class="movie-choosed">
                            <p>Quỷ Cẩu</p>
                            <font-awesome-icon icon="fa-solid fa-circle-exclamation"
                                style="font-size: 20px; color: #777;" />
                        </div>
                        <div class="cinema-choosed">Hà Đông</div>
                        <div class="all-screen">
                            <div class="screen-item" v-for="i in 3" :key="i">
                                <div class="theater-name">Screen 06</div>
                                <div class="theater-time">11:30 ~ 13:29</div>
                                <div class="available-seats">100 / 120 Ghế trống</div>
                            </div>
                        </div>
                    </div>
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
    height: 120px;
}

#showtime-info .all-info {
    height: 540px;
    margin: 0 200px;
    background-color: #fff;
    border-top: 1px solid #000;
    display: flex;
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