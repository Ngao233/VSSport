<h3>Sửa Sản Phẩm</h3>  
<form action="<?=($base_url) ?>/updateproduct/<?= ($product['id_SanPham']) ?>" method="post">  
    <input type="text" name="TenSanPham" placeholder="Nhập tên" value="<?=($_POST['TenSanPham'] ?? $product['TenSanPham'] ?? '') ?>"><br>  
  
    <input type="text" name="Gia" placeholder="Nhập giá" value="<?=($_POST['Gia'] ?? $product['Gia'] ?? '') ?>"><br>  
    <input type="text" name="SoLuong" placeholder="Nhập số lượng" value="<?=($_POST['SoLuong'] ?? $product['SoLuong'] ?? '') ?>"><br>  
    <input type="text" name="HinhAnh" placeholder="Nhập hình ảnh" value="<?=($_POST['HinhAnh'] ?? $product['HinhAnh'] ?? '') ?>"><br>    

    <label for="id_DanhMuc">Chọn Danh Mục:</label>  
    <select name="id_DanhMuc" id="id_DanhMuc" required>  
        <?php foreach ($categories as $category): ?>  
            <option value="<?= $category['id_DanhMuc'] ?>"  
            <?= ($category['id_DanhMuc'] == $product['id_DanhMuc']) ? 'selected' : '' ?>>  
                <?= $category['TenDanhMuc'] ?>  
            </option>  
        <?php endforeach; ?>  
    </select><br>  

    <?php if (isset($errors) && count($errors) > 0): ?>  
        <ul style='color:red'>  
            <?php foreach ($errors as $error): ?>  
                <li><?=($error) ?></li>  
            <?php endforeach; ?>  
        </ul>  
    <?php endif; ?>  

    <button type="submit">Sửa</button>  
</form>