<?php  
function login($email, $matKhau) {  
    global $conn;  

    $sql = "SELECT id_KhachHang, MatKhau FROM khachhang WHERE Email = :Email";  
    $stmt = $conn->prepare($sql);  
    
    $stmt->bindParam(':Email', $email);  
    $stmt->execute();  
    
    if ($stmt->rowCount() > 0) {  
        $row = $stmt->fetch(PDO::FETCH_ASSOC);  
        if (password_verify($matKhau, $row['MatKhau'])) {  
            $_SESSION['id_KhachHang'] = $row['id_KhachHang'];  
            return true; // Đăng nhập thành công 

        }  
    }  
    
    return false; // Đăng nhập không thành công  
}
function Islogin(){
    return isset($_SESSION['id_KhachHang']);
}

function UserLogin($id){
    $sql = "SELECT * FROM khachhang WHERE id_KhachHang = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_KhachHang', $id);  
    $stmt->execute();  
    return $stmt->fetch(PDO::FETCH_ASSOC);

}
function Logout(){
    session_start();  
    session_destroy();
    header("Location: dangnhap");  
    exit();  
}
?>