<?php
	ob_start();
	session_start();

	$error = "";
	if (isset($_POST["submit"])) {
		if (empty($_POST["username"]) || empty($_POST["password"])) {
			$error = "Please enter all fields.";
		}
		else {
			$username = $_POST["username"];
			$password = $_POST["password"];

			// Establish connection to database

			//Protection from MySQL injection
			//$username = stripslashes($username);
			//$password = stripslashes($password);

			$tableName = "customers";
			$sqlStr = "SELECT * FROM $tableName WHERE email='$username' AND BINARY password='$password'";

			$queryRes = @mysqli_query($connection, $sqlStr);
			if ($queryRes === false) {
				echo "<p>Unable to execute query.</p>";
				echo "<p>Error code: " . mysqli_connect_error($connection) . "</p>";
			}
			else {
				if (($row = mysqli_fetch_assoc($queryRes))) {
					$_SESSION["loginCustomer"] = $username;
					$_SESSION["firstName"] = $row["firstName"];
					$_SESSION["lastName"] = $row["lastName"];
					mysqli_free_result($queryRes);
					header("Location: index.php");
				}
				else {
					$error = "Username/E-mail and password combination is incorrect or username/E-mail does not exist. Please try again or create an account if you haven't.";
				}
			}
		}
	}
?>