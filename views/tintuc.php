<style>
                    
        /**/

        header{
            display: flex;
            flex-direction: column;
            font-family:'Poppins', sans-serif;
            
        }

        /* menu chinh */
        .menu-two {
            background-color: #FFA031;
            display: flex;
            flex-direction: Row;
            justify-content: space-between;
            height: 50px;
        }
        .menu-two ul{
            font-weight: bold;
            font-size: 14px;
            padding: 0;
            display: flex;
            flex-direction: Row;
            color: white;
        }
        .menu-two ul li{
            list-style-type: none;
            margin-right: 20px;
            letter-spacing: 2px;
            color: white;
        }
        .menu-two ul li a{
            color: white;
            text-decoration: none;
        }
        .menu-two img{
            margin-left: 25px;
        }
        /* menu phu */
        .menu-one ul{
            margin: inherit;
            justify-content: space-between;
            font-size: 12px;
            display: flex;
            flex-direction: Row;
            color: white ;

        }
        .menu-one{
            background-color: #5c3911;
        }
        .menu-one ul div{
            display: flex;
            flex-direction: Row;
            
        }
        .menu-one ul li {
            list-style-type: none;
            margin-right: 20px;
            letter-spacing: 2px;
        }
        .menu-one ul li a{
            color: white;
            text-decoration: none;
        }   
        /* Icon (Giỏ hàng, người dùng, tìm kiếm) */
        .icon{
            display: flex;
            flex-direction: row;
            align-items: Center;
            margin-right: 4%;
        }

        .icon form {
            display: flex;
            margin-right: 20px;
        }

        .icon input[type="text"] {
            padding: 8px;
            border: none;
            border-radius: 4px;
            font-size: 14px;
        }

        .icon button {
            background-color: transparent;
            border: none;
            color: white;
            font-size: 18px;
            cursor: pointer;
        }

        .icon a {
            margin-left: 15px;
            color: white;
            font-size: 20px;
            transition: color 0.3s;
        }
        .product-sale-home{
            display: grid;
            grid-template-columns: repeat(5,1fr);
            width: 80%;
            margin-left: 10%;
            gap: 27px;
            grid-template-columns: 18% 18% 18% 18% 18%;
            grid-template-rows: 350px;
            margin-right: 10%;
            text-align: center;
            font-family: 'Montserrat', sans-serif;   
            
        }
        .product-sale-home div{
            border-radius: 5px;
            background-color: #ffffff;
            
        }

        .product-sale-home .pro-sale img{
            width: 100%;
            margin-top: 15px;

        }


        .pro-sale {
            position: relative;
            border:solid 1px #FFA031;
            box-shadow: 1px 0px 0px 0px #FFA031,   
                    -1px 0px 0px 0px #FFA031,  
                        0px 1px 0px 0px #FFA031,   
                        0px -1px 0px 0px #FFA031;
        }
        .pro-sale .circle {
            border-radius: 50px;
        }
        .circle i{
            padding: 13px;
            color:#a8a8a8;
        }
        .circle{
            background-color: white;
            position: absolute;
            border-radius: 50px;
            top: 5px;
            right: 6px;
            border:solid 1px #888;
        }
        .circle :hover{
            background-color: #FFA031;
            border-radius: 50px;
            color: white;
            border:solid 1px white;
        }
        .p-product-sale{
            display: grid;
            grid-template-columns: repeat(2,1fr);
            margin-top: -20px;
            width: 80%;
            margin-left: 10%;
        }
        .p-product-sale .price-sale-home{
            text-decoration: line-through;  
            color: #c9c7c7;
            font-size: 12px;
            margin-top: 19px;
        }
        .pro-sale button{
            background-color: #ff9f313e;
            padding: 8px;
            margin-top: -20px;
            border-radius: 5px;
            font-family: 'Montserrat', sans-serif; 
            font-weight: bold;
            color: #FFA031;
            border: none;
        }
        .pro-sale button:hover{
            background-color: #ff9f31;
            font-family: 'Montserrat', sans-serif; 
            font-weight: bold;
            color: #ffffff;
            border: none;
        }

        .price-down-home{
            color: red;
            font-weight: bold;
            font-size: 16px;
        }
</style>
    </head>
    
    <body>
        <header>
            <!-- menu phu -->
            <nav class="menu-one">
                <ul>
                    <li><a href="#">VSSport.vn</a></li>
                    <div>
                        <li><a href="#">Giúp đỡ</a></li>
                        <li><a href="#">Ngôn ngữ</a></li>
                    </div>
                </ul>
            </nav>
            <!-- menu chinh -->
            <nav class="menu-two">
                <a href="#"><img src="public/image/logo.png" alt="" style="width: 155px ;"></a>
                <ul>
                    <li><a href="#">TRANG CHỦ</a></li>
                    <li><a href="sanpham">SẢN PHẨM</a></li>
                    <li><a href="">THÔNG TIN</a></li>
                    <li><a href="views/dangky.html">ĐĂNG KÝ</a></li>
                    <li><a href="views/dangnhap.html">ĐĂNG NHẬP</a></li>
                </ul>
                <!-- icon bao gom "shoping" "user" "seach" -->
                <div class="icon">
      <i id="search" style="color: white; font-size: 20px;margin-top:-2px" class="fa-solid fa-magnifying-glass"></i>
        <a href="cart"><i class="fa-solid fa-cart-shopping"></i></a>
        <a href="hoso"><i class="fa-solid fa-user"></i></a>
        
      </div>
      <form action="searchome" class="formSearchhome" method="post" style="top:30px">
                <input type="search" class="searchhome" name = "search" id="searchInput" placeholder="Tìm Kiếm Sản Phẩm">
            </form>

    <style>
    .formSearchhome{
    position: absolute;
    right: 180px;
    top: 35px;
     }
    .searchhome {
    padding: 8px !important;
    border: none;
    border-radius: 5px;
    width: 180px;
    display: none;
    transition: transform 1s ease;
    transform: translateX(100%);
     }
    .searchhome.show {  
    display: block; 
    transform: translateX(0);  
     }
      </style>

  <link rel="stylesheet" href="../public/css/tintuc.css">
  <style>
    .add-comment-a form{
    background-color: white;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    max-width: 500px;
    margin: 0 auto;
    }
    .add-comment-a label {
      display: block;
      margin-bottom: 5px;
      color: #555;
    }
    .add-comment-a input[type="text"],
    textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }
    .add-comment-a input[type="submit"] {
      background-color: orange;
      color: white;
      padding: 10px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      width: 100%;
  }
  </style>
</head>

<body>
  <main class="news-container-a">
    <article class="news-article-a">
      <?php      
      // Lấy ID từ tham số URL
      if (isset($_GET['id'])) {
          $id = intval($_GET['id']); // Chuyển đổi ID thành số nguyên để bảo mật
          $news = getInfoDetail( $id); // Gọi hàm lấy tin tức theo ID
          $binhluan = getComment( $id);
          // Kiểm tra và hiển thị dữ liệu
          if ($news) {
              echo '<h1 class="article-title-a">' . htmlspecialchars($news['TieuDe']) . '</h1>';
              echo '<div class="article-meta-a">';
              echo '<span>Ngày đăng: ' . htmlspecialchars($news['NgayDang']) . '</span>';
              echo '</div>';
              echo '<div class="article-intro-a">';
              echo '<p>' . htmlspecialchars($news['NoiDung']) . '</p>';
              echo '</div>';
              echo '<div class="article-thumbnail-a">';
              echo '<img src="../public/image/' . htmlspecialchars($news['HinhAnh']) . '" alt="Áo Thun Thể Thao" />';
              echo '</div>';
              
              // Nội dung bài viết
              echo '<div class="article-content-a">';
              echo '<h2>Tại Sao Áo Thun Thể Thao Lại Được Săn Đón?</h2>';
              echo '<p>Dưới đây là những lý do chính khiến áo thun thể thao trở thành xu hướng:</p>';
              echo '<ul>';
              echo '<li><strong>Thiết Kế Thông Minh:</strong> Áo thun được làm từ chất liệu thoáng khí, co giãn, đảm bảo sự thoải mái.</li>';
              echo '<li><strong>Đa Dạng Kiểu Dáng:</strong> Nhiều mẫu mã và màu sắc giúp người mặc tự do lựa chọn.</li>';
              echo '<li><strong>Tính Ứng Dụng Cao:</strong> Dễ dàng phối hợp với nhiều loại trang phục khác nhau.</li>';
              echo '</ul>';
              echo '<p>Không chỉ dành riêng cho hoạt động thể thao, áo thun còn thích hợp với các dịp thường ngày.</p>';
              echo '</div>';

              // Liên hệ để mua sản phẩm
              echo '<h2>Liên Hệ Để Mua Sản Phẩm</h2>';
              echo '<div class="product-links-a">';
              echo '<p>📞 Hotline: <a href="tel:0987654321">0987 654 321</a></p>';
              echo '<p>🔗 Link sản phẩm: <a href="https://example.com/ao-thun-the-thao" target="_blank">Xem chi tiết sản phẩm</a></p>';
              echo '<P>Zalo: <a href="">Của chúng tôi</a></P>';
              echo '<p>Facebook: <a href="">Của chúng tôi</a></p>';
              echo '</div>';

              // Lợi ích của việc sở hữu áo thun thể thao
              echo '<h2>Lợi Ích Của Việc Sở Hữu Áo Thun Thể Thao</h2>';
              echo '<div class="article-content-a">';
              echo '<ul>';
              echo '<li>Tăng sự thoải mái và khả năng vận động.</li>';
              echo '<li>Phong cách thời trang hiện đại.</li>';
              echo '<li>Giá thành hợp lý, dễ dàng tiếp cận.</li>';
              echo '</ul>';
              echo '</div>';
          } else {
              echo "Tin tức không tồn tại.";
          }
      } else {
          echo "ID tin tức không hợp lệ.";
      }
      ?>
      
      <div class="product-rating">
        <p>Đánh giá sản phẩm</p>
        <div id="rating-stars">
          <span data-star="1">⭐</span>
          <span data-star="2">⭐</span>
          <span data-star="3">⭐</span>
          <span data-star="4">⭐</span>
          <span data-star="5">⭐</span>
        </div>
        <button id="submit-rating">Gửi đánh giá</button>
      </div>
      <h2>Bình Luận</h2>
      <div id="comment-list">
          <!-- Các bình luận đã có -->
          <?php if (is_array($binhluan) && !empty($binhluan)): ?>
              <?php foreach ($binhluan as $bl): ?>
                  <div class="comment-a">
                    <small><?php echo htmlspecialchars($bl['ThoiGianBinhLuan']); ?></small>
                    <p><?php echo $bl['NoiDung']; ?></p>
                    <?php if (!empty($bl['HinhAnh'])): ?>
                        <img src="../public/image/<?php echo htmlspecialchars($bl['HinhAnh']); ?>" alt="Hình bình luận" style="max-width: 100px;"/>
                    <?php endif; ?>
                  </div>
              <?php endforeach; ?>
          <?php else: ?>
              <p>Chưa có bình luận nào.</p>
          <?php endif; ?>
      </div>
      <h3>Gửi Bình Luận</h3>
        <form action="addcomment" method="POST" class="add-comment-a">
            <label for="ten">Tên:</label>
            <input type="text" id="ten" name="ten" required class="comment-text"><br><br>

            <label for="binh_luan">Bình Luận:</label><br>
            <textarea id="binh_luan" name="binh_luan" rows="4" required class="comment-text"></textarea><br><br>

            <input type="submit" value="Gửi Bình Luận" id="submit-comment">
        </form>

    <aside class="related-news-a">
      <h2>Các Tin Liên Quan</h2>
      <ul>
        <li><a href="https://example.com/tin1" target="_blank">Cách Chọn Áo Thun Thể Thao Phù Hợp Với Dáng Người</a></li>
        <li><a href="https://example.com/tin2" target="_blank">Top 5 Mẫu Áo Thun Hot Nhất Mùa Hè 2024</a></li>
        <li><a href="https://example.com/tin3" target="_blank">Phối Đồ Thể Thao Cực Chất Với Áo Thun</a></li>
        <li><a href="https://example.com/tin4" target="_blank">Xu Hướng Thời Trang Thể Thao Mới Nhất</a></li>
      </ul>
    </aside>
  </main>

  <script>
  document.addEventListener('DOMContentLoaded', function() {
    // Xử lý đánh giá sao
    const stars = document.querySelectorAll('#rating-stars span');
    let selectedRating = 0;

    stars.forEach(star => {
      star.addEventListener('click', function() {
        selectedRating = this.getAttribute('data-star'); // Lấy giá trị sao được chọn
        stars.forEach(s => s.classList.remove('active')); // Xóa trạng thái active
        for (let i = 0; i < selectedRating; i++) {
          stars[i].classList.add('active'); // Thêm trạng thái active cho các sao được chọn
        }
      });
    });

    document.getElementById('submit-rating').addEventListener('click', function() {
      if (selectedRating > 0) {
        alert(`Cảm ơn bạn đã đánh giá ${selectedRating} sao!`);
      } else {
        alert('Vui lòng chọn số sao trước khi gửi đánh giá.');
      }
    });

    // Xử lý bình luận
    const commentText = document.getElementById('comment-text'); // Lấy ô nhập nội dung
    const commentList = document.getElementById('comment-list'); // Lấy danh sách bình luận
    const submitComment = document.getElementById('submit-comment'); // Lấy nút gửi

    submitComment.addEventListener('click', function() {
      const comment = commentText.value.trim(); // Lấy nội dung bình luận
      if (comment === '') {
        alert('Vui lòng nhập nội dung bình luận.');
        return;
      }

      // Tạo một phần tử bình luận mới
      const newComment = document.createElement('div');
      newComment.classList.add('comment-a');
      newComment.innerHTML = `
              <strong>Người dùng:</strong>
              <p>${comment}</p>
          `;

      // Thêm bình luận mới lên đầu danh sách
      if (commentList.firstChild) {
        commentList.insertBefore(newComment, commentList.firstChild);
      } else {
        commentList.appendChild(newComment); // Nếu không có bình luận nào, thêm vào danh sách
      }

      // Xóa nội dung ô nhập sau khi gửi
      commentText.value = '';
    });
  });
  </script>

</body>

</html>