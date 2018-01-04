<?php
	$tableCustomersName = "customers";
	
	$error = "";
	$success = false;
	
	if (!empty($_REQUEST["editAccount"])) {
		// checking if all fields have values
		if (empty($_POST["fname"]) || empty($_POST["lname"]) || empty($_POST["email"]) || empty($_POST["password"]) || empty($_POST["address"]) || empty($_POST["city"]) || $_POST["state"] == "notSelected" || empty($_POST["zip"]) || empty($_POST["country"])) {
			$error = "You must enter a value in each field.";
		}
		else {
			// updating account
			$fname = $_POST["fname"];
			$lname = $_POST["lname"];
			$email = $_POST["email"];
			$password = $_POST["password"];
			$address = $_POST["address"];
			$city = $_POST["city"];
			$state = $_POST["state"];
			$zip = $_POST["zip"];
			$country = $_POST["country"];

			$sqlUpdateQuery = "UPDATE $tableCustomersName SET firstName='$fname', lastName='$lname', email='$email', password='$password', address='$address', city='$city', state='$state', zip=$zip, country='$country' WHERE email='$loginCustomer'";
		
			$queryUpdateResult = @mysqli_query($connection, $sqlUpdateQuery);
		
			if ($queryUpdateResult === false) {
				$error = "Sorry, something went wrong. Please try again later.";
			}
			else {
				$success = true;
			}
			mysqli_free_result($queryUpdateResult);
		} //end all fields have values if statement
	} //end user clicked submit button for editing account
?>