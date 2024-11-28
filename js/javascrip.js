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
