<?php

	$host = "localhost";
	$username = "root";
	$password = "040BeruflicheHochschule";
	$dbname = "merchandise_shop";
	$InputValue = $_COOKIE["tileType"];
	$InputValue = (int)$InputValue;
	$sql = "empty";
	$gatheringStatus = "0";

	 // Create connection
	$conn = mysqli_connect(hostname: $host, username: $username, password: $password, database: $dbname);
	if(!$conn)
	{
	die("Connection Error:" . mysqli_connect_error());
	}
	// echo "successs";

	
	//               GET NECESSARY TILE INFORMATION FROM DATABASE

	if($InputValue == 1) //Best Sellers
	{
		// echo "In statement";
		global $sql;
		$sql = "SELECT * FROM product ORDER BY sellingScore DESC LIMIT 10";

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



    <div class="tile-container">

        <div class="tile">
            <div class="tile__pricewrapper">
				<h1 class="tile__priceuvp"> 15.99$ </h1>
				<h1 class="tile__price"> 9.99$ </h1>
				</div>
				<div class="tile__metawrapper">
					<div class="tile__colorcontainer">
						<div class="color color-black"></div>
						<div class="color color-white"></div>
						<div class="color color-grey"></div>
						<div class="color color-dark-grey"></div>
					</div>  
				<h2 class="tile__name">Imperial Ice</h2>
				<p class="tile__slogan">SHOW YOUR ABILITIES</p>
				</div>
        	</div>
        </div> 
    </div>


	
		<script  type="text/javascript" id="newRows"> 
			
			var variable = '<?= $returnedRows ?>';
			var obj = JSON.parse(variable);
			var firstValue = obj[0][3];
			console.log(firstValue);	
			var val = document.getElementById("body");
			var index = 0;

			while (index >= 10)
			{
				val.innerHTML = 
				(val.innerHTML + 
				'<div class="tile-container">' +

					'<div class="tile">' +
						'<div class="tile__pricewrapper">' +
						'	<h1 class="tile__priceuvp"> 15.99$ </h1>' +
							'<h1 class="tile__price"> ${obj[index][3]} </h1>' +
						'	</div>' +
							'<div class="tile__metawrapper">' +
								'<div class="tile__colorcontainer">' +
									'<div class="color color-black"></div>' +
									'<div class="color color-white"></div>' +
									'<div class="color color-grey"></div>' +
									'<div class="color color-dark-grey"></div>' +
								'</div>  ' +
							'<h2 class="tile__name">Imperial Ice</h2>' +
							'<p class="tile__slogan">SHOW YOUR ABILITIES</p>' +
							'</div>' +
						'</div>' +
					'</div> ' +
				'</div>');
				index += 1;
			}
			
		</script>
    </body>

</html>
