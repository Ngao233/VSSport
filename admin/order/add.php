
<h3>Thêm Đơn Hàng</h3>  
<form action="<?=$base_url?>/addorder" method="post">  
    <input type="text" name="NgayDatHang" placeholder="Nhập ngày đặt hàng"> <br>  
    <input type="text" name="TrangThai" placeholder="Nhập trạng thái"> <br>  
    <input type="number" name="KhachHangId" placeholder="Nhập ID Khách hàng"> <br>  

    <?php   
    if(isset($errors) && count($errors) > 0){  
        echo "<ul style='color:red'>";  
        foreach($errors as $error){  
            echo "<li>$error</li>";  
        }  
        echo "</ul>";  
    }    
    ?>  
    <button type="submit">Thêm</button>  
</form>