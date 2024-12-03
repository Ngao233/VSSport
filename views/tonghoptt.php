<header>
    <h1 class="thai">Tin tức mới nhất</h1>
</header>
<section class="raz">
<?php
// Truy vấn dữ liệu từ bảng tintuc
$sql = "SELECT id_TinTuc, TieuDe, NoiDung, HinhAnh FROM tintuc"; 
$stmt = $conn->prepare($sql);
$stmt->execute();

// Kiểm tra và hiển thị dữ liệu
if ($stmt->rowCount() > 0) { // Sử dụng rowCount() để kiểm tra số hàng
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo '<div class="muya">';
        echo '<a href="tintuc/'.$row['id_TinTuc'].'">'; // Liên kết đến trang chi tiết tin tức với ID
        echo '<img src="./public/image/' . htmlspecialchars($row['HinhAnh']) . '" alt="">';
        echo '<h3>' . htmlspecialchars($row['TieuDe']) . '</h3>';
        echo '<p>' . htmlspecialchars($row['NoiDung']) . '</p>';
        echo '</a>';
        echo '</div>';
        echo '<hr>';
    }
} else {
    echo "Không có tin tức nào.";
}
?>
</section>