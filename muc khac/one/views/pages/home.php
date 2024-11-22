<style>
.banner-after-cate {
    max-width: 100%;
}

.banner-after-cate img {
    width: 100%;
}

.buy-now-section {
    padding: 20px;
}

.product-showcase {
    position: relative;
    animation: fadeIn 1s ease-in-out;
}

.section-title {
    font-size: 2rem;
    color: #333;
    font-weight: bold;
    margin-bottom: 0.5rem;
    animation: slideIn 1s ease-in-out;
}

.section-subtitle {
    font-size: 1.2rem;
    color: #666;
    margin-bottom: 1.5rem;
    animation: slideIn 1s ease-in-out;
}

.main-product-image {
    border: 3px solid #444;
    padding: 8px;
    border-radius: 8px;
    overflow: hidden;
    transition: box-shadow 0.3s ease-in-out;
}

.main-product-image:hover {
    box-shadow: 0px 10px 25px rgba(0, 0, 0, 0.5);
}

.main-img {
    width: 100%;
    border-radius: 8px;
    transition: transform 0.3s ease-in-out;
}

.main-img:hover {
    transform: scale(1.05);
}

.product-name {
    font-weight: bold;
    color: #333;
    margin-top: 10px;
    animation: fadeIn 1.5s ease-in-out;
}

.product-description {
    color: #777;
    font-size: 1rem;
    margin: 0.5rem 0 1rem;
    animation: fadeIn 1.8s ease-in-out;
}

.additional-images .small-image img {
    width: 80px;
    height: 80px;
    border-radius: 6px;
    transition: transform 0.2s, border 0.2s;
    cursor: pointer;
    border: 2px solid transparent;
    animation: fadeIn 2s ease-in-out;
}

.additional-images .small-image img:hover {
    transform: scale(1.1);
    border: 2px solid #333;
}

.video-container video {
    border-radius: 12px;
    box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.3);
}

/* Animations */
@keyframes fadeIn {
    from {
        opacity: 0;
    }

    to {
        opacity: 1;
    }
}

@keyframes slideIn {
    from {
        transform: translateX(-50px);
        opacity: 0;
    }

    to {
        transform: translateX(0);
        opacity: 1;
    }
}

/* khoang cách section khampha */
.media-container {
    height: 280px;
    overflow: hidden;
    width: 250px !important;
}

/*  */
.product-card img {
    max-width: 100%;
    height: 260;
    object-fit: cover;
}

.product-card a {
    text-decoration: none;
    color: inherit;
    transition: transform 0.3s ease-in-out;
}

/* countdown */
.countdown-timer {
    display: inline-block;
    padding: 10px 20px;
    border-radius: 10px;
    background: linear-gradient(90deg, #ff7e5f, #feb47b);
    /* Hiệu ứng gradient */
    color: white;
    font-size: 1.2rem;
    font-weight: bold;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    text-align: center;
    animation: pulse 2s infinite;
    letter-spacing: 1px;
}
</style>
<?php 
    $product =  new products();
    $bestsellers= $product->show_products($product->bessellers());
    $discount_html = $product ->show_products($product ->discount());
    // print_r($product->bessellers());
    $category = $product ->category_html($product -> category()) ;
?>
<!-- Banner -->
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="views/assets/img/poster/banner.gif" class="d-block w-100" alt="...">
        </div>
    </div>
</div>

<!-- Bestsellers Section -->
<section class="container my-5">
    <h4 class="text-left section-title ">SẢN PHẨM BÁN CHẠY</h4>
    <div class="box-product row row-cols-1 row-cols-md-4 g-3">
        <!-- Product Card Example -->
        <?=$bestsellers ?>

    </div>
</section>

<!-- Categories Section -->
<section class="container my-5">
    <h4 class="text-left section-title">DANH MỤC</h4>
    <div class="row row-cols-1 row-cols-md-4 g-3">
        <?=$category?>
    </div>
</section>

<div class="banner-after-cate">
    <img src="/DUAN1/views/assets/img/poster/lac.webp" alt="">
</div>

<!-- sale -->

<!-- SALE Section -->
<section class="container my-5">
    <h4 class="text-left section-title">SALE SẬP SÀN</h4>
    <div class="row row-cols-1 row-cols-md-4 g-3 my-5">
        <!-- Product Card Example -->
        <?=$discount_html?>
    </div>
</section>

<!-- Buy Now Section -->
<section class="container my-5 buy-now-section">
    <div class="row">
        <!-- countdown -->
        <p id="countdown-timer" class="countdown-timer"></p>

        <!-- Left Column: Product Showcase -->
        <div class="col-md-6 d-flex align-items-center">
            <div class="video-container">
                <img style="margin-top: -170px;" src="/DUAN1/views/assets/img/poster/anhmau.gif" autoplay loop muted
                    class="img-fluid rounded">
                </img>
            </div>
        </div>
        <!--  Right Column: Video/GIF Section-->
        <div class="col-md-6">
            <div class="product-showcase text-center">
                <!-- Title and Subtitle -->
                <h2 class="section-title">BỘ SƯU TẬP MỚI</h2>
                <p class="section-subtitle">Khám phá bộ sưu tập mới nhất của chúng tôi</p>

                <!-- Main Product Image -->
                <div class="main-product-image mb-3">
                    <img src="/DUAN1/views/assets/img/product/hoaco.avif" alt="Main Product" id="mainImage1"
                        class="img-fluid main-img">
                </div>

                <!-- Product Name and Description -->
                <h3 class="product-name">Heart Pendant</h3>
                <p class="product-description">Được chế tác sang trọng, bộ sưu tập này tạo thêm nét quyến rũ cho bất kỳ
                    trang phục nào.</p>

                <!-- Buy Now Button -->
                <button class="btn btn-dark mt-3 mb-4">MUA NGAY</button>

                <!-- Additional Images -->
                <div class="additional-images d-flex justify-content-center">
                    <div class="small-image me-2">
                        <img src="/DUAN1/views/assets/img/product/vong.avif" alt="Product Image 1"
                            class="img-fluid thumbnail" onclick="changeImage1(this)">
                    </div>
                    <div class="small-image me-2">
                        <img src="/DUAN1/views/assets/img/product/tronvang.webp" alt="Product Image 2"
                            class="img-fluid thumbnail" onclick="changeImage1(this)">
                    </div>
                    <div class="small-image">
                        <img src="/DUAN1/views/assets/img/product/vongdeo.webp" alt="Product Image 3"
                            class="img-fluid thumbnail" onclick="changeImage1(this)">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- For more section -->
<div class="container d-flex align-items-center p-5">
    <!-- Image Section -->
    <div class="image-box me-4">
        <img src="/DUAN1/views/assets/img/poster/hopqua.webp" alt="Jewelry Box" class="img-fluid rounded">
    </div>

    <!-- Text Section -->
    <div class="text-box p-4">
        <h3 class="title">SÁNG TẠO CÂU CHUYỆN CỦA RIÊNG BẠN</h3>
        <p class="description">
            Bộ sưu tập mùa lễ không chỉ mang đến những món quà quý giá - đó còn là những hành động ý
            nghĩa, một kết
            nối sống động, và biểu hiện sâu sắc của tình yêu. Những món trang sức tuyệt đẹp này sẽ
            trở thành những
            kỷ niệm quý báu, được những người thân yêu của bạn nâng niu và trân trọng mãi mãi về
            sau.
        </p>
        <button class="btn btn-dark">BUY NOW</button>
    </div>
</div>


<section class="container my-5 buy-now-section">
    <div class="row">
        <!-- countdown -->
        <p id="countdown-timer" class="countdown-timer"></p>
        <!-- Left Column: Product Showcase -->
        <div class="col-md-6">
            <div class="product-showcase text-center">
                <!-- Title and Subtitle -->
                <h2 class="section-title">BỘ SƯU TẬP MỚI</h2>
                <p class="section-subtitle">Khám phá bộ sưu tập mới nhất của chúng tôi</p>

                <!-- Main Product Image -->
                <div class="main-product-image mb-3">
                    <img src="/DUAN1/views/assets/img/product/heart.webp" alt="Main Product" id="mainImage1"
                        class="img-fluid main-img">
                </div>

                <!-- Product Name and Description -->
                <h3 class="product-name">Heart Pendant</h3>
                <p class="product-description">Được chế tác sang trọng, bộ sưu tập này tạo thêm nét quyến rũ cho bất kỳ
                    trang phục nào.</p>

                <!-- Buy Now Button -->
                <button class="btn btn-dark mt-3 mb-4">MUA NGAY</button>

                <!-- Additional Images -->
                <div class="additional-images d-flex justify-content-center">
                    <div class="small-image me-2">
                        <img src="/DUAN1/views/assets/img/product/heart.webp" alt="Product Image 1"
                            class="img-fluid thumbnail" onclick="changeImage(this)">
                    </div>
                    <div class="small-image me-2">
                        <img src="/DUAN1/views/assets/img/product/quaivat.webp" alt="Product Image 2"
                            class="img-fluid thumbnail" onclick="changeImage(this)">
                    </div>
                    <div class="small-image">
                        <img src="/DUAN1/views/assets/img/product/heart.webp" alt="Product Image 3"
                            class="img-fluid thumbnail" onclick="changeImage(this)">
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column: Video/GIF Section -->
        <div class="col-md-6 d-flex align-items-center">
            <div class="video-container">
                <video src="/DUAN1/views/assets/img/video/video.mp4" autoplay loop muted class="img-fluid rounded">
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>
    </div>
</section>





<!-- khampha Section -->
<section class="container my-5">
    <h4 class="text-left section-title">KHÁM PHÁ</h4>
    <div class="row row-cols-1 row-cols-sm-3 row-cols-md-3 row-cols-lg-4 g-4">
        <!-- Product Card Example -->
        <div class="col-3">
            <div class="product-card fixed-height-card text-left">
                <div class="media-container">
                    <img src="/DUAN1/views/assets/img/catalog/anh.png" alt="Product">
                </div>
                <p class="product-name-kp">NHẪN</p>
                <p style="font-size: 13px; font-weight: 500; text-decoration: underline;" class="product-name-kp">
                    XEM
                    NGAY</p>
            </div>
        </div>
        <div class="col-3">
            <div class="product-card fixed-height-card text-left">
                <div class="media-container">
                    <video src="/DUAN1/views/assets/img/video/videothu.mp4" autoplay muted loop></video>
                </div>
                <p class="product-name-kp">HALLOWEEN x CHARM</p>
                <p style="font-size: 13px; font-weight: 500; text-decoration: underline;" class="product-name-kp">
                    XEM
                    NGAY</p>
            </div>
        </div>
        <div class="col-3">
            <div class="product-card fixed-height-card text-left">
                <div class="media-container">
                    <img src="/DUAN1/views/assets/img/catalog/khoc.webp" alt="Product">
                </div>
                <p class="product-name-kp">VÒNG TAY</p>
                <p style="font-size: 13px; font-weight: 500; text-decoration: underline;" class="product-name-kp">
                    XEM
                    NGAY</p>
            </div>
        </div>
        <div class="col-3">
            <div class="product-card fixed-height-card text-left">
                <div class="media-container">
                    <video src="/DUAN1/views/assets/img/video/videohong.mp4" autoplay muted loop></video>
                </div>
                <p class="product-name-kp">CẢM XÚC</p>
                <p style="font-size: 13px; font-weight: 500; text-decoration: underline;" class="product-name-kp">
                    XEM
                    NGAY</p>
            </div>
        </div>
    </div>
</section>

<script>
function changeImage(element) {
    const mainImage = document.getElementById('mainImage');
    mainImage.src = element.src;
}

function changeImage1(element) {
    const mainImage1 = document.getElementById('mainImage1');
    mainImage1.src = element.src
}

// Hàm countdown
function startCountdown(endTime) {
    const timerElement = document.getElementById('countdown-timer');

    function updateCountdown() {
        const now = new Date().getTime();
        const timeLeft = endTime - now;

        if (timeLeft <= 0) {
            timerElement.textContent = "Hết thời gian giảm giá!";
            clearInterval(countdownInterval);
            return;
        }

        const days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
        const hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);

        timerElement.textContent = `Còn lại: ${days} ngày ${hours} giờ ${minutes} phút ${seconds} giây`;
    }

    // loop sau moi giay
    updateCountdown();
    const countdownInterval = setInterval(updateCountdown, 1000);
}

// Thiết lập thời gian kết thúc (ví dụ 3 ngày kể từ hiện tại)
const saleEndTime = new Date().getTime() + 3 * 24 * 60 * 60 * 1000; // Thêm 3 ngày
startCountdown(saleEndTime);
</script>





<!-- Footer -->