<?php

	$host = "localhost";
	$username = "root";
	$password = "040BeruflicheHochschule";
	$dbname = "merchandise_shop";
	$InputValue = $_COOKIE["tileType"];
	$InputValue = (int)$InputValue;
	$sql = "empty";

	 // Create connection
	$conn = mysqli_connect(hostname: $host, username: $username, password: $password, database: $dbname);
	if(!$conn)
	{
	die("Connection Error:" . mysqli_connect_error());
	}
	echo "successs";

	
	//               GET NECESSARY TILE INFORMATION FROM DATABASE

	if($InputValue == 1) //Best Sellers
	{
		echo "In statement";
		global $sql;
		$sql = "SELECT * FROM product ORDER BY sellingScore DESC LIMIT 10";

	}
	echo " After If. Statement: $sql";
	else if(InputValue == 2) //For You
	{
		
	}
	else { //New Arrivals
		global $sql;
		$sql = "SELECT * FROM Products ORDER BY Date_Added DESC LIMIT 50";
	}

	$result = $conn->query($sql);
	echo "Ececuted statement";
	$row =	$result->fetch_assoc();
	echo "Fetched Assoc";
	$returnedRows =  json_encode($row);
	echo "rows encoded to json: $returnedRows";
	// setcookie("returnedRows", $returnedRows);

	// echo "<script>  window.location.href ='../shop_tiles.html';</script>"


?>

