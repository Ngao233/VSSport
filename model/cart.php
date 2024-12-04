<?php
function getProductDetailsByCartId($id_SanPham) {  
    global $conn;
    
    // Truy vấn để lấy thông tin sản phẩm từ bảng sanpham dựa vào id_SanPham
    $sql = "SELECT sanpham.TenSanPham, sanpham.HinhAnh, sanpham.Gia, sanpham.id_DanhMuc
            FROM sanpham
            WHERE sanpham.id_SanPham = :id_SanPham";
    
    // Chuẩn bị câu lệnh SQL
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_SanPham', $id_SanPham, PDO::PARAM_INT);
    
    // Thực thi câu lệnh SQL
    $stmt->execute();
    
    // Lấy kết quả
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // Trả về thông tin sản phẩm
    return $product;
}
function getCartIdByUserId($id_KhachHang) {
    global $conn;
    
    // Truy vấn để lấy id giỏ hàng từ bảng giohang dựa vào id_KhachHang
    $sql = "SELECT id_GioHang FROM giohang WHERE id_KhachHang = :id_KhachHang";
    
    // Chuẩn bị câu lệnh SQL
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_KhachHang', $id_KhachHang, PDO::PARAM_INT);
    
    // Thực thi câu lệnh SQL
    $stmt->execute();
    
    // Lấy kết quả
    $cart = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // Nếu có giỏ hàng, trả về id_GioHang, nếu không trả về null
    if ($cart) {
        return $cart['id_GioHang'];
    } else {
        return null; // Nếu không tìm thấy giỏ hàng
    }
}

function updateCartQuantity($id_GioHang, $SoLuong, $conn) {
    // Kiểm tra số lượng nhập vào có hợp lệ không
    if ($SoLuong < 1 || $SoLuong > 100) {
        return "Số lượng không hợp lệ!";
    }

    // Câu lệnh SQL để cập nhật số lượng
    $sql = "UPDATE giohang SET SoLuong = :SoLuong WHERE id_GioHang = :id_GioHang";

    // Sử dụng prepared statement với PDO
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':SoLuong', $SoLuong, PDO::PARAM_INT);
    $stmt->bindParam(':id_GioHang', $id_GioHang, PDO::PARAM_INT);

    // Thực thi câu lệnh
    if ($stmt->execute()) {
        return ;
    } else {
        return "Lỗi khi cập nhật!";
    }
    
}
function addProductToCart($id_KhachHang, $id_SanPham, $SoLuong, $Gia) {
    global $conn;

    // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
    $query = "SELECT * FROM giohang WHERE id_KhachHang = :id_KhachHang AND id_SanPham = :id_SanPham";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id_KhachHang', $id_KhachHang, PDO::PARAM_INT);
    $stmt->bindParam(':id_SanPham', $id_SanPham, PDO::PARAM_INT);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        // Sản phẩm đã có trong giỏ hàng, cập nhật số lượng
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $newQuantity = $row['SoLuong'] + $SoLuong;  // Cộng thêm số lượng

        $updateQuery = "UPDATE giohang SET SoLuong = :SoLuong WHERE id_KhachHang = :id_KhachHang AND id_SanPham = :id_SanPham";
        $updateStmt = $conn->prepare($updateQuery);
        $updateStmt->bindParam(':SoLuong', $newQuantity, PDO::PARAM_INT);
        $updateStmt->bindParam(':id_KhachHang', $id_KhachHang, PDO::PARAM_INT);
        $updateStmt->bindParam(':id_SanPham', $id_SanPham, PDO::PARAM_INT);
        $updateStmt->execute();
        echo "Cập nhật giỏ hàng thành công!";
    } else {
        // Nếu sản phẩm chưa có trong giỏ hàng, thêm mới
        $insertQuery = "INSERT INTO giohang (id_KhachHang, id_SanPham, SoLuong, Gia) VALUES (:id_KhachHang, :id_SanPham, :SoLuong, :Gia)";
        $insertStmt = $conn->prepare($insertQuery);
        $insertStmt->bindParam(':id_KhachHang', $id_KhachHang, PDO::PARAM_INT);
        $insertStmt->bindParam(':id_SanPham', $id_SanPham, PDO::PARAM_INT);
        $insertStmt->bindParam(':SoLuong', $SoLuong, PDO::PARAM_INT);
        $insertStmt->bindParam(':Gia', $Gia, PDO::PARAM_INT);
        $insertStmt->execute();
        echo "Sản phẩm đã được thêm vào giỏ hàng!";
    }
}
function createNewCart($id_KhachHang) {
    global $conn;

    // Thêm giỏ hàng mới vào cơ sở dữ liệu
    $query = "INSERT INTO giohang (id_KhachHang) VALUES (:id_KhachHang)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id_KhachHang', $id_KhachHang, PDO::PARAM_INT);
    if ($stmt->execute()) {
        return $conn->lastInsertId();  // Trả về ID giỏ hàng mới tạo
    } else {
        return false;  // Nếu có lỗi, trả về false
    }
}
function deleteCartItem($id_GioHang, $conn) {
    $sql = "DELETE FROM giohang WHERE id_GioHang = :id_GioHang";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_GioHang', $id_GioHang, PDO::PARAM_INT);

    if ($stmt->execute()) {
        return "";
    } else {
        return "Lỗi khi xóa sản phẩm!";
    }
}
?>


