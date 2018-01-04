<?php
	require_once('dblogin.php');

	$connection = db_connect();

	session_start();

	if (isset($_SESSION["loginCustomer"])) {
		$userCheck = $_SESSION["loginCustomer"];
		$tableCustomersName = "customers";
	

		$sqlCustomersStr = "SELECT * FROM $tableCustomersName WHERE email='$userCheck'";
		$queryRes = mysqli_query($connection, $sqlCustomersStr);
		if (($row = mysqli_fetch_assoc($queryRes))) {
			$loginCustomer = $row['email'];
		}
		mysqli_free_result($queryRes);
	}
	else {
		if (isset($_SESSION["loginAdmin"])) {
			$adminCheck = $_SESSION["loginAdmin"];
			$tableAdminsName = "administrators";
			$sqlAdminsStr = "SELECT * FROM $tableAdminsName WHERE username='$adminCheck'";

			$queryRes = mysqli_query($connection, $sqlAdminsStr);
			if (($row = mysqli_fetch_assoc($queryRes))) {
				$loginAdmin = $row['username'];
			}
			mysqli_free_result($queryRes);
		}
	}
?>