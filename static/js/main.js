
window.onload = function(){
// Get all elements from index.html
const TopSellerBttn = document.getElementById("top_seller_bttn").onclick = HandleTopSellerTrigger;
const ForYouBttn = document.getElementById("fuer_dich_bttn").onclick = HandleForYouTrigger;
const NewArrivalBttn = document.getElementById("new_arrivals_bttn").onclick = HandleNewArrivalTrigger;
var returnedRows = "empty";
function HandleTopSellerTrigger() {
    document.cookie="tileType=1";
    console.log("Succsessfuly set the cookie: tileType=1");
    HandlePHPResponse();
};

function HandleForYouTrigger() {
    window.location.href = "handle_sql_requests.php?transmitted_value=" + 2;
    window.location.href = "shop_tiles.html";
};

function HandleNewArrivalTrigger() {
    window.location.href = "handle_sql_requests.php?transmitted_value=" + 3;
    window.location.href = "shop_tiles.html";
};

function HandlePHPResponse() {
 
    
    //get array with data and do a while loop to fill up an array of html elements
    while(returnedRows == "empty")
    {
        console.log("No returned rows from the PHP Script yet.");
    }
    window.location.href = "shop_tiles.html";
    console.log("Row return: succsess!");
//     array.forEach(content => {

//         TileName = content[];
//         document.getElementsByTagName("body").innerHTML + newTile;
//     });
// }

};

}