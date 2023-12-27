<script setup>
import { reactive } from 'vue'

const items = reactive({
    about: ["Tuyển dụng", "Giới thiệu", "Liên hệ", "F.A.Q", "Điều khoản sử dụng", "Chính sách thanh toán, đổi trả", "Điều khoản bảo mật", "Hướng dẫn đặt vé online"],
    cinema: [
        "Teeiv Cinemas Đống Đa, Hà Nội - Hotline 0936113502",
        "Teeiv Cinemas Hải An, Hải Phòng - Hotline 0359111306",
        "Teeiv Cinemas Vĩnh Yên, Vĩnh Phúc - Hotline 0944213555",
        "Teeiv Cinemas Lâm Thao, Phú Thọ - Hotline 0326107502",
    ],
});

</script>
<template lang="">
    <div id="footer-container">
        <div class="About">
            <div class="app-logo">
                <a href="">
                    <img src="../assets/img/teeiv-cinema-logo.png" alt="Logo" width="120" height="60" style="cursor: pointer">
                </a>
            </div>
            <div class="point-list" v-for="(item, index) in items.about" :key="index">
                <div class="point-item">
                    <font-awesome-icon icon="fa-solid fa-chevron-right" style="font-size: 12px; margin-right: 8px;" />
                    <a href="#">{{item}}</a>
                </div>
            </div>
        </div>
        <div class="Cinema">
            <div class="footer-title">
                <p>Cụm rạp Teeiv</p>
                <div class="line"></div>
            </div>
            <div class="point-list" v-for="(item, index) in items.cinema" :key="index">
                <div class="point-item">
                    <font-awesome-icon icon="fa-solid fa-chevron-right" style="font-size: 12px; margin-right: 8px;" />
                    <a href="#">{{item}}</a>
                </div>
            </div>
        </div>
        <div class="Contact">
            <div class="footer-title">
                <p>Liên hệ với chúng tôi</p>
                <div class="line"></div>
            </div>
            <div class="">
                
            </div>
        </div>
    </div>
</template>

<style scoped>
#footer-container {
    height: auto;
    padding: 24px 200px;
    border-top: 1px solid #bbb;
    display: flex;
    justify-content: space-between;
}


.point-list .point-item {
    display: flex;
    align-items: center;
    margin: 4px 0;
}

.point-list .point-item a {
    color: #000;
    font-weight: 600;
    text-decoration: none;
}

.point-list .point-item a:hover {
    color: #337ab7;
    text-decoration: underline;
}

.footer-title p {
    font-size: 20px;
    font-weight: bold;
    text-transform: uppercase;
}

.footer-title .line {
    width: 100%;
    margin: 6px 0 16px 0;
    border: 2px solid #337ab7;
}
</style>