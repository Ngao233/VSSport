
    <section class="duy">
        <div>
            <body onload="loadImgs()">
                <div><img src="" id="hoa" onmouseover="mouseover()" onmouseout="mouseout()" width="540px" /></div>
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
