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
                    <img src="https://img.ophim10.cc/uploads/movies/dai-chien-nguoi-khong-lo-phan-cuoi-poster.jpg" alt=""
                        width="256" height="400" style="cursor: pointer">
                </div>
                <div class="btn-reserve">
                    <button>Đặt vé</button>
                </div>
            </div>
            <div class="right-intro">
                <p class="movie-name">Đại Chiến Người Khổng Lồ (Phần Cuối)</p>
                <p class="movie-desc">Trấn Hồn Nhai Phần 3 &nbsp; kể về câu chuyện Thiếu niên trấn hồng tướng Tào Diệm Binh
                    sở hữu cơ thể Võ Thần, vì muốn tìm tung tích cha mẹ đã cùng thiếu nữ Hạ Linh và các đồng môn xâm nhập
                    cấm địa Linh vực Lô Hoa Cổ Lâu, đồng thời triển khai giao chiến cùng tứ vương bảo vệ Phong Hoa Tuyết
                    Nguyệt.</p>
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
                    <p class="key">Ngày khởi chiếu: </p>
                    <p class="value">12/12/2023</p>
                </div>
                <div class="movie-info">
                    <p class="key">Đánh giá: </p>
                    <p class="value">8.7/10</p>
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
            <source src="../assets/ctc8ns.mp4" type="video/mp4">
            <!-- <source src="https://1080.opstream4.com/share/9d2f78b13eda78c1cb7627677db9935f" type="video/mp4"> -->
            <!-- <source src="https://1080.opstream4.com/share/9d2f78b13eda78c1cb7627677db9935f" type="video/ogg"> -->
            Your browser does not support the video tag.
        </video>
        <div class="rating-container">
            <div class="total-rate">
                <div class="number-rate">0 ratings</div>
                <div class="sort-by">
                    Sort by Oldest/Newest
                </div>
            </div>
            <div class="b-line" style="border: 1px solid #fff;"></div>
            <div class="all-rate">
                <p>Xếp hạng và đánh giá phim</p>
                <div class="new-rate">
                    <div class="star">Số sao</div>
                    <input type="text" placeholder="Add your comment">
                    <button class="btn-send-rate">Gửi đánh giá</button>
                </div>
                <div class="list-rate">

                </div>
            </div>
        </div>
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
    color: #fff;
    background-color: #3c3e4d;
    overflow: hidden;
    padding: 0 200px;
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
    line-height: 1.5em;
    letter-spacing: -2px;
    font-weight: bold;
    text-transform: uppercase;
    margin: 40px 0 16px 0 !important;
}

.trailer-container .trailer .line {
    margin-bottom: 24px;
    border-bottom: 4px solid transparent;
    border-image: linear-gradient(to right, #39adf0 0%, #075fa3 100%);
    border-image-slice: 1;
    border-width: 0px 0px 4px 0px;
}

.rating-container {
    width: 100%;
}

.rating-container .total-rate {
    padding: 40px 0;
    display: flex;
    justify-content: space-between;
}

.rating-container .all-rate {
    padding: 40px 0;
}

.all-rate .new-rate {
    display: flex;
}

.all-rate .list-rate {}
</style>