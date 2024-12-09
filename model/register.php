<?php  
function addUser($Ho, $Ten, $MatKhau, $Email, $Sdt,  $VaiTro) {
    global $conn;

    $query = "INSERT INTO khachhang (Ho, Ten, MatKhau, Email, Sdt, VaiTro) 
              VALUES (:Ho, :Ten, :MatKhau, :Email, :Sdt,  :VaiTro)";
    $stmt = $conn->prepare($query);

    $stmt->bindParam(':Ho', $Ho);
    $stmt->bindParam(':Ten', $Ten);
    $stmt->bindParam(':MatKhau', $MatKhau);
    $stmt->bindParam(':Email', $Email);
    $stmt->bindParam(':Sdt', $Sdt);
    $stmt->bindParam(':VaiTro', $VaiTro);

    $stmt->execute();
}