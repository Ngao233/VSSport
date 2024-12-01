<?php  
function addUser($username, $password, $age) {  
    global $conn;  
    
    // Mã hóa mật khẩu trước khi lưu  
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);  
    
    // Kiểm tra xem tên tài khoản đã tồn tại chưa  
    $sql = "SELECT * FROM users WHERE username = :username";  
    $stmt = $conn->prepare($sql);  
    $stmt->bindParam(':username', $username);  
    $stmt->execute();  

    if ($stmt->rowCount() > 0) {  
        return "Tên tài khoản đã tồn tại, vui lòng chọn tên khác.";  
    }  

    // Thêm người dùng mới vào bảng  
    $sql = "INSERT INTO users (username, password, age) VALUES (:username, :password, :age)";  
    $stmt = $conn->prepare($sql);  
    $stmt->bindParam(':username', $username);   
    $stmt->bindParam(':password', $hashedPassword);   
    $stmt->bindParam(':age', $age);   

    if ($stmt->execute()) {  
        return "Đăng ký thành công!";  
    } else {  
        return "Có lỗi xảy ra: " . $stmt->errorInfo()[2];  
    }  
}  