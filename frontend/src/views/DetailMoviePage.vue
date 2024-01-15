<script setup>

</script>
<template>
    <div id="detail-movie">
        <div class="badge">
            <p>Trang chủ</p>
            <font-awesome-icon icon="fa-solid fa-chevron-right" style="font-size: 16px; margin: 8px 12px 0 12px;" />
            <p style="color: #03599d">Phim</p>
        </div>
        <div class="intro-container">
            <div class="left-intro">
                <div class="poster">
                    <img src="https://img.ophim10.cc/uploads/movies/cong-chua-da-den-gio-tham-van-roi-poster.jpg" alt=""
                        style="width: 100%; height: 400px; cursor: pointer">
                </div>
                <div class="btn-reserve">
                    <router-link to="/ticketing">
                        <button>Đặt vé</button>
                    </router-link>
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
            <div class="b-line"></div>
            <div class="all-rate">
                <p>Xếp hạng và đánh giá phim</p>
                <div class="new-rate">
                    <div class="star-area">
                        <p class="star-title">Xếp hạng</p>
                        <div class="starscore"></div>
                        <div class="star-sum">
                            <span>0</span> điểm
                        </div>
                    </div>
                    <textarea title="Nhập đánh giá phim" id="" cols="30" rows="10" placeholder="Bạn có thể đánh giá phim sau khi đăng nhập."></textarea>
                    <div class="btn-send-rate">
                        <button>Gửi đánh giá</button>
                    </div>
                </div>
                <div class="b-line" style="margin-top: 16px;"></div>
                <div class="list-rate">
                    <div class="rate-item">
                        <div class="left-rate">
                            <div class="items-center gap-12">
                                <span class="user-name">Em việt</span>
                                <div class="starscore"></div><span>8</span>
                            </div>
                            <div class="rate-comment">Hài phết!! Xem giải trí thôi chứ để mà xuất sắc thì chưa tới..</div>
                        </div>
                        <div class="right-rate">
                            <p class="rate-created-at">12/01/2024</p>
                        </div>
                    </div>
                    <div class="c-line"></div>
                    <div class="rate-item">
                        <div class="left-rate">
                            <div class="items-center gap-12">
                                <span class="user-name">Em việt</span>
                                <div class="starscore"></div><span>8</span>
                            </div>
                            <div class="rate-comment">Hài phết!! Xem giải trí thôi chứ để mà xuất sắc thì chưa tới..</div>
                        </div>
                        <div class="right-rate">
                            <p class="rate-created-at">12/01/2024</p>
                        </div>
                    </div>
                    <div class="c-line"></div>
                    <div class="rate-item">
                        <div class="left-rate">
                            <div class="items-center gap-12">
                                <span class="user-name">Em việt</span>
                                <div class="starscore"></div><span>8</span>
                            </div>
                            <div class="rate-comment">Hài phết!! Xem giải trí thôi chứ để mà xuất sắc thì chưa tới..</div>
                        </div>
                        <div class="right-rate">
                            <p class="rate-created-at">12/01/2024</p>
                        </div>
                    </div>
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
    width: 20%;
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
    max-width: 60%;
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
    padding: 40px 0 24px 0;
    display: flex;
    justify-content: space-between;
}

.rating-container .all-rate {
    padding: 40px 0;
}

.all-rate>p {
    font-size: 32px;
    font-weight: 600;
    margin-bottom: 24px;
}

.all-rate .new-rate {
    border: 1px solid #dedede;
    display: flex;
}

.new-rate .star-area {
    width: 15%;
    border-right: 1px solid #dedede;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.star-area .star-title {
    font-size: 16px;
    font-weight: 600;
}

.starscore {
    display: inline-block;
    vertical-align: middle;
    width: 80px;
    height: 15px;
    background: url(../assets/img/icon_score_star.png) no-repeat 0 -18px;
}

.new-rate textarea {
    width: 70%;
    height: 100px;
    color: #666;
    background-color: #f5f5f5;
    padding: 10px;
    border: none;
    resize: none;
}

.new-rate textarea:focus {
    outline: none;
}

.new-rate .btn-send-rate {
    width: 15%;
}

.btn-send-rate button {
    width: 100%;
    height: 100%;
    font-size: 18px;
    font-weight: bold;
    background-color: #3c3e4d;
    border: none;
    text-align: center;
    color: #cdc197;
    cursor: pointer;
}

.all-rate .list-rate {
    min-height: 480px;
    color: #000;
    background-color: #fff;
    padding: 16px 0;
}


.all-rate .list-rate .rate-item {
    padding: 0 48px;
    display: flex;
    Justify-content: space-between;
}

.rate-item .user-name {
    font-size: 20px;
    font-weight: 600;
}

.rate-item .rate-comment {
    margin-top: 4px;
}

.b-line {
    border: 1px solid #fff;
}

.c-line {
    margin: 16px 0;
    border-bottom: 1px solid #dadada;
}
</style>