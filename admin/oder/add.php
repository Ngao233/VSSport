
<h3>Thêm Sản Phẩm</h3>
<section class="index.php?action=right-admin">
<form action="<?=$base_url?>/postproduct" method="post" class="formthem">
<input type="text" name="NgayDatHang" placeholder="Nhập ngày đặt hàng " value="<?=$_POST["NgayDatHang"] ?? $oder["NgayDatHang"] ?? ''?>"> <br>  
<input type="text" name="TrangThai" placeholder="Nhập trạng thái" value="<?=$_POST["TrangThai"] ?? $oder["TrangThai"] ?? ''?>"><br>  
    <?php    
    ?>
    <button>Thêm</button>
</form>
</section>
