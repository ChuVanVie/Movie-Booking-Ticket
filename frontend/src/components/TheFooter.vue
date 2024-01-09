<script setup>
import { reactive } from 'vue'

const items = reactive({
    about: [
        "Tuyển dụng",
        "Giới thiệu",
        "Liên hệ",
        "F.A.Q",
        "Điều khoản sử dụng",
        "Chính sách thanh toán, đổi trả",
        "Điều khoản bảo mật",
        "Hướng dẫn đặt vé online"
    ],
    cinema: [
        {
            'id': 1,
            'name': "Teeiv Cinemas Đống Đa, Hà Nội - Hotline 0936113502",
        },
        {
            'id': 2,
            'name': "Teeiv Cinemas Hải An, Hải Phòng - Hotline 0359111306",
        },
        {
            'id': 3,
            'name': "Teeiv Cinemas Vĩnh Yên, Vĩnh Phúc - Hotline 0944213555",
        },
        {
            'id': 4,
            'name': "Teeiv Cinemas Lâm Thao, Phú Thọ - Hotline 0326107502",
        }  
    ],
    contact: {
        address: "Tầng 3, số 377, đường Giải Phóng, phường Giáp Bát, quận Hoàng Mai, thành phố Hà Nội",
        phone: "0359107225",
        email: "hungthuchoido@gmail.com"
    }
});

</script>
<template lang="">
    <div id="footer-container">
        <div class="About">
            <div class="app-logo">
                <router-link to="/">
                    <img src="../assets/img/teeiv-cinema-logo.png" alt="Logo" width="140" height="60" style="cursor: pointer">
                </router-link>
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
                    <router-link :to="'/cinemas/' + item.id">{{item.name}}</router-link>
                </div>
            </div>
        </div>
        <div class="Contact">
            <div class="footer-title">
                <p>Liên hệ với chúng tôi</p>
                <div class="line"></div>
            </div>
            <div class="contact-content">
                <div class="contact-text">
                    <p style="font-size: 18px; text-transform: uppercase;">Công ty cổ phần Teeiv Meia</p>
                    <p style="font-size: 16px; font-weight: 700;">Liên hệ hợp tác:</p>
                    <p style="width: 300px">Địa chỉ trụ sở: {{ items.contact.address }}</p>
                    <p>Hotline: {{ items.contact.phone }}</p>
                    <p>Email: {{ items.contact.email }}</p>
                </div>
                <div class="contact-logo">
                    <a href="https://www.facebook.com/evietcapog" target="_blank"><font-awesome-icon icon="fa-brands fa-facebook" style="font-size: 32px; color: #1364f1;" /></a>
                    <a href="https://www.youtube.com/@Sontungmtp" target="_blank"><font-awesome-icon icon="fa-brands fa-youtube" style="font-size: 32px; color: #f20202;" /></a>
                    <a href="https://github.com/ChuVanVie" target="_blank"><font-awesome-icon icon="fa-brands fa-square-github" style="font-size: 32px;" /></a>
                </div>
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

.footer-title {
    width: fit-content;
}

.footer-title p {
    font-size: 20px;
    font-weight: bold;
    text-transform: uppercase;
}

.footer-title .line {
    width: 100%;
    margin: 8px 0 16px 0;
    border: 2px solid #337ab7;
}

.contact-text p {
    margin: 8px 0;
    font-weight: 600;
}

.contact-logo a {
    margin-right: 16px;
}
</style>