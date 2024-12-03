<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div
          class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Dashboard</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <a href="index.php?action=addtintuc" class="btn btn-primary" >Thêm mới</a>
          </div>
        </div>

        <!-- Data Table with Search Bar -->
        <h2 class="mb-3">Danh sách tin tức</h2>
        <div class="mb-3">
          <input type="text" class="form-control" placeholder="Tìm kiếm sản phẩm...">
        </div>
        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead class="table-dark">
              <tr>
                <th>ID Tin Tuc</th>
                <th>Tieu De</th>
                <th>Ngay Dang</th>
                <th>Hình Ảnh</th> 
                <th>Noi Dung</th>
                <th>Thao tác</th>
              </tr>
            </thead>
         
        
      
  <tbody>  
    <?php foreach ($tintuc as $haha): ?>  
    <tr>  
        <td><?=$haha["id_TinTuc"]?></td>    
  
        <td><?=$haha["TieuDe"]?></td>  
        <td><?=$haha["NgayDang"]?></td>  
        <td><img src="public/image/<?=$haha["HinhAnh"]?>" width="20px"></td> <!-- Hiển thị hình ảnh nhỏ -->  
        <td><?=$haha["NoiDung"]?></td>   
        <td>  
            <a href="index.php?action=edittintuc/<?=$haha["id_TinTuc"]?>" class="btn btn-sm btn-warning"><i data-feather="edit"></i>Sửa</a>  
            <br>  
            <a href="index.php?action=deletetintuc/<?=$haha["id_TinTuc"]?>" onclick="return confirm('Bạn có thực sự muốn xóa?')" class="btn btn-sm btn-danger"><i data-feather="trash-2"></i>Xóa</a>  
        </td>  
    </tr>  
<?php endforeach; ?>  
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