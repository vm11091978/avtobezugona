// Анимация - выдвигающееся меню
let menuAdd = document.getElementById('menu-add');
let menuDel = document.getElementById('menu-del');
let menu = document.getElementById('menu'); // let menu = document.getElementsByClassName('menu')[0];

let time = 0;
function animate()
{
	if (time < 250) {
		menu.style.width = time + 'px';
		time += 5;
		setTimeout("animate()", 20);
	} else if (time = 250) {
		menu.style.width = '100%';
		menu.style.overflow = 'visible';
	}
}

function deanimate()
{
	menu.style.overflow = 'hidden';
	if (time > 0) {
		menu.style.width = time + 'px';
		time -= 5;
		setTimeout("deanimate()", 20);
	} else if (time == 0) {
		menu.removeAttribute('style'); // удалим аттрибуты вместо того, чтобы изменить: menu.style.display = 'none';
	}
}

menuAdd.addEventListener('click', function() {
	if (time == 0) {
		menuDel.style.zIndex = '3';
		menu.style.display = 'block';
		animate();
	}
});

menuDel.addEventListener('click', function() {
	if (time == 250) {
		window.clearTimeout(animate);
		menuDel.style.zIndex = '1';
		deanimate();
	}
});

// Ниже весь код для слайдера
var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
    showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
var i;
var slides = document.getElementsByClassName("mySlides");
var dots = document.getElementsByClassName("dot");
if (n > slides.length) {slideIndex = 1}
if (n < 1) {slideIndex = slides.length}
for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
}
for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
}

slides[slideIndex-1].style.display = "block";
dots[slideIndex-1].className += " active";
}

/*
let timer = setInterval(function(){
    slideIndex++;
    showSlides(slideIndex);
},
5000);
*/
// Сделаем автоматическое перелистывание слайдов
function Slideshow() {
    slideIndex++;
    showSlides(slideIndex);
}
let timer = setInterval(Slideshow, 5000);

// При нажатии на любую кнопку обнулим интервал автоматического перелистывания слайдов
let buttons = document.getElementsByClassName('button');
for (i = 0; i < buttons.length; i++) {
	buttons[i].addEventListener('click', function() {
		clearInterval(timer);
		timer = setInterval(Slideshow, 5000);
	});
}