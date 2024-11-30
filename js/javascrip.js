let currentIndex = 0;
const slides = document.getElementById('slides');
const totalSlides = slides.children.length;

function showNextSlide() {
    currentIndex = (currentIndex + 1) % totalSlides;
    slides.style.transform = `translateX(-${currentIndex * 100}%)`;
}

setInterval(showNextSlide, 3000); 

const categoriProductH = document.querySelectorAll('.Category-product-home');  
const products = document.querySelectorAll('.product-home-one');   
 
categoriProductH[0].classList.add('active');  
products[0].classList.add('active'); 
products[1].classList.add('active'); 
products[2].classList.add('active'); 
products[3].classList.add('active'); 
products[4].classList.add('active'); 
products[5].classList.add('active'); 
products[6].classList.add('active'); 
products[7].classList.add('active'); 


categoriProductH.forEach(link => {  
    link.addEventListener('click', function(event) {  
        event.preventDefault();  

        // Xóa lớp 'active' khỏi tất cả các mục  
        categoriProductH.forEach(l => l.classList.remove('active'));  
        
        // Xóa lớp 'active' khỏi tất cả sản phẩm  
        products.forEach(p => p.classList.remove('active'));  

        // Thêm lớp 'active' cho mục đang được nhấp  
        this.classList.add('active');  

        // Lấy danh mục của mục đã nhấp  
        const category = this.getAttribute('data-category');  

        // Hiển thị sản phẩm tương ứng với danh mục đã chọn  
        products.forEach(p => {  
            if (p.getAttribute('data-product-category') === category) {  
                p.classList.add('active'); // Hiển thị sản phẩm tương ứng  
            }  
        });  
    });  
});
//js gio hang
let cartCount = 0; // Số lượng sản phẩm trong giỏ
let cartItems = []; // Danh sách sản phẩm trong giỏ

function showCart() {
  const cartPopup = document.getElementById("cart-popup");
  cartPopup.style.display = "block";

  // Nếu giỏ hàng rỗng, hiển thị thông báo
  if (cartItems.length === 0) {
    document.getElementById("cart-items").innerHTML = "<li>Giỏ hàng trống</li>";
  }
}

function hideCart() {
  document.getElementById("cart-popup").style.display = "none";
}

function goToCart() {
  alert("Chuyển đến trang giỏ hàng!"); // Thay bằng URL thực tế
}

function addToCart(productName, productPrice, productImage) {
  let product = cartItems.find(item => item.name === productName);

  if (product) {
    // Nếu sản phẩm đã có trong giỏ, tăng số lượng
    product.quantity++;
  } else {
    // Nếu chưa có, thêm sản phẩm vào giỏ hàng
    cartItems.push({ name: productName, price: productPrice, image: productImage, quantity: 1 });
  }

  updateCartPopup(); // Cập nhật popup giỏ hàng
  updateCartCount(); // Cập nhật số lượng trong biểu tượng giỏ hàng
}

function updateCartCount() {
  // Tính tổng số lượng sản phẩm trong giỏ hàng
  cartCount = cartItems.reduce((total, item) => total + item.quantity, 0);
  document.getElementById("cart-count").innerText = cartCount;
}

function updateCartPopup() {
  const cartPopup = document.getElementById("cart-items");
  cartPopup.innerHTML = ''; // Xóa nội dung giỏ hàng cũ

  let totalPrice = 0; // Biến lưu tổng tiền giỏ hàng

  cartItems.forEach(item => {
    const li = document.createElement("li");

    // Tạo cấu trúc sản phẩm với ảnh, tên, giá, và các nút - 1 +
    li.innerHTML = `
      <div class="cart-item">
        <img src="${item.image}" alt="${item.name}" class="cart-item-image">
        <div class="cart-item-info">
          <p class="cart-item-name">${item.name}</p>
          <p class="cart-item-price">${item.price.toLocaleString()}đ</p>
        </div>
        <div class="cart-item-actions">
          <button onclick="updateQuantity('${item.name}', -1)">-</button>
          <span>${item.quantity}</span>
          <button onclick="updateQuantity('${item.name}', 1)">+</button>
          <button onclick="removeFromCart('${item.name}')">Xóa</button>
        </div>
      </div>
    `;
    
    cartPopup.appendChild(li);

    // Cộng dồn tổng tiền
    totalPrice += item.price * item.quantity;
  });

  // Cập nhật tổng tiền vào giỏ hàng
  document.getElementById("total-price").innerText = totalPrice.toLocaleString() + "đ";
}

function updateQuantity(productName, delta) {
  let product = cartItems.find(item => item.name === productName);
  if (product) {
    product.quantity += delta;

    if (product.quantity <= 0) {
      removeFromCart(productName);
    } else {
      updateCartPopup();
      updateCartCount();
    }
  }
}

function showCart() {
  const cartPopup = document.getElementById("cart-popup");
  cartPopup.style.display = "block";
}

function hideCart() {
  const cartPopup = document.getElementById("cart-popup");
  setTimeout(() => {
    if (!cartPopup.matches(":hover") && !document.querySelector(".cart-icon").matches(":hover")) {
      cartPopup.style.display = "none";
    }
  }, 200); // Tránh mất popup ngay lập tức
}
