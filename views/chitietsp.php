<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Montserrat&family=Raleway&family=Lato&family=Rubik&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Roboto&family=Nunito&family=Source+Sans+Pro&family=Josefin+Sans&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/d4c9783f89.js" crossorigin="anonymous"></script>
    <style>
        body h2 {
            font-family: 'Montserrat', sans-serif;
            margin-left: 10%;
            margin-top: 40px;
        }
    </style>
</head>

<body>
    <header>
        <nav class="menu-one">
            <ul>
                <li><a href="#">VSSport.vn</a></li>
                <div>
                    <li><a href="#">Giúp đỡ</a></li>
                    <li><a href="#">Ngôn ngữ</a></li>
                </div>
            </ul>
        </nav>
        <nav class="menu-two">
            <a href="#"><img src="../image/logo.png" alt="" style="width: 155px;"></a>
            <ul>
                <li><a href="#">TRANG CHỦ</a></li>
                <li><a href="views/sanpham.php">SẢN PHẨM</a></li>
                <li><a href="#">THÔNG TIN</a></li>
                <li><a href="views/dangky.php">ĐĂNG KÝ</a></li>
                <li><a href="views/dangnhap.php">ĐĂNG NHẬP</a></li>
            </ul>
            <div class="icon">
                <a href="#"><i class="fa-solid fa-cart-shopping"></i></a>
                <a href="#"><i class="fa-solid fa-user"></i></a>
                <a href="#"><i class="fa-solid fa-magnifying-glass"></i></a>
            </div>
        </nav>
    </header><br>
    <section class="duy">
        <div>
            <body onload="loadImgs()">
                <div><img src="img/pic-0.jpg" id="hoa" onmouseover="mouseover()" onmouseout="mouseout()" width="540px" /></div>
            </body>
        </div>
        <div>
            <h1 class="hhhhh"><span>Manchester City Away Jersey 2024/25</span></h1>
            <hr>
            <div>
                <?php
                // Hiển thị các hình ảnh dưới dạng vòng lặp
                for ($i = 0; $i < 4; $i++) {
                    echo '<img src="img/pic-' . $i . '.jpg" class="nham" width="70px" onclick="showimage(' . $i . ')">';
                }
                ?>
            </div>
            <script>
                var imgArr = [];
                var curIndex = 0;

                function loadImgs() {
                    for (let i = 0; i <= 4; i++) {
                        imgArr[i] = new Image();
                        imgArr[i].src = "img/pic-" + i + ".jpg";
                    }
                }

                function showimage(i) {
                    document.getElementById("hoa").src = imgArr[i].src;
                }
            </script>
            <p class="ngum">Giá Sản Phẩm</p>
            <p class="ngu">271.000VNĐ</p>
            <button class="time"><i class="fa-solid fa-heart"></i>Thêm vào yêu thích</button>
            <script>
                document.querySelector('.time').addEventListener('click', function() {
                    this.classList.toggle('active');
                    if (this.classList.contains('active')) {
                        this.textContent = 'Đã thêm vào yêu thích';
                    } else {
                        this.textContent = 'Thêm vào yêu thích';
                    }
                });
            </script>
            <div class="size-selection">
                <p class="p-product-sale-name">Chọn kích thước:</p>
                <?php
                // Tạo các nút kích thước thông qua vòng lặp
                $sizes = ['S', 'M', 'L', 'XL', 'XXL'];
                foreach ($sizes as $size) {
                    echo '<button class="size">' . $size . '</button>';
                }
                ?>
            </div>
        </div>
    </section>
    <section class="product-sale-home">
        <h1 class="weywie">Sản phẩm tương tự</h1>
        <?php
        // Hiển thị sản phẩm mẫu thông qua PHP
        for ($i = 0; $i < 5; $i++) {
            echo '
                <div class="pro-sale">
                    <img src="../image/mc-chinh.webp" alt="">
                    <div class="circle">
                        <a href=""><i class="fa-solid fa-heart"></i></a>
                    </div>
                    <div>
                        <p class="p-product-sale-name">Áo Manchester City</p>
                        <div class="p-product-sale">
                            <p class="price-sale-home">230000 đ</p>
                            <p class="price-down-home">190000 đ</p>
                        </div>
                        <button>Thêm giỏ hàng</button>
                    </div>
                </div>';
        }
        ?>
    </section>
</body>

</html>
