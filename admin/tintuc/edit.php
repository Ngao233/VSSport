<h3>Sửa Sản Phẩm</h3>  
<form action="<?=($base_url) ?>//index.php?action=updatetintuc/<?= ($tintuc['id_TinTuc']) ?>" method="post">  
    <input type="text" name="TieuDe" placeholder="TieuDe" value="<?=($_POST['TieuDe'] ?? $tintuc['TieuDe'] ?? '') ?>"><br>  
    <input type="text" name="NgayDang" placeholder="NgayDang" value="<?=($_POST['NgayDang'] ?? $tintuc['NgayDang'] ?? '') ?>"><br>   
    <input type="text" name="HinhAnh" placeholder="Nhập hình ảnh" value="<?=($_POST['HinhAnh'] ?? $tintuc['HinhAnh'] ?? '') ?>"><br>  
    <input type="text" name="NoiDung" placeholder="NoiDung" value="<?=($_POST['NoiDung'] ?? $tintuc['NoiDung'] ?? '') ?>"><br>   

    <?php if (isset($errors) && count($errors) > 0): ?>  
        <ul style='color:red'>  
            <?php foreach ($errors as $error): ?>  
                <li><?=($error) ?></li>  
            <?php endforeach; ?>  
        </ul>  
    <?php endif; ?>  

    <button type="submit">Sửa</button>  
</form>