var textN = document.getElementById('textN');
        var numberN = document.getElementById('numberN');
        function Textaction() {
            textN.innerHTML = "";
            var Name = document.getElementById('nametext').value;
            Name = Name.toUpperCase();
            textN.innerHTML = Name;
        }
        function Numberr() {
            numberN.innerHTML = "";
            var Numberr = document.getElementById('numbertext').value;
            numberN.innerHTML = Numberr;
        }


        let currentIndex = 0;
        
const slides = document.getElementById('slides');
const totalSlides = slides.children.length;

function showNextSlide() {
    currentIndex = (currentIndex + 1) % totalSlides;
    slides.style.transform = `translateX(-${currentIndex * 100}%)`;
}

setInterval(showNextSlide, 3000);

var imgspin = document.getElementById("image-chinh"); 

var Mangimg = [
    {id: 1 ,name:"Áo Manchester City 24/25", src:"image/image.png"},
    {id: 2 ,name:"Áo Manchester City Home 24/25", src:"image/mc-xanh-sau.png"},
    {id: 3 ,name:"Áo Manchester City Red 24/25", src:"image/mc-red-sau.png"},
    {id: 4 ,name:"Áo Manchester City Yelow 24/25", src:"image/mc-yelow-sau.png"},
]
function image(n){
    for( var i = 0 ; i < Mangimg.length; i++){
        if(Mangimg[i].id === n){
            imgspin.src = Mangimg[i].src;
            break;
        }
 
     

 }
}
