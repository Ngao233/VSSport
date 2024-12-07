<?php  
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (!isset($_SESSION['id_KhachHang'])) {
    exit();
} 

$id_KhachHang = $_SESSION['id_KhachHang']; // Lấy id khách hàng từ session

try {
    // Truy vấn id của khách hàng
    $sql = "SELECT * FROM khachhang WHERE id_KhachHang = :id_KhachHang";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_KhachHang', $id_KhachHang, PDO::PARAM_INT);
    $stmt->execute();
    $khach = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (!$khach) {
        exit('Không tìm thấy khách hàng.');
    }
} catch (PDOException $e) {
    exit('Lỗi kết nối: ' . $e->getMessage());
}
?> 

<link rel="stylesheet" href="public/css/doimatkhau.css">

<div class="khung">
    <div class="background-image"></div>
    <div class="left-box">
        <div class="profile-container">
            <div class="avatar">
                <i class="fas fa-camera"></i>
            </div>
            <div class="user-info">
                <div class="user-name"><?= htmlspecialchars($khach['Ho'] . ' ' . $khach['Ten']) ?></div>
                <button class="edit-profile"><i class="fas fa-pen"></i>Sửa hồ sơ</button>
            </div>
        </div>
        <div class="profile-list">
            <ul>
              <li class="fa fa-user"></li><a href="hoso">Tài khoảng của tôi</a><br>

              <a href="hoso" class="little">Hồ sơ</a><br>

              <a href="diachi" class="little">Địa chỉ</a><br>

              <a href="doimatkhau" class="little">Đổi mật khẩu</a><br>

              <li class="fa fa-book"></li><a href="#">Lịch sử mua</a><br>

              <li class="fa fa-heart"></li><a href="#">Sản phẩm yêu thích</a><br>

              <a href="#">Đăng xuất</a><br>
            </ul>
        </div>
    </div>
    <div class="right-box">
      <h2>Đổi mật khẩu</h2>
      <form method="POST" action="update_password">
          <label for="password">Nhập mật khẩu cũ:</label>
          <input type="password" name="password" id="password" placeholder="Nhập mật khẩu cũ" required>
          <br>
          <label for="newpassword">Nhập mật khẩu mới của bạn:</label>
          <input type="password" name="newpassword" id="newpassword" placeholder="Nhập mật khẩu mới" required>
          <br>
          <label for="renewpassword">Nhập lại mật khẩu mới của bạn:</label>
          <input type="password" name="renewpassword" id="renewpassword" placeholder="Nhập lại mật khẩu mới" required>
          <br>
          <button type="submit"><i class="fas fa-sign-in-alt"></i> Cập nhật</button>
      </form>
    </div>
  
      </div>
    </div>
    
    
