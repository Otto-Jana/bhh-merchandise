<?php

	$host = "localhost";
	$username = "root";
	$password = "040BeruflicheHochschule";
	$dbname = "merchandise_shop";
	$InputValue = $_COOKIE["tileType"];
	// $InputValue = (int)$InputValue;
	

	 // Create connection
	$conn = mysqli_connect(hostname: $host, username: $username, password: $password, database: $dbname);
	if(!$conn)
	{
	die("Connection Error:" . mysqli_connect_error());
	}
	
	//               GET NECESSARY TILE INFORMATION FROM DATABASE

	if(InputValue = "1") //Best Sellers
	{
		$sql = "SELECT * FROM product ORDER BY sellingScore DESC LIMIT 10";

	}
	else if(InputValue = "2") //For You
	{
		
	}
	else { //New Arrivals
		$sql = "SELECT * FROM Products ORDER BY Date_Added DESC LIMIT 50";
	}

	$result = $conn->query($sql);
	$row =	$result->fetch_assoc();
	$returnedRows =  json_encode_($row);

	// $file = fopen('../temp/tile-list.json','w');
	// fwrite($file, $returnedRows);
	// fclose($file);

	// echo "<script>  window.location.href ='../shop_tiles.html';</script>"


?>

