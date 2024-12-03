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
        <th>Ngày đặt hàng</th>  
        <th>Trạng thái</th>  
        <th>Thao tác</th>

      </tr>  
    </thead>  
    <tbody>  
      <?php foreach ($oder as $oder){?>   
      <tr>  
        <td><?=$oder["id_DonHang"]?></td>  
        <td><?=$oder["NgayDatHang"]?></td>  
        <td><?=$oder["TrangThai"]?></td>  
        <td>  
          <a href="index.php?action=editoder/<?=$oder["id_DonHang"]?>" class="btn btn-sm btn-warning"><i data-feather="edit"></i>Sửa</a>  
          <br>  
          <a href="index.php?action=deleteoder/<?=$oder["id_DonHang"]?>" onclick="return confirm('Bạn có thực sự muốn xóa?')" class="btn btn-sm btn-danger"><i data-feather="trash-2"></i>Delete</a>
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