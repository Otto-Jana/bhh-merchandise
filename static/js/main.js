
window.onload = function(){
// Get all elements from index.html
const TopSellerBttn = document.getElementById("top_seller_bttn").onclick = HandleTopSellerTrigger;
const ForYouBttn = document.getElementById("fuer_dich_bttn").onclick = HandleForYouTrigger;
const NewArrivalBttn = document.getElementById("new_arrivals_bttn").onclick = HandleNewArrivalTrigger;

function HandleTopSellerTrigger() {
    document.cookie="tileType=1";
};

function HandleForYouTrigger() {
    window.location.href = "handle_sql_requests.php?transmitted_value=" + 2;
    window.location.href = "shop_tiles.html";
};

function HandleNewArrivalTrigger() {
    window.location.href = "handle_sql_requests.php?transmitted_value=" + 3;
    window.location.href = "shop_tiles.html";
};

// function HandlePHPResponse() {
//     window.location.href = "shop_tiles.html";
    
//     //get array with data and do a while loop to fill up an array of html elements

//     array.forEach(content => {

//         TileName = content[];
//         document.getElementsByTagName("body").innerHTML + newTile;
//     });
// }

}