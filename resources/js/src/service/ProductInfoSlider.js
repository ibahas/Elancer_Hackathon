let thumbnails = document.getElementsByClassName("thumbnail");

let activeImages = document.getElementsByClassName("active-image");

for (var i = 0; i < thumbnails.length; i++) {
    thumbnails[i].addEventListener("mouseover", function () {
        console.log(activeImages);

        if (activeImages.length > 0) {
            activeImages[0].classList.remove("active-image");
        }

        this.classList.add("active-image");
        document.getElementById("featured").src = this.src;
    });
}

let buttonRight = document.getElementById("slideRight");
let buttonLeft = document.getElementById("slideLeft");

if(buttonLeft){
	buttonLeft.addEventListener("click", function () {
		document.getElementById("slider").scrollLeft -= 180;
	});
}if(buttonRight){
	buttonRight.addEventListener("click", function () {
		document.getElementById("slider").scrollLeft += 180;
	});
	
}

