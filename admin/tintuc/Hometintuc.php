<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div
          class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Dashboard</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <button type="button" class="btn btn-primary">Thêm mới</button>
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
          </table>
        </div>
      </main>
    </div>
  </div>
  <tbody>  
  <?php foreach ($tintuc as $tintuc){?>  
    <tr>  
        <td><?=$tintuc["id_TinTuc"]?></td>   
        <td><?=$tintuc["Tieu De"]?></td>  
        <td><?=$tintuc["Ngay Dang"]?></td>  
        <td><img src="<?=$tintuc["HinhAnh"]?>" alt="<?=$tintuc["TinTuc"]?>" width="50"></td> <!-- Hiển thị hình ảnh nhỏ -->
        <td><?=$tintuc["NoiDung"]?></td>      
        <td>  
          <a href="edittintuc/<?=$tintuc["id_TinTuc"]?>" class="btn btn-sm btn-warning"><i data-feather="edit"></i>Sửa</a>  
          <br>  
          <a href="deletetintuc/<?=$tintuc["id_TinTuc"]?>" onclick="return confirm('Bạn có thực sự muốn xóa?')" class="btn btn-sm btn-danger"><i data-feather="trash-2"></i>Delete</a>
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