<script setup>
import { ref, onMounted } from 'vue';
import TheLoading from "@/components/TheLoading.vue";
import DetailReservation from "@/components/DetailReservation.vue";
// import { toast } from "vue3-toastify";
import { useAuthStore } from "../store/useAuth";
import { useReservationStore } from "../store/useReservation";


const authStore = useAuthStore();
const reservationStore = useReservationStore();

onMounted(async () => {
    await reservationStore.getAllReservation(authStore.accessToken);
});

const customDateFormat = (date) => {
    date = new Date(date);
    return `${date.getDate()}/${date.getMonth() + 1}/${date.getFullYear()}`;
};

const isShowReservation = ref(false);

const showDetailReservation = () => {
    isShowReservation.value = true;
}

const closeDetailReservation = () => {
    isShowReservation.value = false;
}

</script>
<template>
    <div id="re-container">
        <div class="header">Các vé đã đặt</div>
        <div style="display: flex; gap: 36px;">
            <div class="reservation-list">
                <TheLoading v-if="reservationStore.isLoading"></TheLoading>
                <div class="reservation-title">
                    <p style="flex: 1">ID</p>
                    <p style="flex: 2">Mã vé</p>
                    <p style="flex: 3">Tổng tiền</p>
                    <p style="flex: 4">Ngày đặt</p>
                    <p style="flex: 1"></p>
                </div>
                <div class="reservation-item" v-for="reservation in reservationStore.allReservation" :key="reservation.id">
                    <p style="flex: 1">{{ reservation.id }}</p>
                    <p style="flex: 2">{{ reservation.ticket_code }}</p>
                    <p style="flex: 3">{{ reservation.total_price }}</p>
                    <p style="flex: 4">{{ customDateFormat(reservation.created_at) }}</p>
                    <p style="flex: 1" class="detail" @click="showDetailReservation">Chi tiết</p>
                </div>
            </div>
            <DetailReservation style="width: 40%" v-if="isShowReservation" @closeDetail="closeDetailReservation">
            </DetailReservation>
        </div>
    </div>
</template>
<style scoped>
#re-container {
    padding: 40px 200px 80px 200px;
}

.header {
    font-size: 30px;
    font-weight: bold;
    text-transform: uppercase;
    margin-bottom: 36px;
}

.reservation-list {
    width: 60%;
    border: 1px solid #bbb;
    border-collapse: collapse;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    overflow-x: auto;
    position: relative;
}

.reservation-list .reservation-title,
.reservation-list .reservation-item {
    border-bottom: 1px solid #bbb;
    display: flex;
    align-items: center;
}

.reservation-list .reservation-title p,
.reservation-list .reservation-item p {
    font-size: 16px;
    text-align: center;
    padding: 10px 6px;
}

.reservation-list .reservation-title {
    background-color: #bdbdbd;
}

.reservation-list .reservation-title p {
    font-weight: 600;
}

.reservation-list .reservation-item .detail:hover {
    color: #0300c5;
    cursor: pointer;
}
</style>