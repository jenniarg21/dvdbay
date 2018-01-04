<?php
	$error = "";
	$success = false;
	if (isset($_REQUEST["newAccount"])) {
		if(!isset($_POST["fname"]) || !isset($_POST["lname"]) || !isset($_POST["email"]) || !isset($_POST["password"]) || !isset($_POST["address"]) || !isset($_POST["city"]) || $_POST["state"] == "notSelected" || !isset($_POST["zip"]) || !isset($_POST["country"]) || empty($_POST["fname"]) || empty($_POST["lname"]) || empty($_POST["email"]) || empty($_POST["password"]) || empty($_POST["address"]) || empty($_POST["city"]) || $_POST["state"] == "notSelected" || empty($_POST["zip"]) || empty($_POST["country"])) {
			$error = "You must enter a value in each field.";
		}
		else {
			$fname = $_POST["fname"];
			$lname = $_POST["lname"];
			$email = $_POST["email"];
			$pswd = $_POST["password"];
			$address = $_POST["address"];
			$city = $_POST["city"];
			$state = $_POST["state"];
			$zip = $_POST["zip"];
			$country = $_POST["country"];
			
			//code to add new customer to database
			$connection = db_connect();
			
			$tableCustomersName = "customers";
			$sqlCustomersQuery = "INSERT INTO $tableCustomersName (firstName, lastName, email, password, address, city, state, zip, country) VALUES('$fname', '$lname', '$email', '$pswd', '$address', '$city', '$state', $zip, '$country')";
			
			$queryCustomersResult = @mysqli_query($connection, $sqlCustomersQuery);
			if ($queryCustomersResult === false) {
				$error = "Sorry, there was an error in creating the new account. Please try again later.";
			}
			else {
				$success = true;
			}
		} // end conditional if all fields entered
	} // end conditional if request was sent
?>