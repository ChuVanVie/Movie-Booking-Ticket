<script setup>

</script>
<template>
    <div id="ticketing-container">
        <div class="showtime-info">
            <div class="date">
                <p>Ngày</p>
                <p>13/01/2024(Thứ Bảy)</p>
            </div>
            <div class="cinema">
                <p>Rạp</p>
                <div class="choosed">
                    <p>Hà Đông</p>
                    <font-awesome-icon icon="fa-solid fa-square-xmark" class="i-cancel"/>
                </div>
            </div>
            <div class="movie">
                <p>Phim</p>
                <div class="choosed">
                    <p>MẬT VỤ ONG</p>
                    <font-awesome-icon icon="fa-solid fa-square-xmark" class="i-cancel"/>
                </div>
            </div>
        </div>
    </div>
</template>
<style scoped>
#ticketing-container {
    padding: 24px 200px;
    background-color: #f9f6ec;
}

#ticketing-container .showtime-info {
    padding: 20px 15px 15px;
    background-color: #dad2b4;
    display: flex;
    align-items: center;
    justify-content: space-around;
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
</style>