<?php

	$host = "localhost";
	$username = "root";
	$password = "040BeruflicheHochschule";
	$dbname = "merchandise_shop";
	$InputName = $_POST["transmitted_value"];

	 // Create connection
	$conn = mysqli_connect(hostname: $host, username: $username, password: $password, database: $dbname);
	if(!$conn)
	{
	die("Connection Error:" . mysqli_connect_error());
	}
	echo "Connection Succsess!";
	




	//               GET NECESSARY TILE INFORMATION FROM DATABASE


	if(transmitted_value = 1) //Best Sellers
	{
		$sql = "SELECT * FROM Products ORDER BY Sales DESC LIMIT 10";

	}
	else if(transmitted_value = 2) //For You
	{
		
	}
	else { //New Arrivals
		$sql = "SELECT * FROM Products ORDER BY Date_Added DESC LIMIT 50";
	}

	$result = $conn->query($sql);
	$row =	$result->fetch_assoc();
?>

