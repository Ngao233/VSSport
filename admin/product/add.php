
<h3>Thêm Sản Phẩm</h3>
<section class="right-admin">
<form action="<?=$base_url?>/postproduct" method="post" class="formthem">
    <input type="text" name="TenSanPham" placeholder="Nhập tên " value="<?=$_POST["TenSanPham"] ?? ""?>"> <br>  
    <input type="text" name="MoTa" placeholder="Nhập MoTa" value="<?=$_POST["MoTa"] ?? ""?>"><br>  
    <input type="text" name="Gia" placeholder="Nhập Gia" value="<?=$_POST["Gia"] ?? ""?>"><br>  
    <input type="text" name="SoLuong" placeholder="Nhập SoLuong" value="<?=$_POST["SoLuong"] ?? ""?>"><br>
    <input type="text" name="HinhAnh" placeholder="Nhập HinhAnh" value="<?=$_POST["HinhAnh"] ?? ""?>"><br>
    <input type="text" name="KichThuoc" placeholder="Nhập KichThuoc" value="<?=$_POST["KichThuoc"] ??  ""?>"><br>
    <input type="text" name="MauSac" placeholder="Nhập MauSac" value="<?=$_POST["MauSac"] ?? "" ?>"><br>
    <?php    
    ?>
    <button>Thêm</button>
</form>
</section>
