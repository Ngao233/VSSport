
<h3>Thêm Sản Phẩm</h3>
<section class="right-admin">
<form action="<?=$base_url?>/postoder" method="post" class="formthem">
<input type="text" name="NgayDatHang" placeholder="XXXX-MMM-DD H:M:S " value="<?=$_POST["NgayDatHang"] ?? $oder["NgayDatHang"] ?? ''?>"> <br>  
<select name="TrangThai">
    <option value="ChuaDuyet" <?= (isset($_POST["TrangThai"]) && $_POST["TrangThai"] == 'ChuaDuyet') || (isset($order["TrangThai"]) && $order["TrangThai"] == 'ChuaDuyet') ? 'selected' : '' ?>>Chưa duyệt</option>
    <option value="DaDuyet" <?= (isset($_POST["TrangThai"]) && $_POST["TrangThai"] == 'DaDuyet') || (isset($order["TrangThai"]) && $order["TrangThai"] == 'DaDuyet') ? 'selected' : '' ?>>Đã duyệt</option>
</select><br>
    <?php    
    ?>
    <button>Thêm</button>
</form>
</section>
