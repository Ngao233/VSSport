<?php  
function addUser($Ho, $Ten, $MatKhau, $Email, $Sdt, $Id_DiaChi, $Id_SanPhamYeuThich, $VaiTro) {
    global $conn;

    $query = "INSERT INTO khachhang (Ho, Ten, MatKhau, Email, Sdt, Id_DiaChi, Id_SanPhamYeuThich, VaiTro) 
              VALUES (:Ho, :Ten, :MatKhau, :Email, :Sdt, :Id_DiaChi, :Id_SanPhamYeuThich, :VaiTro)";
    $stmt = $conn->prepare($query);

    $stmt->bindParam(':Ho', $Ho);
    $stmt->bindParam(':Ten', $Ten);
    $stmt->bindParam(':MatKhau', $MatKhau);
    $stmt->bindParam(':Email', $Email);
    $stmt->bindParam(':Sdt', $Sdt);
    $stmt->bindParam(':Id_DiaChi', $Id_DiaChi);
    $stmt->bindParam(':Id_SanPhamYeuThich', $Id_SanPhamYeuThich);
    $stmt->bindParam(':VaiTro', $VaiTro);

    $stmt->execute();
}