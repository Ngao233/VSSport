<?php  
function login($email, $matKhau) {  
    global $conn;  

    $sql = "SELECT id_KhachHang, MatKhau FROM khachhang WHERE Email = :Email";  
    $stmt = $conn->prepare($sql);  
    $stmt->bindParam(':Email', $email);  
    $stmt->execute();  

    if ($stmt->rowCount() > 0) {  
        $row = $stmt->fetch(PDO::FETCH_ASSOC); 
        session_start();
        if ($matKhau === $row['MatKhau']) {  
            $_SESSION['id_KhachHang'] = $row['id_KhachHang'];  
            echo "Mật khẩu không chính xác.";
            return true; 
        } else {  
            echo "Mật khẩu không chính xác.";  
        }  
    } else {  
        echo "Không tìm thấy tài khoản với email này.";  
    }  
    return false; 
}  

function Islogin(){  

    if(isset($_SESSION['id_KhachHang'])) {
        $id_KhachHang = $_SESSION['id_KhachHang'];
        global $conn;  

        $query = "SELECT VaiTro FROM khachhang WHERE id_KhachHang = :id_KhachHang";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id_KhachHang', $id_KhachHang);
        $stmt->execute();
        $vaiTro = $stmt->fetchColumn();

        if($vaiTro == 0) {
            header("hoso"); 
            exit();
        } 
    }
}

function UserLogin($id){  
    global $conn; 
    $sql = "SELECT * FROM khachhang WHERE id_KhachHang = :id_KhachHang";  
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

function kiemTraDangNhap($conn, $email, $matKhau) {
    $sql = "SELECT id_KhachHang, MatKhau FROM khachhang WHERE Email = :Email";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':Email', $email);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);


        if (password_verify($matKhau, $row['MatKhau'])) {
            session_start(); 
            $_SESSION['id_KhachHang'] = $row['id_KhachHang'];
            return true; 
        } else {
            return false; 
        }
    } else {
        return false; 
    }
}
?>