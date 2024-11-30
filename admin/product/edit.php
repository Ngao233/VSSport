<h3>Sửa danh mục</h3>  
<form action="<?=$base_url?>/updateproduct/<?=$product["id_SanPham"]?>" method="post">  
    <input type="text" name="TenSanPham" placeholder="Nhập tên " value="<?=$_POST["TenSanPham"] ?? $product["TenSanPham"] ?? ''?>"> <br>  
    <input type="text" name="MoTa" placeholder="Nhập MoTa" value="<?=$_POST["MoTa"] ?? $product["MoTa"] ?? ''?>"><br>  
    <input type="text" name="Gia" placeholder="Nhập Gia" value="<?=$_POST["Gia"] ?? $product["Gia"] ?? ''?>"><br>  
    <input type="text" name="SoLuong" placeholder="Nhập SoLuong" value="<?=$_POST["SoLuong"] ?? $product["SoLuong"] ?? ''?>"><br>
    <input type="text" name="HinhAnh" placeholder="Nhập HinhAnh" value="<?=$_POST["HinhAnh"] ?? $product["HinhAnh"] ?? ''?>"><br>
    <input type="text" name="KichThuoc" placeholder="Nhập KichThuoc" value="<?=$_POST["KichThuoc"] ?? $product["KichThuoc"] ?? ''?>"><br>
    <input type="text" name="MauSac" placeholder="Nhập MauSac" value="<?=$_POST["MauSac"] ?? $product["MauSac"] ?? ''?>"><br>
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