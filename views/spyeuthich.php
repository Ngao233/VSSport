<?php  
        if (isset($_SESSION['id_KhachHang'])) {  
            $id_KhachHang = $_SESSION['id_KhachHang'];  
        $sql = "SELECT id_SanPham FROM sanphamyeuthich WHERE id_KhachHang = :id_KhachHang";  
        $stmt = $conn->prepare($sql);  
        $stmt->bindParam(':id_KhachHang', $id_KhachHang, PDO::PARAM_INT);  
        $stmt->execute();  
        $productlove = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $productIds = array_column($productlove, 'id_SanPham');

        if (count($productIds) > 0) {
            $placeholders = implode(',', array_fill(0, count($productIds), '?'));
            $sql = "SELECT * FROM sanpham WHERE id_SanPham IN ($placeholders)";
            $stmt = $conn->prepare($sql);
            $stmt->execute($productIds);
            $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $products = [];
        }
                } else {  
                    $id_KhachHang = null;   
                    $cartItems = []; 
                }  
?>
<!DOCTYPE html>  
<html lang="vi">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Trang Chủ</title>  
    <link rel="stylesheet" href="public/css/style1.css">
    <link rel="stylesheet" href="public/css/spyeuthich.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins&family=Montserrat&family=Raleway&family=Lato&family=Rubik&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Roboto&family=Nunito&family=Source+Sans+Pro&family=Josefin+Sans&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Roboto&family=Nunito&family=Source+Sans+Pro&family=Josefin+Sans&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>  
<body>  
  <header>
  <!-- menu phu -->
<h1 class="weywie">Sản phẩm yêu thích</h1>
<section class="product-sale-home">
<?php foreach ($products as $item) { ?>
    <div class="pro-sale">
        <img src="public/image/<?=$item["HinhAnh"]?>" alt="">
        
            <a href="<?=$item["id_SanPham"]?>">
            <div class="circle">
                <i class="fa-solid fa-heart"></i>
                </div>
            </a>
        

        <div>
            <p class="p-product-sale-name"><?=$item["TenSanPham"]?></p>
            <div class="p-product-sale">
                <p class="price-sale-home"><?=$item["Gia"]?> đ</p>
                <p class="price-down-home">190000 đ</p>
            </div>
            <button>Thêm giỏ hàng</button>
        </div>
    </div>

    <?php } ?>
    <div style="width: 100%; height: 50px;">
</div>

</section>
         
    
    


<!-- Footer-->

    