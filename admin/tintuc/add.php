<h3>Thêm Tin Tức</h3>
<section class="right-admin">
<form action="<?=$base_url?>/tintuc" method="post" class="formthem">
<input type="text" name="TieuDe" placeholder="Tiêu Đề " value="<?=$_POST["TinTuc"] ?? $oder["TinTuc"] ?? ''?>"> <br>  
<input type="text" name="NgayDang" placeholder="Ngày Đăng" value="<?=$_POST["NgayDang"] ?? $oder["NgayDang"] ?? ''?>"><br>  
<input type="text" name="HinhAnh" placeholder="Hinh Ảnh " value="<?=$_POST["HinhAnh"] ?? $oder["HinhAnh"] ?? ''?>"> <br>  
<input type="text" name="NoiDung" placeholder="Nội Dung" value="<?=$_POST["NoiDung"] ?? $oder["NoiDung"] ?? ''?>"><br>  
    <?php    
    ?>
    <button>Thêm</button>
</form>
</section>