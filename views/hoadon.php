<?php  
// Kết nối lại với cơ sở dữ liệu nếu cần  
// Đoạn mã này sẽ được thực hiện trên trang hiển thị hóa đơn  

// Kiểm tra và lấy orderId từ URL  
$requestUri = $_SERVER['REQUEST_URI'];  
$parts = explode('/', $requestUri);  
$orderId = intval(end($parts)); // Đảm bảo orderId là số nguyên  

// Kiểm tra nếu không có orderId hoặc không hợp lệ  
if (!$orderId) {  
    echo "Không tìm thấy ID đơn hàng.";  
    exit();  
}  

// Truy vấn lấy thông tin đơn hàng và chi tiết sản phẩm, cùng với tên khách hàng từ bảng khachhang
$sql = "SELECT donhang.NgayDatHang, donhang.TrangThai, donhang.Tong, donhang.id_KhachHang,   
               chitietdonhang.SoLuong, chitietdonhang.TongTien,   
               sanpham.TenSanPham, sanpham.HinhAnh, khachhang.Ten  
        FROM donhang  
        JOIN chitietdonhang ON donhang.id_DonHang = chitietdonhang.id_DonHang  
        JOIN sanpham ON chitietdonhang.id_SanPham = sanpham.id_SanPham  
        JOIN khachhang ON donhang.id_KhachHang = khachhang.id_KhachHang  
        WHERE donhang.id_DonHang = :orderId";  

$stmt = $conn->prepare($sql);  
$stmt->bindParam(':orderId', $orderId, PDO::PARAM_INT);  
$stmt->execute();  
$orderDetails = $stmt->fetchAll(PDO::FETCH_ASSOC);  


// Kiểm tra xem có dữ liệu trả về không  
if (empty($orderDetails)) {  
    echo "Không tìm thấy đơn hàng với ID này.";  
    exit();  
}  

// Lấy thông tin chung của đơn hàng từ phần tử đầu tiên  
$orderInfo = $orderDetails[0];  
?>  

<!DOCTYPE html>  
<html lang="vi">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Hóa Đơn</title>
    <link rel="stylesheet" href="../public/css/hoadon.css"> 
    <link rel="stylesheet" href="../public/css/style1.css">
    <link rel="stylesheet" href="../public/css/search.css">
     <!-- <link rel="stylesheet" href="public/css/dangky.css"> -->
     <!-- <link rel="stylesheet" href="public/css/dangnhap.css"> -->
     <!-- <link rel="stylesheet" href="public/css/diachi.css"> -->
     <!-- <link rel="stylesheet" href="public/css/doimatkhau.css"> -->
     <!-- <link rel="stylesheet" href="public/css/hoso.css"> -->

     <link rel="stylesheet" href="public/css/sanpham.css">
     <link rel="stylesheet" href="public/css/styleAdmin.css">
     <!-- <link rel="stylesheet" href="public/css/thanhtoan.css"> -->
     <link rel="stylesheet" href="public/css/tintuc.css">

        <link
            href="https://fonts.googleapis.com/css2?family=Poppins&family=Montserrat&family=Raleway&family=Lato&family=Rubik&display=swap"
            rel="stylesheet">
        <link
            href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Roboto&family=Nunito&family=Source+Sans+Pro&family=Josefin+Sans&display=swap"
            rel="stylesheet">
        <link
            href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Roboto&family=Nunito&family=Source+Sans+Pro&family=Josefin+Sans&display=swap"
            rel="stylesheet">
        <script src="https://kit.fontawesome.com/d4c9783f89.js" crossorigin="anonymous"></script>
        <style>
            body h2 {
                font-family: 'Montserrat', sans-serif;
                margin-left: 10%;
                margin-top: 60px;
            }
            .formhome input{
                display:none;
            }
                    /* Header (Tiêu đề trang) */
            h1 {
                text-align: center;
                color: #ff6600; /* Màu cam cho tiêu đề */
                font-size: 2rem;
                margin-top: 20px;
            }

            /* Thông tin chung đơn hàng */
            p {
                font-size: 1.2rem;
                margin: 10px 0;
                text-align: center;
            }

            /* Bảng chi tiết đơn hàng */
            table {
                width: 80%;
                margin: 20px auto;
                border-collapse: collapse;
                background-color: white;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            }

            /* Tiêu đề cột bảng */
            th {
                background-color: #ff6600; /* Màu cam cho tiêu đề cột */
                color: white;
                padding: 10px;
                text-align: center;
                font-size: 1.1rem;
            }

            /* Dữ liệu cột bảng */
            td {
                padding: 10px;
                text-align: center;
                font-size: 1rem;
            }

            /* Thêm style cho hình ảnh sản phẩm */
            img {
                width: 50px;
                height: 50px;
                margin-right: 10px;
            }

            /* Tổng cộng đơn hàng */
            p strong {
                font-weight: bold;
                color: #ff6600; /* Màu cam cho phần tổng cộng */
            }

            table tr:nth-child(even) {
                background-color: #f9f9f9;
            }

            /* Chỉnh sửa giao diện khi hover trên hàng trong bảng */
            table tr:hover {
                background-color: #ffebcc;
            }
    </style>
</head>  
<body> 
<nav class="menu-one">
            <ul>
                <li><a href="home">VSSport.vn</a></li>
                <div>
                    <li><a href="#">Giúp đỡ</a></li>
                    <li><a href="#">Ngôn ngữ</a></li>
                </div>
            </ul>
        </nav>
        <!-- menu chinh -->
        <nav class="menu-two">
            <a href="../home"><img src="../public/image/logo.png" alt="" style="width: 155px ;"></a>
            <ul>
                <li><a href="../home">TRANG CHỦ</a></li>
                <li><a href="../tonghoptt">THÔNG TIN</a></li>
                <li><a href="../dangky">ĐĂNG KÝ</a></li>
                <li><a href="../dangnhap">ĐĂNG NHẬP</a></li>
            </ul>
            <!-- icon bao gom "shoping" "user" "seach" -->
            <div class="icon">
            <i id="search" style="color: white; font-size: 20px;" class="fa-solid fa-magnifying-glass"></i>
                <a href="../giohang"><i class="fa-solid fa-cart-shopping"></i></a>
                <a href="../hoso"><i class="fa-solid fa-user"></i></a>
                
            </div>
            <form action="searchome" class="formSearchhome" method="post">
                <input type="search" class="searchhome" name = "search" id="searchInput" placeholder="Tìm Kiếm Sản Phẩm">
            </form>

        </nav>
 
<h1>Hóa Đơn</h1>  

<!-- Hiển thị thông tin chung của đơn hàng -->
<p><strong>Khách hàng:</strong> <?= htmlspecialchars($orderInfo['Ten']) ?></p>
<p><strong>Ngày Giờ đặt hàng:</strong> <?= date('Y/m/d H:i:s', strtotime($orderInfo['NgayDatHang'])) ?></p>  
<p><strong>Trạng thái:</strong> <?= htmlspecialchars($orderInfo['TrangThai']) ?></p>  

<!-- Hiển thị chi tiết đơn hàng -->  
<table border="1">  
    <thead>  
        <tr>  
            <th>Sản phẩm</th>  
            <th>Số lượng</th>  
            <th>Giá</th>  
            <th>Tổng</th>  
        </tr>  
    </thead>  
    <tbody>  
        <?php foreach ($orderDetails as $item): ?>  
            <tr>  
                <td>  
                    <img src="../public/image/<?= htmlspecialchars($item['HinhAnh']) ?>"   
                         alt="<?= htmlspecialchars($item['TenSanPham']) ?>"   
                         style="width: 50px; height: 50px;">  
                    <?= htmlspecialchars($item['TenSanPham']) ?>  
                </td>  
                <td><?= htmlspecialchars($item['SoLuong']) ?></td>  
                <td>  
                    <?= number_format($item['TongTien'] / max($item['SoLuong'], 1), 0, ',', '.') ?> đ  
                </td>  
                <td><?= number_format($item['TongTien'], 0, ',', '.') ?> đ</td>  
            </tr>  
        <?php endforeach; ?>  
    </tbody>  
</table>  

<!-- Hiển thị tổng cộng của đơn hàng -->  
<p><strong>Tổng cộng:</strong> <?= number_format($orderInfo['Tong'], 0, ',', '.') ?> đ</p>  
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
