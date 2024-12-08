<?php


if (isset($_SESSION['id_KhachHang'])) {
    $id_KhachHang = $_SESSION['id_KhachHang'];

    // Thực hiện truy vấn để lấy thông tin vai trò từ cơ sở dữ liệu
    $query = "SELECT VaiTro FROM khachhang WHERE id_KhachHang = :id_KhachHang";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id_KhachHang', $id_KhachHang);
    $stmt->execute();
    $vaiTro = $stmt->fetchColumn();

    if ($vaiTro == 1) {
        header("Location: admin"); // Chuyển hướng đến trang admin
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

<link rel="stylesheet" href="public/css/hoso.css">
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

              <li class="fa fa-heart"></li><a href="spyeuthich">Sản phẩm yêu thích</a><br>

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

