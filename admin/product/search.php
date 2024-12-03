<!DOCTYPE html>  
<html lang="en">  

<head>  
  <meta charset="UTF-8">  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">  
  <title>Admin Dashboard</title>  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">  
  <link rel="stylesheet" href="public/css/styleAdmin.css">
  <link
            href="https://fonts.googleapis.com/css2?family=Poppins&family=Montserrat&family=Raleway&family=Lato&family=Rubik&display=swap"
            rel="stylesheet">
</head> 
<style>
    body{
        font-family: 'Montserrat', sans-serif;
    }
</style> 

<body>  
  <div class="container-fluid">  
    <div class="row">  
      <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block sidebar">  
        <div class="position-sticky pt-3">  
          <img src="VSSp rt.png" alt="Logo">  
          <ul class="nav flex-column mt-4">  
            <li class="nav-item">  
              <a class="nav-link active" href="index.php?action=admin2">  
                <i data-feather="home"></i> Home  
              </a>  
            </li>  
            <li class="nav-item">  
              <a class="nav-link" href="index.php?action=admin2">  
                <i data-feather="box"></i> Quản lý sản phẩm  
              </a>  
            </li>  
            <li class="nav-item">  
              <a class="nav-link" href="index.php?action=order">  
                <i data-feather="shopping-cart"></i> Đơn hàng  
              </a>  
            </li>  
            <li class="nav-item">  
              <a class="nav-link" href="">  
                <i data-feather="users"></i> Người dùng  
              </a>  
            </li>  
            <li class="nav-item">  
              <a class="nav-link" href="index.php?action=statistics">  
                <i data-feather="bar-chart-2"></i> Thống kê  
              </a>  
            </li>  
            <li class="nav-item">  
              <a class="nav-link" href="settings.html">  
                <i data-feather="settings"></i> Cài đặt  
              </a>  
            </li>  
          </ul>  
        </div>  
      </nav>  

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">  
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">  
          <h1 class="h2">Dashboard</h1>  
          <a href="index.php?action=addproduct" class="btn btn-primary">Thêm Sản Phẩm Mới</a> 
        </div>  

        <h2 class="mb-3">Danh sách sản phẩm</h2>  
        <form action="index.php?action=searchproduct" method="post">
        <input type="search" class="form-control mb-3" name="search" placeholder="Tìm kiếm sản phẩm...">
        <button class="btn btn-primary">Tìm</button>       
        </form> 
<div class="table-responsive">  
  <table class="table table-striped table-sm">  
    <thead class="table-dark">  
      <tr>  
        <th>#</th>  
        <th>Tên sản phẩm</th>  
        <th>Mô Tả</th>  
        <th>Giá</th>  
        <th>Số lượng</th>  
        <th>Hình Ảnh</th>  
        <th>Kích Thước</th>  
        <th>Màu Sắc</th>  
        <th>Thao Tác</th>  
      </tr>  
    </thead>  
    <tbody>  
    <?php if (!empty($product)): ?>  
        <?php foreach ($product as $product): ?> 
      <tr>  
        <td><?=htmlspecialchars($product["id_SanPham"])?></td>  
        <td><?=htmlspecialchars($product["TenSanPham"])?></td>  
        <td><?=htmlspecialchars($product["MoTa"])?></td>  
        <td><?=htmlspecialchars($product["Gia"])?></td>  
        <td><?=htmlspecialchars($product["SoLuong"])?></td>  
        <td><img src="<?=htmlspecialchars($product["HinhAnh"])?>" width="50"></td> <!-- Hiển thị hình ảnh nhỏ -->  
        <td><?=htmlspecialchars($product["KichThuoc"])?></td>  
        <td><?=htmlspecialchars($product["MauSac"])?></td>  
        <td>  
          <a href="index.php?action=editproduct/<?=$product["id_SanPham"]?>" class="btn btn-sm btn-warning"><i data-feather="edit"></i>Sửa</a>  
          <br>  
          <button class="btn btn-sm btn-danger">  
            <i data-feather="trash-2"></i> Xóa  
          </button>  
        </td>  
      </tr>  
      <?php endforeach; ?>  
                <?php else: ?>  
                    <tr>  
                        <td colspan="1">Không có kết quả nào được tìm thấy.</td>  
                    </tr>  
                <?php endif; ?>  
    </tbody>  
  </table>  
</div>