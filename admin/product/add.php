
<h3>Thêm Sản Phẩm</h3>
<section class="right-admin">
<form action="<?=$base_url?>/postproduct" method="post" class="formthem">
    <input type="text" name="TenSanPham" placeholder="Nhập tên " value="<?=$_POST["TenSanPham"] ?? ""?>"> <br>  

    <input type="text" name="Gia" placeholder="Nhập Gia" value="<?=$_POST["Gia"] ?? ""?>"><br>  
    <input type="text" name="SoLuong" placeholder="Nhập SoLuong" value="<?=$_POST["SoLuong"] ?? ""?>"><br>
    <input type="text" name="HinhAnh" placeholder="Nhập HinhAnh" value="<?=$_POST["HinhAnh"] ?? ""?>"><br>
    <input type="text" name="id_DanhMuc" placeholder="Nhập id_DanhMuc" value="<?=$_POST["id_DanhMuc"] ?? ""?>"><br>

    <?php    
    ?>
    <button>Thêm</button>
</form>
</section>
