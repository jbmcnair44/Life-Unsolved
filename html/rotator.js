var slideIndex = 0;
var n = 0;
carosel(n);
timer;



function indexDown(){
	slideIndex -= 2;
	
}

function carosel(){
	var i;
	var x = document.getElementsByClassName("mySlides");
	timer = setTimeout (carosel,5000);
	for (i = 0; i < x.length; i++) {x[i].style.display = "none";}
	if (slideIndex >= x.length) {slideIndex = 0} 
	if (slideIndex < 0) {slideIndex = 3} 
	x[slideIndex].style.display = "block";
	slideIndex++;
	timer;
}

function nextSlide(){
	clearTimeout(timer);
	return carosel();
	
}

function prevSlide(){
	clearTimeout(timer);
	indexDown()	
	return carosel();
	
}
