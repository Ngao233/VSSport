<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tin Tức Áo Thun Thể Thao</title>
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