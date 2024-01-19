<script setup>

</script>
<template>
    <div id="seats-container">
        <div id="screen-container">
            <div class="screen-area">
                <div class="screen">Màn hình</div>
                <div class="door-area">
                    <div class="door"><p style="transform: rotate(-90deg);">Door</p></div>
                    <div class="door"><p style="transform: rotate(90deg);">Door</p></div>
                </div>
            </div>
            <div class="seats-area">
                <div class="seats-row">
                    <div class="seat-item vip" v-for="i in 8" :key="i">A{{ i }}</div>
                </div>
                <div class="seats-row">
                    <div class="seat-item middle" v-for="i in 8" :key="i">B{{ i }}</div>
                </div>
                <div class="seats-row">
                    <div class="seat-item middle" v-for="i in 8" :key="i">C{{ i }}</div>
                </div>
                <div class="seats-row">
                    <div class="seat-item normal" v-for="i in 8" :key="i">D{{ i }}</div>
                </div>
                <div class="seats-row">
                    <div class="seat-item normal" v-for="i in 8" :key="i">E{{ i }}</div>
                </div>
            </div>
            <div class="info-seat">
                <div class="seat-item reserved">Đã đặt</div>
                <div class="seat-item you">Bạn</div>
                <div class="seat-item vip">VIP</div>
                <div class="seat-item middle">Trung</div>
                <div class="seat-item normal">Thường</div>
            </div>
        </div>
        <div id="reservation-container">
            <div class="showtime">
                <p class="title">Thông tin suất chiếu</p>
                <p class="showtime-info">Movie: </p>
                <p class="showtime-info">Cinema: </p>
                <p class="showtime-info">Theater: </p>
            </div>
            <div class="seats-selected">
                <p class="title">Chỗ ngồi đã chọn</p>
                <div class="seats-reserved-container">
                    <div class="seat-item vip">A5</div>
                    <div class="seat-item middle">B3</div>
                    <div class="seat-item normal">D1</div>
                </div>
            </div>
            <div class="cost">
                <p class="title">Thông tin thanh toán</p>
                <div class="seats-payment-container">
                    <div class="cost-row">
                        <div class="seat-item vip">1</div>
                        <p>x 80000 =</p>
                        <strong>80000 VNĐ</strong>
                    </div>
                    <div class="cost-row">
                        <div class="seat-item middle">1</div>
                        <p>x 60000 =</p>
                        <strong>60000 VNĐ</strong>
                    </div>
                    <div class="cost-row">
                        <div class="seat-item normal">1</div>
                        <p>x 40000 =</p>
                        <strong>40000 VNĐ</strong>
                    </div>
                </div>
                <button class="btn-payment">Thanh toán</button>
            </div>
        </div>
    </div>
</template>
<style scoped>
#seats-container {
    padding: 48px 200px;
    display: flex;
}

#screen-container {
    width: 60%;
    display: flex;
    flex-direction: column;
    align-items: center;
}

#reservation-container {
    width: 40%;
    padding-left: 64px;
}

.screen-area {
    width: 100%;
    height: auto;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.screen-area .screen {
    width: 70%;
    height: 40px;
    font-size: 24px;
    font-weight: 600;
    text-transform: uppercase;
    text-align: center;
    vertical-align: middle;
    padding-top: 4px;
    border: 4px solid #0e5be0;
    border-top-left-radius: 50%;
    border-top-right-radius: 50%;
}

.screen-area .door-area {
    width: 100%;
    display: flex;
    justify-content: space-between;
}

.screen-area .door-area .door {
    padding: 20px 0;
    color: #fff;
    background-color: #09388a;
    border-radius: 4px;
}

.seats-area {
    display: flex;
    flex-direction: column;
    margin-top: 32px;
}

.seats-row {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 10px;
}

.seat-item {
    width: 40px;
    height: 40px;
    font-size: 16px;
    font-weight: bold;
    padding: 8px;
    border-radius: 4px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
}

.info-seat {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-top: 32px;
}

.info-seat .seat-item {
    width: 48px;
    height: 48px;
    font-size: 12px;
    padding: 12px 0px;
    border-radius: 4px;
}

.vip {
    color: #fff;
    background-color: #ffa500;
}

.middle {
    background-color: #66cc00;
}

.normal {
    background-color: #ffff99;
}

.reserved {
    color: #fff;
    background-color: #a0a0a0 !important;
}

.you {
    color: #fff;
    background-color: #ff0000 !important;
}

.title {
    font-size: 32px;
    font-weight: normal;
    margin: 24px 0;
}

.showtime .showtime-info {
    font-size: 16px;
    font-weight: 600;
    margin-bottom: 16px;
}

.seats-selected {
    min-height: 200px;
}

.seats-selected .seats-reserved-container{
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}

.cost .seats-payment-container {
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.cost .seats-payment-container .cost-row {
    display: flex;
    align-items: center;
    gap: 20px;
}

.cost .btn-payment {
    color: #fff;
    font-size: 16px;
    font-weight: 600;
    background-color: #0066cc;
    padding: 8px 32px;
    margin-top: 24px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.cost .btn-payment:hover {
    background-color: #003d7a;
}

</style>