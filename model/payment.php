<!-- <?php

    function getCustomerById($conn, $id_KhachHang) {
        $sql = "SELECT * FROM khachhang WHERE id_KhachHang = :id_KhachHang";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_KhachHang', $id_KhachHang, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC); // Trả về một dòng dữ liệu
    }
    function getPaymentMethodByCustomerId($conn, $id_KhachHang) {
        $sql = "SELECT * FROM phuongthucthanhtoan WHERE id_KhachHang = :id_KhachHang";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_KhachHang', $id_KhachHang, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC); // Trả về một dòng dữ liệu
    }
    function getShippingAddressByCustomerId($conn, $id_KhachHang) {
        $sql = "SELECT * FROM diachinguoidung WHERE id_KhachHang = :id_KhachHang";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_KhachHang', $id_KhachHang, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC); // Trả về một dòng dữ liệu
    }
    function insertCustomer($conn, $ten, $email, $sdt) {
        $sql = "INSERT INTO khachhang (Ten, Email, Sdt) VALUES (:Ten, :Email, :Sdt)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':Ten', $ten, PDO::PARAM_STR);
        $stmt->bindParam(':Email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':Sdt', $sdt, PDO::PARAM_STR);        
        $stmt->execute();
       
    }
    
    function insertOrder($conn, $id_KhachHang, $ghiChu) {
        $sql = "INSERT INTO donhang (id_KhachHang, GhiChu) VALUES (:id_KhachHang, :GhiChu)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_KhachHang', $id_KhachHang, PDO::PARAM_INT);
        $stmt->bindParam(':GhiChu', $ghiChu, PDO::PARAM_STR);
        $stmt->execute();
    
    }

    function insertPaymentMethod($conn, $id_KhachHang, $phuongthucthanhtoan) {
        if (empty($id_KhachHang)) {
            throw new Exception('id_KhachHang cannot be null'); // Thêm kiểm tra nếu id_KhachHang bị thiếu
        }
    
        $sql = "INSERT INTO phuongthucthanhtoan (id_KhachHang, TenPhuongThucThanhToan) VALUES (:id_KhachHang, :TenPhuongThucThanhToan)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_KhachHang', $id_KhachHang);
        $stmt->bindParam(':TenPhuongThucThanhToan', $phuongthucthanhtoan);
        $stmt->execute();
    }
    function insertShippingAddress($conn, $id_KhachHang, $diachi) {
        $sql = "INSERT INTO diachinguoidung (id_KhachHang, DiaChi) VALUES (:id_KhachHang, :DiaChi)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_KhachHang', $id_KhachHang);
        $stmt->bindParam(':DiaChi', $diachi);
        $stmt->execute();
    }
?> -->