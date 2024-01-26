leftButton = document.getElementById("left-button");
rightButton = document.getElementById("right-button");
slideshowcontent = document.getElementById("content");

let prevSlide = 0;
let slideBlock = false;

leftButton.addEventListener("click", function() {
    if(parseInt(slideshowcontent.style.marginLeft) >= 0 || slideBlock) return
    slideshowcontent.style.marginLeft = parseInt(slideshowcontent.style.marginLeft) + 100 + "%";
});

rightButton.addEventListener("click", function() {
    if(parseInt(slideshowcontent.style.marginLeft) <= -200 || slideBlock) return
    slideshowcontent.style.marginLeft = parseInt(slideshowcontent.style.marginLeft) - 100 + "%";
});

setInterval(function() {

    if(prevSlide !== parseInt(slideshowcontent.style.marginLeft)) {
        prevSlide = parseInt(slideshowcontent.style.marginLeft);
        return;
    }

    if(parseInt(slideshowcontent.style.marginLeft) <= -200) {
        slideshowcontent.style.marginLeft = 0 + "%";
    } else {
        slideshowcontent.style.marginLeft = parseInt(slideshowcontent.style.marginLeft) - 100 + "%";
    }

    prevSlide = parseInt(slideshowcontent.style.marginLeft);
    slideBlock = true;
    setTimeout(function() {
        slideBlock = false;
    }, 600);
}, 6500);


document.documentElement.dataset.scroll = window.scrollY.toString();
document.addEventListener('scroll', (_) => {
  document.documentElement.dataset.scroll = window.scrollY.toString();
}, { passive: true });


Array.from(document.getElementsByClassName("toggle-menu")).forEach(element => { 
    element.addEventListener("click", function() {
        document.getElementById("sidebar").classList.toggle("active");
    })
})

