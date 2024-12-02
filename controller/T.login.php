<?php   
include_once "model/category.php";  
include_once "model/product.php";  
include_once "model/login.php";  

switch ($action) {   
    case 'dangnhap':  
        include "views/dangnhap.php";  
        break;  
        case 'login':
            $product = getProduct();  
            header("Location: $base_url/"); 
            break;

    case 'profile':  
        if (Islogin()) {  
            $user = UserLogin($_SESSION['id_KhachHang']);  
            header("Location: $base_url/profile");  
        } else {  
            header("Location: $base_url/dangnhap");  
            exit();  
        }  
        break; 
        case 'test':  
include_once "model/login.php";
$action = $_GET['action'] ?? "";  

if ($action === 'test' && $_SERVER['REQUEST_METHOD'] === 'POST') {  
    // Nhận thông tin từ biểu mẫu  
    $email = $_POST['Email'] ?? ''; // Lấy email từ POST  
    $matKhau = $_POST['MatKhau'] ?? ''; // Lấy mật khẩu từ POST  

    // Gọi hàm login, giả sử hàm này được định nghĩa trong 'model/login.php'  
    if (login($email, $matKhau)) {  
        // Nếu đăng nhập thành công, in ra id khách hàng  
        echo "Đăng nhập thành công! ID khách hàng của bạn là: " . $_SESSION['id_KhachHang'];  
    } else {  
        echo "Đăng nhập không thành công! Vui lòng kiểm tra lại email và mật khẩu.";  
    }  
    break; 
}  

    include_once "views/footer.php";  
    break; 
}