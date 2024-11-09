var textN = document.getElementById('textN');
        var numberN = document.getElementById('numberN');
        function Textaction() {
            textN.innerHTML = "";
            var Name = document.getElementById('nametext').value;
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

