<h3>Sửa danh mục</h3>  
<form action="<?=$base_url?>/updateoder/<?=$oder["id_DonHang"]?>" method="post">  
    <input type="text" name="TrangThai" placeholder="Nhập trạng thái" value="<?=$_POST["TrangThai"] ?? $oder["TrangThai"] ?? ''?>"><br>  

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