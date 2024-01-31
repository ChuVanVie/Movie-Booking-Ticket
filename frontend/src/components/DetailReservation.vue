<script setup>
import { onMounted } from 'vue';
import TheLoading from "@/components/TheLoading.vue";
import { useAuthStore } from "../store/useAuth";
import { useReservationStore } from "../store/useReservation";


const authStore = useAuthStore();
const reservationStore = useReservationStore();

onMounted(async () => {
    await reservationStore.getDetailReservation({
        reservationId: 11,
        token: authStore.accessToken
    });
});

</script>
<template>
    <div class="detail-res-container">
        <div class="header">
            <p>Thông tin suất chiếu</p>
            <font-awesome-icon icon="fa-solid fa-xmark" style="font-size: 24px; cursor: pointer;"
                @click="$emit('closeDetail')" />
        </div>
        <div class="content">
            <TheLoading v-if="reservationStore.isLoading"></TheLoading>
            <div class="res-info">
                <p class="info">Mã vé:</p>
                <span class="value-info">{{ reservationStore.detailReservation.ticket_code }}</span>
            </div>
            <div class="res-info">
                <p class="info">Thời gian:</p>
                <span class="value-info">{{ reservationStore.detailReservation.showtime.start_time.substring(11, 16) }} ~ {{
                    reservationStore.detailReservation.showtime.end_time.substring(11, 16) }}</span>
            </div>
            <div class="res-info">
                <p class="info">Phim: </p>
                <span class="value-info">{{ reservationStore.detailReservation.movie.movie_name }}</span>
            </div>
            <div class="res-info">
                <p class="info">Rạp chiếu: </p>
                <span class="value-info">{{ reservationStore.detailReservation.cinema.cinema_name }}</span>
            </div>
            <div class="res-info">
                <p class="info">Phòng chiếu: </p>
                <span class="value-info">{{ reservationStore.detailReservation.theater.theater_name }}</span>
            </div>
            <div class="res-info">
                <p class="info">Số ghế: </p>
                <span class="value-info">{{ reservationStore.detailReservation.seat_numbers.join(', ') }}</span>
            </div>
            <div class="res-info">
                <p class="info">Tổng tiền: </p>
                <span class="value-info">{{ reservationStore.detailReservation.total_price }}</span>
            </div>
        </div>
    </div>
</template>
<style scoped>
.detail-res-container {
    width: 100%;
    height: 300px;
    border: 1px solid #bbb;
    border-collapse: collapse;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

.header {
    padding: 12px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.header p {
    font-size: 28px;
    font-weight: 600;
}

.content {
    position: relative;
}

.content .res-info {
    padding-left: 12px;
    margin-bottom: 10px;
    display: flex;
}

.content .res-info p,
.content .res-info span {
    font-size: 16px;
    font-weight: normal;
}

.res-info .info {
    width: 120px;
}

.res-info .value-info {
    font-size: 18px !important;
    font-weight: 600 !important;
    margin-left: 8px;
}
</style>