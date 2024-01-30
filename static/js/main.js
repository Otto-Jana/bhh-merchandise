window.onload = function(){
// Get all elements from index.html
const TopSellerBttn = document.getElementById("top_seller_bttn").onclick = HandleTopSellerTrigger;
const ForYouBttn = document.getElementById("fuer_dich_bttn").onclick = HandleForYouTrigger;
const NewArrivalBttn = document.getElementById("new_arrivals_bttn").onclick = HandleNewArrivalTrigger;
};

var returnedRows = "empty";
function HandleTopSellerTrigger() {
    document.cookie="tileType=1";
    console.log("Succsessfuly set the cookie: tileType=1");
    window.location.href ="./php_scripts/handle_sql_requests.php";
  
};

function HandleForYouTrigger() {
    document.cookie="tileType=2";
    window.location.href = "handle_sql_requests.php?tileType=" + 2;
    window.location.href = "shop_tiles.html";

};

function HandleNewArrivalTrigger() {
    document.cookie="tileType=3";
    window.location.href = "handle_sql_requests.php?tileType=" + 3;
    window.location.href = "shop_tiles.html";
};

function HandlePHPResponse() {
 

    //get array with data and do a while loop to fill up an array of html elements

   
//     array.forEach(content => {

//         TileName = content[];
//         document.getElementsByTagName("body").innerHTML + newTile;
//     });
// }

};

export { returnedRows };