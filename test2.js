document.querySelectorAll('.thumbnail').forEach(thumbnail => {
    thumbnail.addEventListener('click', event => {
        console.log("Thumbnail clicked:", event.target.src); // Kiểm tra sự kiện click
        document.querySelector('.main-image').src = event.target.src;
    });
});
