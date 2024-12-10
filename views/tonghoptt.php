
<header>
    <h1 class="thai">Tin tức mới nhất</h1>
</header>
<section class="raz">
<?php
$sql = "SELECT id_TinTuc, TieuDe, NoiDung, HinhAnh FROM tintuc"; 
$stmt = $conn->prepare($sql);
$stmt->execute();


if ($stmt->rowCount() > 0) { 
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo '<div class="muya">';
        echo '<a href="tintuc/'.$row['id_TinTuc'].'">'; 
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