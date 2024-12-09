<?php
include_once "model/register.php";  

switch ($action) {  
    case 'dangky':  
        include "views/dangky.php"; 
        break;  

    case 'postuser':  
        $Ho = trim($_POST["Ho"]) ?? "";  
        $Ten = trim($_POST["Ten"]) ?? "";  
        $MatKhau = trim($_POST["MatKhau"]) ?? "";  
        $Email = trim($_POST["Email"]) ?? "";  
        $Sdt = trim($_POST["Sdt"]) ?? "";  

        $query = "SELECT COUNT(*) FROM khachhang WHERE Email = :email";  
        $stmt = $conn->prepare($query);  
        $stmt->bindParam(':email', $Email);  
        $stmt->execute();  
        $count = $stmt->fetchColumn();  

        if ($count > 0) {  
            echo "Email đã được sử dụng, vui lòng nhập email khác.";  
        } else {  
            $hashedPassword = password_hash($MatKhau, PASSWORD_DEFAULT);
            $VaiTro = 0; // Giá trị mặc định cho VaiTro
            addUser($Ho, $Ten, $hashedPassword, $Email, $Sdt,  $VaiTro);  
            header("Location: $base_url/");  
            exit; 
        }
}
?>
