<style>
     .formhome input{
                display:none;
            }
</style>
<section class="duy">  
    <img src="../public/image/<?=$product['HinhAnh']?>" alt="<?=$product['HinhAnh']?>" id="hoa" onmouseover="mouseover()" onmouseout="mouseout()" width="540px"/>  
    <h1 class="hhhhh"><?=$product['TenSanPham']?></h1>  
    <hr>  

    <p class="ngum">Giá Sản Phẩm</p>  
    <p class="ngu"><?=$product['Gia']?> đ</p>  
    <button class="time"><i class="fa-solid fa-heart"></i>Thêm vào yêu thích</button>  

    <p class="p-product-sale-name">Chọn kích thước:</p>  
    <button class="size">S</button>  
    <button class="size">M</button>  
    <button class="size">L</button>  
    <button class="size">XL</button>  
    <button class="size">XXL</button>  

    <form id="addToCartForm" class="formhome" onsubmit="return false;">  
    <input type="hidden" name="id_SanPham" value="<?=$product['id_SanPham']?>">  
    <input type="number" name="quantity" value="1" min="1" class="quantity-input" style="width: 50px; text-align: center;">  
    <button class="product-home-one-button" id="btn" type="button" onclick="addToCart('<?=$product['id_SanPham']?>', this)">  
        Thêm vào giỏ hàng  
    </button>  
</form> 
</section>  

<script>  
document.querySelectorAll('.formhome').forEach(form => {  
        const quantityInput = form.querySelector('.quantity-input');  
        
        form.addEventListener('submit', () => {  
            
            if (parseInt(quantityInput.value) < 1) {  
                quantityInput.value = 1;  
            }  
        });  
    }); 
    function addToCart(idSanPham, button) {  
    const form = button.closest('form');   
    const quantity = form.querySelector('input[name="quantity"]').value;   
    const formData = new FormData();  
    formData.append('id_SanPham', idSanPham);  
    formData.append('quantity', quantity);  

    // Sử dụng button mà bạn đã nhấn thay vì lấy lại từ id  
    const btn = button; // Sử dụng button được truyền vào  

    fetch('addtocart', {  
        method: 'POST',  
        body: formData  
    })  
    .then(response => response.json())  
    .then(data => {  
        console.log(data);  
        updateCartDisplay(data.cartDetails);   
        btn.innerText = "Đã thêm vào giỏ hàng"; // Thay đổi văn bản  
        btn.disabled = true; // Vô hiệu hóa button để tránh nhấn nhiều lần  
        btn.style.backgroundColor = "#4CAF50"; // Thay đổi màu nền thành màu xanh  
        btn.style.color = "white"; // Thay đổi màu chữ thành trắng  
    })  
    .catch(error => {  
        console.error('Error:', error);  
    });  
}
</script>