
window.onload = function(){
// Get all elements from index.html
const TopSellerBttn = document.getElementById("top_seller_bttn").onclick = HandleTopSellerTrigger;
const ForYouBttn = document.getElementById("fuer_dich_bttn").onclick = HandleForYouTrigger;
const NewArrivalBttn = document.getElementById("new_arrivals_bttn").onclick = HandleNewArrivalTrigger;


function HandleTopSellerTrigger() {
    window.location.href = "shop_tiles.html";
};

function HandleForYouTrigger() {
    window.location.href = "shop_tiles.html";
};

function HandleNewArrivalTrigger() {
    window.location.href = "shop_tiles.html";
};
}