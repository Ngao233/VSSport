
<!DOCTYPE html>  
<html lang="vi">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Trang Đăng nhập</title>  
    <link rel="stylesheet" href="public/css/style1.css">
    <link rel="stylesheet" href="public/css/dangnhap.css">
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
        <li><a href="home">TRANG CHỦ</a></li>
        <li><a href="sanpham.html">SẢN PHẨM</a></li>
        <li><a href="#">THÔNG TIN</a></li>
        <li><a href="register">ĐĂNG KÝ</a></li>
        <li><a href="dangnhap">ĐĂNG NHẬP</a></li>
      </ul>
      <!-- icon bao gom "shoping" "user" "seach" -->
      <div class="icon">
        <a href=""><i class="fa-solid fa-cart-shopping"></i></a>
        <a href="profile"><i class="fa-solid fa-user"></i></a>
        <a href=""><i class="fa-solid fa-magnifying-glass"></i></a>
      </div>
      
    </nav>
  </header>
  <?php  


// Xử lý đăng nhập  
if ($_SERVER['REQUEST_METHOD'] === 'POST') {  
    $email = $_POST['email'] ?? '';  
    $matKhau = $_POST['matKhau'] ?? '';  

    $sql = "SELECT id_KhachHang, MatKhau FROM khachhang WHERE Email = :Email";  
    $stmt = $conn->prepare($sql);  
    $stmt->bindParam(':Email', $email);  
    $stmt->execute();  

    if ($stmt->rowCount() > 0) {  
        $row = $stmt->fetch(PDO::FETCH_ASSOC);  

        // So sánh mật khẩu trực tiếp nếu mật khẩu lưu dưới dạng plain text  
        if ($matKhau === $row['MatKhau']) {  
            session_start(); // Đảm bảo khởi động session nếu chưa khởi động  
            $_SESSION['id_KhachHang'] = $row['id_KhachHang'];  
            header("Location: profile"); // Chuyển hướng thành công  
            exit();  
        } else {  
            echo "Mật khẩu không chính xác."; // Thông báo lỗi mật khẩu  
        }  
    } else {  
        echo "Không tìm thấy tài khoản với email này."; // Thông báo lỗi tài khoản  
    }  
}  
?>  

  <div class="khungDN">
      <div class="background-image"></div>
      <div class="dangnhap">
      <form method="POST" action="login"> 
        <h1>Đăng nhập</h1>
        <input type="text" name="Email" id="Email" placeholder="Nhập Email">
        <br>
        <input type="text" name="MatKhau" placeholder="Nhập mật khẩu">
        <br>
        <button type="submit"><i class="fas fa-sign-in-alt"></i> Đăng nhập</button>
        <br>
        </form>
        <p>Đăng nhập bằng cách khác</p>
        <div class="cachDN">
          <button onclick="loginWithGoogle()"><i class="fab fa-google"></i> Đăng nhập bằng Google</button>
          <br>
          <button onclick="loginWithFacebook()"><i class="fab fa-facebook"></i> Đăng nhập bằng Facebook</button>  
        </div>
  
      </div>
    </div>
    </div>
    <?php  
include 'views/footer.php';  
// Gọi hàm xử lý đăng ký  
?>  