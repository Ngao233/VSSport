<<<<<<< HEAD
=======
<?php  
session_start();   

if (!isset($_SESSION['id_KhachHang'])) {  
    // Nếu người dùng chưa đăng nhập, chuyển hướng về trang đăng nhập  
    header("Location: dangnhap"); 
     
    exit();  
}  

$id_KhachHang = $_SESSION['id_KhachHang'];  

// Lấy thông tin khách hàng từ cơ sở dữ liệu  
$sql = "SELECT * FROM khachhang WHERE id_KhachHang = :id_KhachHang";  
$stmt = $conn->prepare($sql);  
$stmt->bindParam(':id_KhachHang', $id_KhachHang);  
$stmt->execute();  
$customer = $stmt->fetch(PDO::FETCH_ASSOC);  

if (!$customer) {  
    echo "Không tìm thấy thông tin khách hàng.";  
    exit();  
}  
?>  
>>>>>>> main
<!DOCTYPE html>  
<html lang="vi">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Trang Chủ</title>  
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="public/css/hoso.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins&family=Montserrat&family=Raleway&family=Lato&family=Rubik&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Roboto&family=Nunito&family=Source+Sans+Pro&family=Josefin+Sans&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Roboto&family=Nunito&family=Source+Sans+Pro&family=Josefin+Sans&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

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
      <a href="#"><img src="image/logo.png" alt="" style="width: 155px ;"></a>
      <ul>
<<<<<<< HEAD
        <li><a href="../index.html">TRANG CHỦ</a></li>
        <li><a href="sanpham.html">SẢN PHẨM</a></li>
        <li><a href="#">THÔNG TIN</a></li>
        <li><a href="dangky.html">ĐĂNG KÝ</a></li>
        <li><a href="dangnhap.html">ĐĂNG NHẬP</a></li>
=======
        <li><a href="">TRANG CHỦ</a></li>
        <li><a href="sanpham.html">SẢN PHẨM</a></li>
        <li><a href="#">THÔNG TIN</a></li>
        <li><a href="register">ĐĂNG KÝ</a></li>
        <li><a href="dangnhap">ĐĂNG NHẬP</a></li>
>>>>>>> main
      </ul>
      <!-- icon bao gom "shoping" "user" "seach" -->
      <div class="icon">
        <a href=""><i class="fa-solid fa-cart-shopping"></i></a>
        <a href="#"><i class="fa-solid fa-user"></i></a>
        <a href=""><i class="fa-solid fa-magnifying-glass"></i></a>
      </div>
      
    </nav>
  </header>
<!-- Form đăng nhập-->
    <div class="khung">
      <div class="background-image"></div>
      <div class="left-box">
        <div class="profile-container">
          <div class="avatar">
            <i class="fas fa-camera"></i>
          </div>
          <div class="user-info">
            <div class="user-name"><?php echo htmlspecialchars($customer['Ho']); ?>-<?php echo htmlspecialchars($customer['Ten']); ?></div>
            <button class="edit-profile"><i class="fas fa-pen"></i>Sửa hồ sơ</button>
          </div>
        </div>
        <div class="profile-list">
            <li class="fa fa-user"></li><a href="#">Tài khoảng của tôi</a><br>
            <a href="#" class="little">Hồ sơ</a><br>
            <a href="diachi" class="little">Địa chỉ</a><br>
            <a href="#" class="little">Đổi mật khẩu</a><br>
            <li class="fa fa-book"></li><a href="#">Lịch sử mua</a><br>
            <li class="fa fa-heart"></li><a href="#">Sản phẩm yêu thích</a><br>
            <a href="logout">Đăng xuất</a><br>

          </ul>
        </div>
      </div>
      <div class="right-box">
        <div class="leftin-box">
          <h2>Hồ sơ của tôi</h2>
<<<<<<< HEAD
          <div class="little-input">
            <h3>Tên đăng nhập</h3><input type="text" id="username" placeholder="Nhập tên tài khoảng">
          </div>
=======
>>>>>>> main
          <div class="little-input">
            <h3>Họ </h3><input type="text" id="password" value="<?php echo htmlspecialchars($customer['Ho']); ?>" placeholder="Nhập mật khẩu">
          </div>
          <div class="little-input">
            <h3>Ten </h3><input type="text" id="password" value="<?php echo htmlspecialchars($customer['Ten']); ?>" placeholder="Nhập mật khẩu">
          </div>
          <div class="little-input">
            <h3>Mật khẩu </h3><input type="password" id="password" value="<?php echo htmlspecialchars($customer['MatKhau']); ?>" placeholder="Nhập mật khẩu">
          </div>
          <div class="little-input">
            <h3>Email </h3><input type="Email" id="repassword" value="<?php echo htmlspecialchars($customer['Email']); ?>" placeholder="Nhập lại mật khẩu">
          </div>
          <div class="little-input">
            <h3>Số điện thoại</h3><input type="text" id="age" value="<?php echo htmlspecialchars($customer['Sdt']); ?>" placeholder="Nhập số điện thoại">
          </div>
          <div class="little-input">
            <h3>Ngày sinh</h3><input type="text" id="age" placeholder="Nhập tuổi">
          </div>
          <br>
          <button onclick="editProfile()"><i class="fas fa-sign-in-alt"></i> Đăng ký</button>

        </div>
        <div class="rightin-box">
          <div class="image-profile">
            <i class="fas fa-camera"></i>
          </div>
          <div class="fixbutton">
            <br>
            <button class="edit-profile"><i class="fas fa-pen"></i>Sửa ảnh</button>
            

          </div>
        </div>
  
      </div>
    </div>
    
    


<!-- Footer-->

    