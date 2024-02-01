

window.onload = function(){
// Get all elements from index.html
document.getElementById("top_seller_bttn").onclick = HandleTopSellerTrigger;
document.getElementById("fuer_dich_bttn").onclick = HandleForYouTrigger;
document.getElementById("new_arrivals_bttn").onclick = HandleNewArrivalTrigger;
console.log("Setup all triggers");
};

var returnedRows = "empty";
function HandleTopSellerTrigger() {
    document.cookie="tileType=1";
    console.log("Succsessfuly set the cookie: tileType=1");
    window.location.href ="./php_scripts/handle_sql_requests.php";
  
};

function HandleForYouTrigger() {
    document.cookie="tileType=3";
    console.log("Succsessfuly set the cookie: tileType=2");
    window.location.href ="./php_scripts/handle_sql_requests.php";

};

function HandleNewArrivalTrigger() {
    console.log("Succsessfuly set the cookie: tileType=3");
    document.cookie="tileType=3";
    console.log("Succsessfuly set the cookie: tileType=3");
    window.location.href ="./php_scripts/handle_sql_requests.php";
};

function HandlePHPResponse() {
 

    //get array with data and do a while loop to fill up an array of html elements

   
//     array.forEach(content => {

//         TileName = content[];
//         document.getElementsByTagName("body").innerHTML + newTile;
//     });
// }

};