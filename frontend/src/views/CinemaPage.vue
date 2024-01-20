<script setup>
import { reactive } from 'vue';
import ThumbnailMovie from "@/components/ThumbnailMovie.vue";

const cinemaInfo = reactive({
        cinemaName : 'Teeiv Hà Nội',
        address : 'số 15, đường Nguyễn Quốc Tuấn, Đống Đa, Hà Nội',
        phone : '0936113502',
})
</script>
<template>
    <div id="cinema-container">
        <div class="cinema">
            <div class="header">
                <p class="cinema-name">{{ cinemaInfo.cinemaName }}</p>
                <button>
                    <font-awesome-icon icon="fa-solid fa-thumbs-up" style="color: #fff;"/>Like
                </button>
                <button>Share</button>
                <span style="font-size: 12px; font-weight: 500;">4 people like this. Be the first of your friends.</span>
            </div>
            <img src="../assets/img/cinema.jpg" alt="" style="width: 100%; height:360px;">
            <div class="desc">
                <p>Cinemas {{ cinemaInfo.cinemaName }} có vị trí trung tâm, tọa lạc tại Hoàng Gia Plaza. Rạp tự hào là rạp phim tư nhân duy nhất và đầu tiên sở hữu hệ thống phòng chiếu phim đạt chuẩn Hollywood tại TP. Hà Nội.</p>
                <p>Rạp được trang bị hệ thống máy chiếu, phòng chiếu hiện đại với 100% nhập khẩu từ nước ngoài, với 4 phòng chiếu tương được 535 ghế ngồi. Hệ thống âm thanh Dolby 7.1 và hệ thống cách âm chuẩn quốc tế đảm bảo chất lượng âm thanh sống động nhất cho từng thước phim bom tấn.</p>
                <p>Mức giá xem phim tại Cinemas {{ cinemaInfo.cinemaName }} rất cạnh tranh: giá vé 2D chỉ từ 40.000 VNĐ và giá vé 3D chỉ từ 60.000 VNĐ. Không chỉ có vậy, rạp còn có nhiều chương trình khuyến mại, ưu đãi hàng tuần như đồng giá vé 40.000 vào các ngày Thứ 3 vui vẻ, Thứ 4 Beta's Day, đồng giá vé cho Học sinh sinh viên, người cao tuổi, trẻ em.....</p>
            </div>
            <div class="info">
                <p>Thông tin liên hệ</p>
                <p>Rạp Cinemas {{ cinemaInfo.cinemaName }}</p>
                <p class="address">Địa chỉ: {{ cinemaInfo.address }}</p>
                <div class="contact">
                    <span>Hotline: </span><span class="phone">{{ cinemaInfo.phone }}</span>
                    <p>Mua phiếu quà tặng, mua vé số lượng lớn, đặt phòng chiếu tổ chức hội nghị, trưng bày quảng cáo: <span>Liên hệ với Hotline </span><span class="phone">{{ cinemaInfo.phone }}</span> để được hưởng ưu đãi tốt nhất bạn nhé!</p>
                </div>
            </div>
            <div class="map">
                <img src="../assets/img/cinema_map.jpg" alt="" style="width: 100%; height:400px; border-radius: 8px; cursor: pointer;">
            </div>
        </div>
        <div class="movie">
            <p class="title">Phim đang hot</p>
            <div class="movies-list">
                <div class="movies-row">
                    <ThumbnailMovie></ThumbnailMovie>
                    <ThumbnailMovie></ThumbnailMovie>
                </div>
                <div class="movies-row">
                    <ThumbnailMovie></ThumbnailMovie>
                    <ThumbnailMovie></ThumbnailMovie>
                </div>
            </div>
        </div>
    </div>
</template>
<style scoped>
#cinema-container {
    padding: 48px 200px;
    display: flex;
}

.cinema {
    width: 40%;
}

.header {
    margin-bottom: 48px;
}

.header .cinema-name {
    font-size: 32px;
    font-weight: 600;
    margin-bottom: 10px;
}

.header button {
    color: #fff;
    font-size: 12px;
    font-weight: 600;
    background-color: #0077FF;
    padding: 0px 8px;
    border: none;
    border-radius: 4px;
    margin-right: 4px;
    cursor: pointer;
}

.desc {
    margin: 48px 0;
}


.desc p {
    font-size: 16px;
    font-weight: normal;
    margin-bottom: 16px;
}

.info p, .info span {
    font-size: 16px;
    font-weight: normal;
    margin-bottom: 12px;
}

.info p.address, .contact span {
    font-weight: bold;
}

.info .contact .phone {
    color: #337ab7;
    cursor: pointer;
}

.info .contact .phone:hover {
    text-decoration: underline;
}

.cinema .map {
    padding: 10px 40px;
}

.movie {
    width: 60%;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.movie .title {
    font-size: 32px;
    font-weight: bold;
    text-transform: uppercase;
    text-align: center;
    margin-bottom: 48px;
}

.movies-list .movies-row {
    display: flex;
    justify-content: center;
    gap: 48px;
    margin-bottom: 36px;
}
</style>