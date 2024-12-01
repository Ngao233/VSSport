<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">  
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">  
          <h1 class="h2">Dashboard</h1>  
          <a href="addproduct" class="btn btn-primary">Thêm Sản Phẩm Mới</a> 
        </div>  

        <h2 class="mb-3">Danh sách sản phẩm</h2>  
        <form action="searchproduct" method="post">
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
        <th>Trạng Thái</th> 
      </tr>  
    </thead>  
    <tbody>  
      <?php foreach ($user as $user){?>   
      <tr>  
        <td><?=$user["id_KhachHang"]?></td>  
        <td><?=$user["Ho"]?><?=$user["Ten"]?></td>  
        <td><?=$user["Sdt"]?></td>  
        <td><?=$user["Email"]?></td>  
        <td><?=$user["MatKhau"]?></td> 
        <td><?=$user["AnhDaiDien"]?></td>  
        <td>  
          <a href="edituser/<?=$user["id_KhachHang"]?>" class="btn btn-sm btn-warning"><i data-feather="edit"></i>Sửa</a>  
          <br>  
          <a href="deleteuser/<?=$user["id_KhachHang"]?>" onclick="return confirm('Bạn có thực sự muốn xóa?')" class="btn btn-sm btn-danger"><i data-feather="trash-2"></i>Delete</a>
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