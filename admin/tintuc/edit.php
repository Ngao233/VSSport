<h3>Sửa danh mục</h3>  
<form action="<?=$base_url?>/tintuc/<?=$oder["id_TinTuc"]?>" method="post">  
<input type="text" name="TieuDe" placeholder="Tiêu Đề " value="<?=$_POST["TieuDe"] ?? $tintuc["TieuDe"] ?? ''?>"> <br>  
<input type="text" name="NgayDang" placeholder="Ngày Đăng" value="<?=$_POST["NgayDang"] ?? $tintuc["NgayDang"] ?? ''?>"><br>  
<input type="text" name="HinhAnh" placeholder="Hinh Ảnh " value="<?=$_POST["HinhAnh"] ?? $tintuc["HinhAnh"] ?? ''?>"> <br>  
<input type="text" name="NoiDung" placeholder="Nội Dung" value="<?=$_POST["NoiDung"] ?? $tintuc["NoiDung"] ?? ''?>"><br>  

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