<?php   
include_once "model/register.php";  


switch ($action) {  
    case 'register':  
        include "views/register.php"; 
        
        break;  
    case 'postuser':  
        $Ho = trim($_POST["Ho"]) ?? "";  
        $Ten = trim($_POST["Ten"]) ?? "";  
        $MatKhau = trim($_POST["MatKhau"]) ?? "";  
        $Email = trim($_POST["Email"]) ?? "";  
        $Sdt = trim($_POST["Sdt"]) ?? "";  

        // Sử dụng truy vấn chuẩn với PDO  
        $query = "SELECT COUNT(*) FROM khachhang WHERE Email = :email";  
        $stmt = $conn->prepare($query);  
        $stmt->bindValue(':email', $Email);   
        $stmt->execute();  
        $count = $stmt->fetchColumn();  

        if ($count > 0) {  
            echo "Email đã được sử dụng, vui lòng nhập email khác.";  
        } else {  
            addUser($Ho, $Ten, $MatKhau, $Email, $Sdt);  
            header("Location: $base_url/register");  
            exit; // Thêm exit sau header để dừng thực hiện mã tiếp theo  
        }    
        break;  
        }
        
      