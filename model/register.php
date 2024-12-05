<?php  
function addUser($Ho, $Ten, $MatKhau, $Email, $Sdt, $Id_DiaChi) {
    global $conn;

    // Câu lệnh SQL bao gồm Id_DiaChi
    $query = "INSERT INTO khachhang (Ho, Ten, MatKhau, Email, Sdt, Id_DiaChi) 
              VALUES (:Ho, :Ten, :MatKhau, :Email, :Sdt, :Id_DiaChi)";
    $stmt = $conn->prepare($query);

    // Gán giá trị cho các tham số
    $stmt->bindValue(':Ho', $Ho);
    $stmt->bindValue(':Ten', $Ten);
    $stmt->bindValue(':MatKhau', $MatKhau);
    $stmt->bindValue(':Email', $Email);
    $stmt->bindValue(':Sdt', $Sdt);
    $stmt->bindValue(':Id_DiaChi', $Id_DiaChi); // Gán giá trị cho Id_DiaChi

    // Thực thi truy vấn
    $stmt->execute();
}