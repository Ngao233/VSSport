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
                <th>ID bài viết</th>
                <th>Tiêu đề</th>
                <th>Danh mục</th>
                <th>Thao tác</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Bảng tin 1</td>
                <td>Danh mục 1</td>
                <td>
                  <button class="btn btn-sm btn-warning">Sửa</button>
                  <button class="btn btn-sm btn-danger">Xóa</button>
                </td>
              </tr>
              <tr>
                <td>2</td>
                <td>Bảng tin 2</td>
                <td>Danh mục 2</td>
                <td>
                  <button class="btn btn-sm btn-warning">Sửa</button>
                  <button class="btn btn-sm btn-danger">Xóa</button>
                </td>
              </tr>
              <!-- Thêm sản phẩm tùy ý -->
            </tbody>
          </table>
        </div>
      </main>
    </div>
  </div>
  <tbody>  
      <?php foreach ($tintuc as $tintuc){?>   
      <tr>  
        <td><?=$oder["id_TinTuc"]?></td>  
        <td><?=$oder["id_SanPham"]?></td>  
        <td><?=$oder["TieuDe"]?></td>  
        <td>  
          <a href="editoder/<?=$oder["id_TinTuc"]?>" class="btn btn-sm btn-warning"><i data-feather="edit"></i>Sửa</a>  
          <br>  
          <a href="deleteoder/<?=$oder["id_TinTuc"]?>" onclick="return confirm('Bạn có thực sự muốn xóa?')" class="btn btn-sm btn-danger"><i data-feather="trash-2"></i>Delete</a>
        </td>  
      </tr>  
      <?php }?>  
    </tbody> 

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/feather-icons"></script>
  <script>
    feather.replace()
  </script>