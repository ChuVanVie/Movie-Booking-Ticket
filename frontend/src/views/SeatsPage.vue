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
                    <div class="seat-item middle" v-for="i in 8" :key="i">B{{ i }}</div>
                    <div class="seat-item middle" v-for="i in 8" :key="i">C{{ i }}</div>
                    <div class="seat-item normal" v-for="i in 8" :key="i">D{{ i }}</div>
                    <div class="seat-item normal" v-for="i in 8" :key="i">E{{ i }}</div>
                </div>
            </div>
            <div class="info-seat">
                <div class="seat-item reserved"></div>
                <div class="seat-item you"></div>
                <div class="seat-item vip"></div>
                <div class="seat-item middle"></div>
                <div class="seat-item normal"></div>
            </div>
        </div>
        <div id="reservation-container">
            <div class="showtime">
                <p class="title">Thông tin suất chiếu</p>
                <div class="movie">Movie: </div>
                <div class="cinema">Cinema: </div>
                <div class="theater">Theater: </div>
            </div>
            <div class="seats-selected">
                <p class="title">Chỗ ngồi đã chọn</p>

            </div>
            <div class="cost">
                <p class="title">Thông tin thanh toán</p>
            </div>
            <div class="btn-payment">
                <button>Thanh toán</button>
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
    padding-left: 16px;
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
}

.seats-row {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 10px;
}

.seats-row .seat-item {
    font-size: 16px;
    font-weight: bold;
    padding: 8px;
    border-radius: 4px;
}


</style>