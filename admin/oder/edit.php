<h3>Sửa danh mục</h3>  
<form action="<?=$base_url?>/updateoder/<?=$oder["id_DonHang"]?>" method="post">  
    <input type="text" name="NgayDatHang" placeholder="Nhập ngày đặt hàng " value="<?=$_POST["NgayDatHang"] ?? $oder["NgayDatHang"] ?? ''?>"> <br>  
    <select name="TrangThai">
    <option value="ChuaDuyet" <?= (isset($_POST["TrangThai"]) && $_POST["TrangThai"] == 'ChuaDuyet') || (isset($order["TrangThai"]) && $order["TrangThai"] == 'ChuaDuyet') ? 'selected' : '' ?>>Chưa duyệt</option>
    <option value="DaDuyet" <?= (isset($_POST["TrangThai"]) && $_POST["TrangThai"] == 'DaDuyet') || (isset($order["TrangThai"]) && $order["TrangThai"] == 'DaDuyet') ? 'selected' : '' ?>>Đã duyệt</option>
    </select><br>
    <?php   
    if(isset($errors) && count($errors) > 0){  
        echo "<ul style='color:red'>";  
        foreach($errors as $error){  
            echo "<li>$error</li>";  
        }  
        echo "</ul>";  
    }    
    ?>  
    <button>Sửa</button>  
</form>