<?php

	$host = "localhost";
	$username = "root";
	$password = "040BeruflicheHochschule";
	$dbname = "merchandise_shop";
	$InputValue = $_COOKIE["tileType"];
	$InputValue = (int)$InputValue;
	$sql = "empty";
	$sql_images = "empty";
	$gatheringStatus = "0";
	$sqlImageAmount = 0;

	 // Create connection
	$conn = mysqli_connect(hostname: $host, username: $username, password: $password, database: $dbname);
	if(!$conn)
	{
	die("Connection Error:" . mysqli_connect_error());
	}

	
	//               GET NECESSARY TILE INFORMATION FROM DATABASE

	if($InputValue == 1) //Best Sellers
	{
		global $sql;
		global $sql_images;
		$sql = "SELECT * FROM product ORDER BY sellingScore DESC LIMIT 10";
		$sql_images = "SELECT image_path from (SELECT image_path, x.sellingScore from image_paths INNER JOIN (SELECT productID, sellingScore from product ORDER BY sellingScore DESC LIMIT 10)as x ON image_paths.productID = x.productID) as y ORDER BY sellingScore DESC";

	}
	else if($InputValue == 2) //For You
	{
		
	}
	else { //New Arrivals
		global $sql;
		$sql = "SELECT * FROM Products ORDER BY Date_Added DESC LIMIT 50";
	}
	// echo " After If. Statement: $sql";

	$result = $conn->query($sql);
	// echo "Ececuted statement";
	$rows =	$result->fetch_all();
	// echo "Fetched Assoc";
	$returnedRows =  json_encode($rows);
	// echo "rows encoded to json: $returnedRows";

	$image_result = $conn->query($sql_images);
	// echo "Ececuted statement";
	$image_rows =	$image_result->fetch_all();
	// echo "Fetched Assoc";
	$returnedImageRows =  json_encode($image_rows);
	// echo "<script>  window.location.href ='../shop_tiles.html';</script>"
	$gatheringStatus = "1";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Sellers - BHHxITECH</title>
    <link rel="stylesheet" href="../css/shop_tiles.css">
    <link rel="stylesheet" href="https://use.typekit.net/bsc2ugu.css">
    <script src="../static/js/shop_tiles.js"></script>
</head>
<body id="body">

<div class="nav-div">
            <!-- <img src="./topbarbackground.svg" id="topbar-background"> -->
                <img src="../_static/landingpageimages/TopperBar.png" id="nav-div__topper-bar">
                    <div class="nav-div__container">
                        <div class="nav-div__menu-and-logo">
                            <img src="../_static/landingpageimages/menu.png" alt="Menu" id="menu-buttom" class="nav-div__container__menu-button">
                            <a href="../index.html"><img src="../_static/landingpageimages/logo.svg" alt="Logo" class="nav-div__container__logo"></a>
                        </div>

                        <input class="nav-div__container__search" placeholder="Imperial Ice Hoodie">
                        <div class="nav-div__cart-and-profile">
                            <img src="../_static/landingpageimages/profile.png" alt="Profile" class="nav-div__container__profile-icon">
                           <a href="../shopping_cart.html"> <img src="../_static/landingpageimages/cart.png" alt="Profile" class="nav-div__container__cart-icon" > </a>
                        </div>
                    </div>
        </div>

    <div class="tile-container" id="tile-containerID">


    </div>


	
		<script  type="text/javascript" id="newRows"> 
			
			var variable = '<?= $returnedRows ?>';
			var obj = JSON.parse(variable);
			var image_rows = '<?= $returnedImageRows ?>';
			var image_obj = JSON.parse(image_rows);

			var firstValue = obj[0][3];
			console.log(firstValue);	
			var val = document.getElementById("tile-containerID");
			var index = 0;
			console.log("Reached for loop");
			
			
			
			
			while (index < 10)
			{
			console.log("Enter loop.");
			
			if (obj[index] == null)
			{
				break;
			}
			
			var tile_image_location = "";
			
			val.innerHTML = 
				(val.innerHTML + 
					`<div class="tile" style="background-image: url(${ image_obj[index] })">
						<div class="tile__pricewrapper">
							<h1 class="tile__priceuvp"> 15.99$ </h1>
							<h1 class="tile__price"> ${ obj[index][3] } </h1>
							</div>
							<div class="tile__metawrapper">
								<div class="tile__colorcontainer">
									<div class="color color-black"></div>
									<div class="color color-white"></div>
									<div class="color color-grey"></div>
									<div class="color color-dark-grey"></div>
								</div>  
							<h2 class="tile__name">${ obj[index][1] }</h2>
							<p class="tile__slogan">${ obj[index][5] }</p>
							</div>
						</div>
					</div> `
				);
			index += 1;
			};
			
		</script>
    </body>

</html>
