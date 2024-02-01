leftButton = document.getElementById("left-button");
rightButton = document.getElementById("right-button");
slideshowcontent = document.getElementById("content");
// Get all elements from index.html


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




function HandleTopSellerTrigger() {
    document.cookie="tileType=1";
    console.log(document.cookie);
    console.log("Succsessfuly set the cookie: tileType=1");
    window.location.href ="./php_scripts/handle_sql_requests.php";
  
};

function HandleForYouTrigger() {
    document.cookie="tileType=3";
    console.log("Succsessfuly set the cookie: tileType=2");
    window.location.href ="./php_scripts/handle_sql_requests.php";

};

function HandleNewArrivalTrigger() {

    document.cookie="tileType=3";
    console.log("Succsessfuly set the cookie: tileType=3");
    window.location.href ="./php_scripts/handle_sql_requests.php";
};

button1 = document.getElementById("top_seller_bttn").onclick = HandleTopSellerTrigger;
button2 = document.getElementById("fuer_dich_bttn").onclick = HandleForYouTrigger;
button3 = document.getElementById("new_arrivals_bttn").onclick = HandleNewArrivalTrigger;
console.log("Setup all triggers");

 
