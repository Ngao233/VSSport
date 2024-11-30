<body>  
  <div class="container-fluid">  
    <div class="row">  
      <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block sidebar">  
        <div class="position-sticky pt-3">  
          <img src="public/image/VSSp rt.png" alt="Logo">  
          <ul class="nav flex-column mt-4">  
            <li class="nav-item">  
              <a class="nav-link active" href="admin.html">  
                <i data-feather="home"></i> Home  
              </a>  
            </li>  
            <li class="nav-item">  
              <a class="nav-link" href="products.html">  
                <i data-feather="box"></i> Quản lý sản phẩm  
              </a>  
            </li>  
            <li class="nav-item">  
              <a class="nav-link" href="orders.html">  
                <i data-feather="shopping-cart"></i> Đơn hàng  
              </a>  
            </li>  
            <li class="nav-item">  
              <a class="nav-link" href="users.html">  
                <i data-feather="users"></i> Người dùng  
              </a>  
            </li>  
            <li class="nav-item">  
              <a class="nav-link" href="statistics.html">  
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
          <button type="button" class="btn btn-primary">Thêm mới</button>  
        </div>  

        <h2 class="mb-3">Danh sách sản phẩm</h2>  
        <input type="text" class="form-control mb-3" placeholder="Tìm kiếm sản phẩm...">  
        
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
            <?php foreach ($product as $product){?> 
              <tr>  
                <td><?=$product["id_SanPham"]?></td>  
                <td><?=$product["TenSanPham"]?></td>  
                <td><?=$product["MoTa"]?></td>  
                <td><?=$product["Gia"]?></td>  
                <td><?=$product["SoLuong"]?></td>  
                <td><?=$product["HinhAnh"]?></td>
                <td><?=$product["KichThuoc"]?></td>
                <td><?=$product["MauSac"]?></td>
                <td>
                <a href="editproduct/<?=$product["id_SanPham"]?>" class="btn btn-sm btn-warning"><i data-feather="edit"></i>Sửa</a> 
               <br>  
                  <button class="btn btn-sm btn-danger">  
                    <i data-feather="trash-2"></i> Xóa  
                  </button>  
                </td>  
              </tr>  
              <?php }?>
             
            </tbody>  
          </table>  
        </div>  
      </main>  
    </div>  
  </div>  

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>  
  <script src="https://unpkg.com/feather-icons"></script>  
  <script>  
    feather.replace();  
  </script>  
</body>  