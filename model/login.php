<?php  

function login($email, $matKhau) {  
    global $pdo; // Giả sử bạn đã kết nối với PDO trước đó  

    $stmt = $pdo->prepare("SELECT id_KhachHang, MatKhau FROM khachhang WHERE Email = :Email");  
    $stmt->bindParam(':Email', $email);  
    $stmt->execute();  

    // Kiểm tra nếu có kết quả  
    if ($stmt->rowCount() > 0) {  
        $user = $stmt->fetch(PDO::FETCH_ASSOC);  
        
        // Sử dụng password_verify để kiểm tra mật khẩu  
        if (password_verify($matKhau, $user['MatKhau'])) {  
            // Lưu ID khách hàng vào phiên  
            $_SESSION['id_KhachHang'] = $user['id_KhachHang'];  
            return true; // Đăng nhập thành công  
        } else {  
            // Mật khẩu không đúng  
            return false; // Đăng nhập thất bại  
        }  
    }  
    
    // Không tìm thấy email trong cơ sở dữ liệu  
    return false; // Đăng nhập thất bại  
}
function Islogin() {  
    session_start();
    return isset($_SESSION['id_KhachHang']);  
}
function UserLogin($id) {  
    global $conn; // Đảm bảo sử dụng biến toàn cục  
    $sql = "SELECT * FROM khachhang WHERE id_KhachHang = :id";  
    $stmt = $conn->prepare($sql);  
    $stmt->bindParam(':id', $id);  // Sửa tham số này  
    $stmt->execute();  
    return $stmt->fetch(PDO::FETCH_ASSOC);  
}
// function Logout(){
//     session_start();  
//     session_destroy();
//     header("Location: dangnhap");  
//     exit();  
// }

?>