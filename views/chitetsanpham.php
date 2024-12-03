<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Chi tiết sản phẩm</title>  
</head>  
<body>  
<?php if ($productDetail): ?>  
    <h1><?php echo htmlspecialchars($productDetail['name']); ?></h1>  
    <p><strong>Giá:</strong> <?php echo htmlspecialchars($productDetail['price']); ?> VNĐ</p>  
    <p><strong>Mô tả:</strong> <?php echo htmlspecialchars($productDetail['description']); ?></p>  
    <img src="<?php echo htmlspecialchars($productDetail['image']); ?>" alt="<?php echo htmlspecialchars($productDetail['name']); ?>" />  
<?php else: ?>  
    <p>Sản phẩm không tồn tại.</p>  
<?php endif; ?>  
<a href="index.php">Trở về danh sách sản phẩm</a>  
</body>  
</html>  