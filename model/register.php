<?php  
function addUser($Ho, $Ten, $MatKhau, $Email, $Sdt)
{  
    global $conn;  
    $sql = "INSERT INTO khachhang( Ho,Ten, MatKhau, Email,Sdt) VALUES( :Ho,:Ten, :MatKhau, :Email, :Sdt)";  
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':Ho', $Ho); 
    $stmt->bindParam(':Ten', $Ten); 
    $stmt->bindParam(':MatKhau', $MatKhau);  
    $stmt->bindParam(':Email', $Email); 
    $stmt->bindParam(':Sdt', $Sdt);
    $stmt->execute();
}