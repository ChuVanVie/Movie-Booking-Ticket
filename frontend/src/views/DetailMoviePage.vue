<script setup>

</script>
<template>
    <div id="detail-movie">
        <div class="badge">
            <p>Trang chủ</p>
            <font-awesome-icon icon="fa-solid fa-chevron-right" style="font-size: 16px; margin: 8px 12px 0 12px;" />
            <p style="color: #03599d">Movie Name</p>
        </div>
        <div class="intro-container">
            <div class="left-intro">
                <div class="poster">
                    <img src="https://img.ophim9.cc/uploads/movies/dai-chien-nguoi-khong-lo-phan-cuoi-poster.jpg" alt="" width="256" height="400" style="cursor: pointer">
                </div>
                <div class="btn-reserve">
                    <button>Đặt vé</button>
                </div>
            </div>
            <div class="right-intro">
                <p class="movie-name">Đại Chiến Người Khổng Lồ (Phần Cuối)</p>
                <p class="movie-desc">Trấn Hồn Nhai Phần 3 &nbsp; kể về câu chuyện Thiếu niên trấn hồng tướng Tào Diệm Binh sở hữu cơ thể Võ Thần, vì muốn tìm tung tích cha mẹ đã cùng thiếu nữ Hạ Linh và các đồng môn xâm nhập cấm địa Linh vực Lô Hoa Cổ Lâu, đồng thời triển khai giao chiến cùng tứ vương bảo vệ Phong Hoa Tuyết Nguyệt.</p>
                <div class="movie-info">
                    <p class="key">Thể loại:</p>
                    <p class="value">Hành Động, Viễn Tưởng, Kinh dị</p>
                </div>
                <div class="movie-info">
                    <p class="key">Quốc gia: </p>
                    <p class="value">Nhật Bản</p>
                </div>
                <div class="movie-info">
                    <p class="key">Thời lượng:</p>
                    <p class="value">60 phút</p>
                </div>
                <div class="movie-info">
                    <p class="key">Năm: </p>
                    <p class="value">2023</p>
                </div>
                <div class="movie-info">
                    <p class="key">Đánh giá: </p>
                    <p class="value">8.7/10</p>
                </div>
                <div class="movie-info">
                    <p class="key">Ngày khởi chiếu: </p>
                    <p class="value">12/12/2023</p>
                </div>
            </div>
        </div>
    </div>
    <div class="trailer-container">
            <div class="trailer">
                <p>Trailer</p>
                <div class="line"></div>
            </div>
            <video width="640" height="360" controls>
                <source src="https://1080.opstream4.com/share/9d2f78b13eda78c1cb7627677db9935f" type="video/mp4">
                Your browser does not support the video tag.
            </video>
    </div>
</template>
<style scoped>
#detail-movie {
    padding: 24px 250px 64px 250px;
}

.badge {
    display: flex;
    align-items: center;
    margin-bottom: 24px;
}

.badge p {
    font-size: 28px;
    font-weight: 500;
}

.intro-container {
    display: flex;
}

.intro-container .left-intro {
    margin-right: 48px;
}

.left-intro .poster img {
    width: 256px;
    height: 400px;
    border-radius: 16px;
}

.left-intro .btn-reserve button {
    width: 100%;
    padding: 16px 0;
    margin-top: 12px;
    border: unset;
    background-color: #231f20;
    cursor: pointer;
    color: #c0b687;
    font-size: 20px;
    font-weight: bold;
    text-align: center;
}
.right-intro {
    padding: 16px 0;
}

.right-intro p {
    font-size: 18px;
}

.right-intro .movie-name {
    font-size: 33px !important;
    font-weight: bold;
    margin-bottom: 15px !important;
}

.right-intro .movie-desc {
    margin: 24px 0;
}

.right-intro .movie-info {
    display: flex;
    margin-bottom: 4px;
}

.right-intro .movie-info .key {
    width: 250px;
    font-weight: bold;
    text-transform: uppercase;
}

.trailer-container {
    background-color: #333333;
    display: flex;
    flex-direction: column;
    align-items: center;
}
.trailer-container .trailer {
    width: fit-content;
}

.trailer-container .trailer p {
    color: #fff;
    font-size: 33px !important;
    font-weight: bold;
    margin-bottom: 35px !important;
}

.trailer-container .trailer line {
    width: 100%;
    margin: 8px 0 16px 0;
    border: 2px solid #337ab7;
}
</style>