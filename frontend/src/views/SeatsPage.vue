<script setup>
import { ref, reactive, onMounted } from 'vue';
import { useRouter, useRoute } from "vue-router";
import TheLoading from "@/components/TheLoading.vue";
import { toast } from "vue3-toastify";
import { useAuthStore } from "../store/useAuth";
import { useShowtimeStore } from "../store/useShowtime";
import { useReservationStore } from "../store/useReservation";

const route = useRoute();
const router = useRouter();
const showtimeId = ref(route.params.id);

const authStore = useAuthStore();
const showtimeStore = useShowtimeStore();
const reservationStore = useReservationStore();

const reservationInfo = reactive({
    vipSeat: [],
    isChoosedVipSeat: [],
    middleSeat: [],
    isChoosedMiddleSeat: [],
    normalSeat: [],
    isChoosedNormalSeat: [],
});

onMounted(async () => {
    await showtimeStore.getDetailShowtime(showtimeId.value);
    await showtimeStore.getAllSeats(showtimeId.value, authStore.accessToken);
    console.log(showtimeStore.detailShowtime);
});

const selectVipSeat = (seat) => {
    if (seat.seat_statuses[0].status == 2) return;
    if (reservationInfo.isChoosedVipSeat[seat.id]) {
        reservationInfo.isChoosedVipSeat[seat.id] = false;
        reservationInfo.vipSeat.pop(seat);
    }
    else {
        reservationInfo.isChoosedVipSeat[seat.id] = true;
        reservationInfo.vipSeat.push(seat);
    }
}

const selectMiddleSeat = (seat) => {
    if (seat.seat_statuses[0].status == 2) return;
    if (reservationInfo.isChoosedMiddleSeat[seat.id]) {
        reservationInfo.isChoosedMiddleSeat[seat.id] = false;
        reservationInfo.middleSeat.pop(seat);
    }
    else {
        reservationInfo.isChoosedMiddleSeat[seat.id] = true;
        reservationInfo.middleSeat.push(seat);
    }
}

const selectNormalSeat = (seat) => {
    if (seat.seat_statuses[0].status == 2) return;
    if (reservationInfo.isChoosedNormalSeat[seat.id]) {
        reservationInfo.isChoosedNormalSeat[seat.id] = false;
        reservationInfo.normalSeat.pop(seat);
    }
    else {
        reservationInfo.isChoosedNormalSeat[seat.id] = true;
        reservationInfo.normalSeat.push(seat);
    }
}

const handlePayment = async () => {
    const seatIds = [];
    const mergedArraySeat = reservationInfo.vipSeat.concat(reservationInfo.middleSeat, reservationInfo.normalSeat);
    console.log(mergedArraySeat, mergedArraySeat.length);
    if (mergedArraySeat.length !== 0) {
        mergedArraySeat.forEach(element => {
            seatIds.push(element.id);
        });

        await reservationStore.createNewReservation({
            showtimeId: showtimeId.value,
            seatIds: seatIds,
            token: authStore.accessToken
        });

        if (reservationStore.isCreatedSuccess) {
            router.push('/');
            toast.success("Create new reservation successful!");
        }
        else {
            toast.error("An unexpected error occurred!");
        }
    }
}

</script>
<template>
    <div id="seats-container">
        <div id="screen-container">
            <div class="screen-area">
                <div class="screen">Màn hình</div>
                <div class="door-area">
                    <div class="door">
                        <p style="transform: rotate(-90deg);">Door</p>
                    </div>
                    <div class="door">
                        <p style="transform: rotate(90deg);">Door</p>
                    </div>
                </div>
            </div>
            <div class="seats-area">
                <TheLoading v-if="showtimeStore.isLoading"></TheLoading>
                <div class="seats-row" v-if="showtimeStore.allSeats.seat_A">
                    <div class="seat-item vip" v-for="seat in showtimeStore.allSeats.seat_A" :key="seat.id"
                        :class="{ 'reserved': seat.seat_statuses[0].status == 2, 'you': reservationInfo.isChoosedVipSeat[seat.id] }"
                        @click="selectVipSeat(seat)">
                        {{ seat.seat_number }}
                    </div>
                </div>
                <div class="seats-row" v-if="showtimeStore.allSeats.seat_B">
                    <div class="seat-item middle" v-for="seat in showtimeStore.allSeats.seat_B" :key="seat.id"
                        :class="{ 'reserved': seat.seat_statuses[0].status == 2, 'you': reservationInfo.isChoosedMiddleSeat[seat.id] }"
                        @click="selectMiddleSeat(seat)">
                        {{ seat.seat_number }}</div>
                </div>
                <div class="seats-row" v-if="showtimeStore.allSeats.seat_C">
                    <div class="seat-item middle" v-for="seat in showtimeStore.allSeats.seat_C" :key="seat.id"
                        :class="{ 'reserved': seat.seat_statuses[0].status == 2, 'you': reservationInfo.isChoosedMiddleSeat[seat.id] }"
                        @click="selectMiddleSeat(seat)">
                        {{ seat.seat_number }}</div>
                </div>
                <div class="seats-row" v-if="showtimeStore.allSeats.seat_D">
                    <div class="seat-item normal" v-for="seat in showtimeStore.allSeats.seat_D" :key="seat.id"
                        :class="{ 'reserved': seat.seat_statuses[0].status == 2, 'you': reservationInfo.isChoosedNormalSeat[seat.id] }"
                        @click="selectNormalSeat(seat)">
                        {{ seat.seat_number }}</div>
                </div>
                <div class="seats-row" v-if="showtimeStore.allSeats.seat_E">
                    <div class="seat-item normal" v-for="seat in showtimeStore.allSeats.seat_E" :key="seat.id"
                        :class="{ 'reserved': seat.seat_statuses[0].status == 2, 'you': reservationInfo.isChoosedNormalSeat[seat.id] }"
                        @click="selectNormalSeat(seat)">
                        {{ seat.seat_number }}</div>
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
                <p class="showtime-info">Movie: <span style="font-size: 18px; font-weight: 600; margin-left: 8px">{{
                    showtimeStore.detailShowtime.movie.movie_name }}</span></p>
                <p class="showtime-info">Rạp: <span style="font-size: 18px; font-weight: 600; margin-left: 8px">{{
                    showtimeStore.detailShowtime.cinema.cinema_name }}</span></p>
                <p class="showtime-info">Phòng chiếu: <span style="font-size: 18px; font-weight: 600; margin-left: 8px">{{
                    showtimeStore.detailShowtime.theater.theater_name }}</span></p>
                <p class="showtime-info">Thời gian: <span style="font-size: 18px; font-weight: 600; margin-left: 8px">
                        {{ showtimeStore.detailShowtime.start_time.substring(11, 16) }} ~ {{
                            showtimeStore.detailShowtime.end_time.substring(11, 16) }}</span></p>
            </div>
            <div class="seats-selected">
                <p class="title">Chỗ ngồi đã chọn</p>
                <div class="seats-reserved-container">
                    <div class="seat-item vip" v-for="vip in reservationInfo.vipSeat" :key="vip.id">{{ vip.seat_number }}
                    </div>
                    <div class="seat-item middle" v-for="middle in reservationInfo.middleSeat" :key="middle.id">{{
                        middle.seat_number }}</div>
                    <div class="seat-item normal" v-for="normal in reservationInfo.normalSeat" :key="normal.id">{{
                        normal.seat_number }}</div>
                </div>
            </div>
            <div class="cost">
                <p class="title">Thông tin thanh toán</p>
                <div class="seats-payment-container">
                    <div class="cost-row">
                        <div class="seat-item vip">{{ reservationInfo.vipSeat.length }}</div>
                        <p>x 80000 =</p>
                        <strong>{{ reservationInfo.vipSeat.length * 80000 }} VNĐ</strong>
                    </div>
                    <div class="cost-row">
                        <div class="seat-item middle">{{ reservationInfo.middleSeat.length }}</div>
                        <p>x 60000 =</p>
                        <strong>{{ reservationInfo.middleSeat.length * 60000 }} VNĐ</strong>
                    </div>
                    <div class="cost-row">
                        <div class="seat-item normal">{{ reservationInfo.normalSeat.length }}</div>
                        <p>x 40000 =</p>
                        <strong>{{ reservationInfo.normalSeat.length * 40000 }} VNĐ</strong>
                    </div>
                    <div class="cost-row">
                        <p>Tổng: </p>
                        <strong>{{ reservationInfo.vipSeat.length * 80000 + reservationInfo.middleSeat.length * 60000 +
                            reservationInfo.normalSeat.length * 40000 }} VNĐ</strong>
                    </div>
                </div>
                <button class="btn-payment" @click="handlePayment">Thanh toán</button>
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
    position: relative;
    margin-top: 32px;
}

.seats-row {
    display: flex;
    align-items: center;
    justify-content: center;
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

.vip.reserved,
.middle.reserved,
.normal.reserved,
.reserved {
    color: #fff;
    background-color: #a0a0a0;
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
    font-weight: normal;
    margin-bottom: 10px;
}

.seats-selected {
    min-height: 200px;
    padding-top: 8px;
}

.seats-selected .seats-reserved-container {
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