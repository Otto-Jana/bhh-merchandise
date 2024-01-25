<?php

	$host = "localhost";
	$username = "root";
	$password = "040BeruflicheHochschule";
	$dbname = "merchandise_shop";
	$InputName = $_POST["name"];

	 // Create connection
	$conn = mysqli_connect(hostname: $host, username: $username, password: $password, database: $dbname);
	if(!$conn)
	{
	die("Connection Error:" . mysqli_connect_error());
	}
	echo "Connection Succsess!";
	
	$sql = "SELECT * FROM test_table WHERE Vorname = '$InputName'";
	$result = $conn->query($sql);
	/*$stmt = mysqli_stmt_init($conn);
	if ( ! mysqli_stmt_prepare($stmt, $sql) ) {
		die(mysqli_error($conn));
	}
	mysqli_stmt_bind_param($stmt, "s", $InputName);
	$result = mysqli_stmt_execute($stmt); */
	$row =	$result->fetch_assoc();
	print_r("Vorname: " . $row["Vorname"] . " Nachname: " . $row["Nachname"] . " Adresse: " . $row["Adresse"] . " Alter: " . $row["Nutzer_Alter"]);
?>

