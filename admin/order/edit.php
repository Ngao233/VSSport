<h3>Sửa danh mục</h3>  
<form action="<?=$base_url?>/updateorder/<?=$order["id_DonHang"]?>" method="post">  
    <input type="text" name="NgayDatHang" placeholder="Nhập ngày đặt hàng " value="<?=$_POST["NgayDatHang"] ?? $order["NgayDatHang"] ?? ''?>"> <br>  
    <input type="text" name="TrangThai" placeholder="Nhập trạng thái" value="<?=$_POST["TrangThai"] ?? $order["TrangThai"] ?? ''?>"><br>  

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