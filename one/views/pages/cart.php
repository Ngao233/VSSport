<div class="container my-5">
    <h2 class="mb-4">Giỏ Hàng</h2>
    
    <div class="table-responsive">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th scope="col">Sản Phẩm</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Số Lượng</th>
                    <th scope="col">Tổng Giá</th>
                    <th scope="col">Xóa</th>
                </tr>
            </thead>
            <tbody>
                <!-- Sản phẩm 1 -->
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <img src="product1.jpg" alt="Sản phẩm 1" class="img-thumbnail me-3" style="width: 60px;">
                            <div>
                                <h6 class="mb-0">Sản phẩm 1</h6>
                                <small class="text-muted">Mô tả sản phẩm</small>
                            </div>
                        </div>
                    </td>
                    <td>₫500,000</td>
                    <td>
                        <input type="number" class="form-control" value="1" min="1" style="width: 70px;">
                    </td>
                    <td>₫500,000</td>
                    <td><button class="btn btn-outline-danger btn-sm">Xóa</button></td>
                </tr>

                <!-- Sản phẩm 2 -->
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <img src="product2.jpg" alt="Sản phẩm 2" class="img-thumbnail me-3" style="width: 60px;">
                            <div>
                                <h6 class="mb-0">Sản phẩm 2</h6>
                                <small class="text-muted">Mô tả sản phẩm</small>
                            </div>
                        </div>
                    </td>
                    <td>₫300,000</td>
                    <td>
                        <input type="number" class="form-control" value="2" min="1" style="width: 70px;">
                    </td>
                    <td>₫600,000</td>
                    <td><button class="btn btn-outline-danger btn-sm">Xóa</button></td>
                </tr>

                <!-- Tổng cộng -->
                <tr>
                    <td colspan="3" class="text-end"><strong>Tổng cộng:</strong></td>
                    <td><strong>₫1,100,000</strong></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <!-- Thanh toán -->
    <div class="d-flex justify-content-end mt-4">
        <button class="btn btn-primary">Thanh Toán</button>
    </div>
</div>