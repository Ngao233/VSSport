<?php  
session_start();   
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!isset($_SESSION['id_KhachHang'])) {
    // Nếu không có id, chuyển hướng người dùng đến trang đăng nhập
    header("Location: dangnhap");
    exit; // Đảm bảo dừng việc thực thi mã ngay tại đây
}
$id_KhachHang = $_SESSION['id_KhachHang'];

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

<!DOCTYPE html>  
<html lang="vi">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Trang Chủ</title>  
    <link rel="stylesheet" href="public/css/style1.css">
    <link rel="stylesheet" href="public/css/hoso.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
        <a href="#"><img src="image/logo.png" alt="Logo" style="width: 155px;"></a>
        <ul>
            <li><a href="home">TRANG CHỦ</a></li>
            <li><a href="sanpham">SẢN PHẨM</a></li>
            <li><a href="#">THÔNG TIN</a></li>
            <li><a href="dangky">ĐĂNG KÝ</a></li>
            <li><a href="dangnhap">ĐĂNG NHẬP</a></li>
        </ul>
        <div class="icon">
            <a href="cart"><i class="fa-solid fa-cart-shopping"></i></a>
            <a href="hoso"><i class="fa-solid fa-user"></i></a>
            <a href="#"><i class="fa-solid fa-magnifying-glass"></i></a>
        </div>
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

              <a href="dangxuat">Đăng xuất</a><br>
            </ul>
        </div>
    </div>
    <div class="right-box">
        <div class="leftin-box">
        <h2>Hồ sơ của tôi</h2> 
        <form action="update_profile" method="POST"> 
            <div class="little-input"> 
                <h3>Họ </h3>
                <input type="text" id="ho" name="ho" value="<?php echo htmlspecialchars($khach['Ho'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Nhập họ"> 
            </div> 
            <div class="little-input"> 
                <h3>Tên </h3>
                <input type="text" id="ten" name="ten" value="<?php echo htmlspecialchars($khach['Ten'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Nhập tên">
            </div> 
            <div class="little-input"> 
                <h3>Email</h3> 
                <input type="email" name="email" value="<?php echo htmlspecialchars($khach['Email'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Nhập email" required> 
            </div> 
            <div class="little-input"> 
                <h3>Số điện thoại</h3> 
                <input type="text" name="phone" value="<?php echo htmlspecialchars($khach['Sdt'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Nhập số điện thoại" required> 
            </div> 
            <br> 
            <button type="submit"><i class="fas fa-sign-in-alt"></i> Cập nhật</button> 
        </form> 
        <?php if (isset($_GET['success'])): ?> 
            <div class="notification">Cập nhật hồ sơ thành công!</div> 
        <?php endif; ?>
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


<script>
    function editProfile() {
    // Lấy giá trị từ các trường nhập liệu
    const ten = document.getElementById('ten').value;
    const ho = document.getElementById('ho').value;
    const email = document.getElementById('email').value;
    const phone = document.getElementById('phone').value;

    // Kiểm tra tính hợp lệ của dữ liệu
    if (!email || !phone) {
        alert("Email và số điện thoại không được để trống.");
        return;
    }

    // Tạo đối tượng dữ liệu để gửi
    const data = {
        ten:ten,
        ho: ho,
        email: email,
        phone: phone
    };

    // Gửi yêu cầu AJAX để cập nhật hồ sơ
    fetch('update_profile', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert("Cập nhật hồ sơ thành công!");
            // Có thể làm mới trang hoặc cập nhật giao diện người dùng ở đây
        } else {
            alert("Cập nhật hồ sơ thất bại: " + data.message);
        }
    })
    .catch((error) => {
        console.error('Lỗi:', error);
        alert("Đã xảy ra lỗi khi cập nhật hồ sơ.");
    });
}
</script>
</body>
</html>


<!-- Footer-->

    <script src="../js/javascrip.js">

    </script>

    <footer>
        <div class="footer-column-left">
            <h3>Liên hệ</h3>
            <hr>
            <h3>Hotline: </h3>
            <p>(+84)098765432</p>
            <h3>Email: </h3>
            <p>support@gmail.com</p>
            <h3>Thời gian làm việc</h3>
            <p>06:00 - 18:00 hằng ngày</p>
        </div>
        <div class="footer-column-left">
            
        </div>
        <div class="footer-column-right">
            <h3>Theo dõi tại</h3>
            <hr>
            <a href="#">Facebook</a><br>
            <a href="#">Twitter</a><br>
            <a href="#">Youtube</a><br>
            <a href="#">Instagram</a><br>

        </div>
    </footer>
</body>  
</html>