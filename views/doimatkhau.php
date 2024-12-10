<?php
session_start();

if (isset($_SESSION['id_KhachHang'])) {
    $id_KhachHang = $_SESSION['id_KhachHang'];
    
    // Thực hiện truy vấn để lấy thông tin vai trò từ cơ sở dữ liệu
    $query = "SELECT VaiTro FROM khachhang WHERE id_KhachHang = :id_KhachHang";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id_KhachHang', $id_KhachHang);
    $stmt->execute();
    $vaiTro = $stmt->fetchColumn();

    if ($vaiTro == 1) {
        header("Location: $base_url/admin2");// Chuyển hướng đến trang admin
        exit();
    }

    try {
        // Truy vấn thông tin khách hàng
        $sql = "SELECT * FROM khachhang WHERE id_KhachHang = :id_KhachHang";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_KhachHang', $id_KhachHang, PDO::PARAM_INT);
        $stmt->execute();
        $khach = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$khach) {
            header("Location: dangnhap");
            exit();
        }

        
    } catch (PDOException $e) {
        exit('Lỗi kết nối: ' . $e->getMessage());
    }
} else {
    header("Location: dangnhap");
    exit();
}
?>

<link rel="stylesheet" href="public/css/doimatkhau.css">

<?php  
session_start();   
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (!isset($_SESSION['id_KhachHang'])) {
    exit();
} 

$id_KhachHang = $_SESSION['id_KhachHang']; 
try {

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

<!DOCTYPE html>  
<html lang="vi">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Trang Chủ</title>  
    <link rel="stylesheet" href="public/css/style1.css">
    <link rel="stylesheet" href="public/css/doimatkhau.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>  
<body>  
<header>
    <nav class="menu-one">
        <ul>
            <li><a href="home">VSSport.vn</a></li>
            <div>
                <li><a href="#">Giúp đỡ</a></li>
                <li><a href="#">Ngôn ngữ</a></li>
            </div>
        </ul>
    </nav>
    <nav class="menu-two">
        <a href="home"><img src="public/image/logo.png" alt="Logo" style="width: 155px;"></a>
        <ul>
                <li><a href="home">TRANG CHỦ</a></li>
                <li><a href="tonghoptt">THÔNG TIN</a></li>
                <li><a href="dangky">ĐĂNG KÝ</a></li>
                <li><a href="dangnhap">ĐĂNG NHẬP</a></li>
        </ul>
        <div class="icon">
      <i id="search" style="color: white; font-size: 20px;margin-top:-2px" class="fa-solid fa-magnifying-glass"></i>
        <a href="<?= $base_url ?>/giohang"><i class="fa-solid fa-cart-shopping"></i></a>
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

    <script>
      document.getElementById('search').addEventListener('click',()=>{
      document.getElementById('searchInput').classList.toggle('show');
     })
    </script>

    </nav>
</header>

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
    
 