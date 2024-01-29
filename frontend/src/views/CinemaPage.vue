<script setup>
import { ref, watch, onMounted } from 'vue'
import TheLoading from "@/components/TheLoading.vue";
import { useCinemaStore } from "../store/useCinema"
import { useRoute } from "vue-router";

const route = useRoute();
const cinemaId = ref(route.params.id);

const cinemaStore = useCinemaStore();
onMounted(async () => {
    await cinemaStore.getInfoCinema(cinemaId.value);
});

watch(
    () => route.params.id,
    (newId) => {
        if (newId) {
            cinemaId.value = newId;
            cinemaStore.getInfoCinema(newId);
        }
    }
);

</script>
<template>
    <div id="cinema-container">
        <TheLoading v-if="cinemaStore.isLoading"></TheLoading>
        <div class="cinema">
            <div class="header">
                <p class="cinema-name">{{ cinemaStore.infoCinema.cinema_name }}</p>
                <button>
                    <font-awesome-icon icon="fa-solid fa-thumbs-up" style="color: #fff;" />Like
                </button>
                <button>Share</button>
                <span style="font-size: 12px; font-weight: 500;">4 people like this. Be the first of your friends.</span>
            </div>
            <img src="../assets/img/cinema1.jpg" alt="" style="width: 100%; height:360px;"
                v-if="cinemaStore.infoCinema.id == 1">
            <img src="../assets/img/cinema2.jpg" alt="" style="width: 100%; height:360px;"
                v-if="cinemaStore.infoCinema.id == 2">
            <img src="../assets/img/cinema3.jpg" alt="" style="width: 100%; height:360px;"
                v-if="cinemaStore.infoCinema.id == 3">
            <img src="../assets/img/cinema4.jpg" alt="" style="width: 100%; height:360px;"
                v-if="cinemaStore.infoCinema.id == 4">
            <div class="desc" v-if="cinemaStore.infoCinema.id == 1">
                <p>Cinemas {{ cinemaStore.infoCinema.cinema_name }} có vị trí trung tâm, tọa lạc tại Hoàng Gia Plaza. Rạp tự
                    hào là rạp
                    phim tư nhân duy nhất và đầu tiên sở hữu hệ thống phòng chiếu phim đạt chuẩn Hollywood tại TP. Hà Nội.
                </p>
                <p>Rạp được trang bị hệ thống máy chiếu, phòng chiếu hiện đại với 100% nhập khẩu từ nước ngoài, với 3 phòng
                    chiếu tương đương 150 ghế ngồi. Hệ thống âm thanh Dolby 7.1 và hệ thống cách âm chuẩn quốc tế đảm bảo
                    chất lượng âm thanh sống động nhất cho từng thước phim bom tấn.</p>
                <p>Mức giá xem phim tại Cinemas {{ cinemaStore.infoCinema.cinema_name }} rất cạnh tranh: giá vé chỉ từ
                    40.000 VNĐ cho
                    hàng ghế thường, 60.000 VNĐ cho hàng ghế trung và 80.000 VNĐ cho hàng ghế VIP. Không chỉ có vậy, rạp còn
                    có nhiều chương trình khuyến mại, ưu đãi hàng
                    tuần như đồng giá vé 40.000 vào các ngày Thứ 3 vui vẻ, Thứ 4 Teeiv's Day, đồng giá vé cho Học sinh sinh
                    viên, người cao tuổi, trẻ em.....</p>
            </div>
            <div class="desc" v-if="cinemaStore.infoCinema.id == 2">
                <p>Rạp {{ cinemaStore.infoCinema.cinema_name }} có vị trí trung tâm, tọa lạc tại {{
                    cinemaStore.infoCinema.address }}, là điểm đến lý tưởng của giới "mộ - chill" Hà Thành.</p>
                <p>Rạp có vị trí thuận lợi, gần khu vực sinh sống đông dân cư cũng như trung tâm thương mại đầy đủ tiện
                    nghi. {{ cinemaStore.infoCinema.cinema_name }} sở hữu tổng cộng 3 phòng chiếu tương đương gần 250 ghế
                    ngồi. Rạp được trang bị hệ thống màn chiếu, máy chiếu, phòng chiếu hiện đại theo tiêu chuẩn Hollywood
                    với 100% nhập khẩu từ nước ngoài. Trong mỗi phòng chiếu đều được lắp đặt hệ thống âm thanh Dolby 7.1 và
                    hệ thống cách âm chuẩn quốc tế. Vì vậy mà mỗi thước phim được chiếu tại rạp đều là những thước phim rõ
                    nét nhất, với âm thanh và hiệu ứng sống động nhất. Mức giá xem phim tại rạp hết sức ưu đãi, chỉ từ
                    50.000 VNĐ.</p>
                <p>Mức giá xem phim tại rạp hết sức ưu đãi, chỉ từ 45.000 VNĐ. Mỗi tuần, rạp còn có những chương trình
                    khuyến mại, ưu đãi đặc biệt dành cho các tín đồ điện ảnh, như Đồng giá vé 50k cho học sinh sinh viên bất
                    kể giờ giấc năm tháng, đồng giá vé 50k từ thứ 2 đến thứ 6 cho mọi người mọi nhà, giảm thêm 10k khi mua
                    vé kèm combo online.</p>
                <p>Với địa điểm thuận lợi, cơ sở vật chất hiện đại, tiên tiến, mức giá ưu đãi, {{
                    cinemaStore.infoCinema.cinema_name }} chắc chắn sẽ là địa điểm xem-ăn-chơi không thể bỏ qua của giới
                    trẻ.</p>
            </div>
            <div class="desc" v-if="cinemaStore.infoCinema.id == 3">
                <p>Nhằm đáp ứng nhu cầu vui giải trí của đông đảo bạn trẻ, rạp {{ cinemaStore.infoCinema.cinema_name }} đã
                    có mặt tại {{ cinemaStore.infoCinema.address }}.</p>
                <p>{{ cinemaStore.infoCinema.cinema_name }} mang đến trải nghiệm xem phim chuẩn Hollywood với hệ thống máy
                    chiếu, phòng chiếu hiện đại với 100% nhập khẩu từ nước ngoài, với 2 phòng chiếu tương đương 150 ghế
                    ngồi. Hệ thống âm thanh Dolby 7.1 và hệ thống cách âm chuẩn quốc tế đảm bảo chất lượng âm thanh sống
                    động nhất cho từng thước phim bom tấn.</p>
                <p>Mức giá xem phim tại rạp hết sức ưu đãi, chỉ từ 40.000 VNĐ. Mỗi tuần, rạp còn có những chương trình
                    khuyến mại, ưu đãi đặc biệt dành cho các tín đồ điện ảnh, như Đồng giá vé 50k cho học sinh sinh viên bất
                    kể giờ giấc năm tháng, đồng giá vé 50k từ thứ 2 đến thứ 6 cho mọi người mọi nhà, giảm thêm 10k khi mua
                    vé kèm combo online.</p>
                <p>Đến ngay {{ cinemaStore.infoCinema.cinema_name }} để tận hưởng những giây phút vui vẻ cùng bạn bè trước
                    màn hình chiếu phim với mức giá vô cùng ưu đãi nhé.</p>
            </div>
            <div class="desc"
                v-if="cinemaStore.infoCinema.id != 1 || cinemaStore.infoCinema.id != 2 || cinemaStore.infoCinema.id != 3">
                <p>Nhằm đáp ứng nhu cầu vui giải trí của đông đảo bạn trẻ, rạp {{ cinemaStore.infoCinema.cinema_name }} đã
                    có mặt tại {{ cinemaStore.infoCinema.address }}.</p>
                <p>Nằm trong tòa nhà HHA có kiến trúc hiện đại và đa năng, rạp {{ cinemaStore.infoCinema.cinema_name }} cũng
                    sở hữu thiết kế trẻ trung, năng động rất phù hợp với giới trẻ. Rạp có quy mô 3 phòng chiếu với 220 ghế,
                    trong đó có 1 phòng chiếu 3D.</p>
                <p>Không thua kém các rạp TeeIV Cinema khác, {{ cinemaStore.infoCinema.cinema_name }} cũng sẽ được trang bị
                    màn hình chiếu cong cùng với dàn âm thanh Dolby hiện đại.</p>
            </div>
            <div class="info">
                <p>Thông tin liên hệ</p>
                <p>Rạp Cinemas {{ cinemaStore.infoCinema.cinema_name }}</p>
                <p class="address">Địa chỉ: {{ cinemaStore.infoCinema.address }}</p>
                <div class="contact">
                    <span>Hotline: </span><span class="phone">{{ cinemaStore.infoCinema.phone }}</span>
                    <p>Mua phiếu quà tặng, mua vé số lượng lớn, đặt phòng chiếu tổ chức hội nghị, trưng bày quảng cáo:
                        <span>Liên hệ với Hotline </span><span class="phone">{{ cinemaStore.infoCinema.phone }}</span> để
                        được hưởng ưu
                        đãi tốt nhất bạn nhé!
                    </p>
                </div>
            </div>
            <div class="map">
                <img src="../assets/img/cinema_map.jpg" alt=""
                    style="width: 100%; height:400px; border-radius: 8px; cursor: pointer;">
            </div>
        </div>
        <div class="banner">
            <img src="../assets/img/cinema_banner.jpg" alt=""
                style="width: 100%; height: 720px; border-radius: 8px; cursor: pointer;">
        </div>
    </div>
</template>
<style scoped>
#cinema-container {
    padding: 48px 200px;
    position: relative;
    display: flex;
}

.cinema {
    width: 60%;
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

.info p,
.info span {
    font-size: 16px;
    font-weight: normal;
    margin-bottom: 12px;
}

.info p.address,
.contact span {
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

.banner {
    width: 40%;
    padding-top: 96px;
    padding-left: 80px;
}</style>