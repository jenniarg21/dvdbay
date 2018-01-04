<?php
	include("phpscripts/startIncludes.php");
	if (isset($_SESSION["loginCustomer"]) || isset($_SESSION["loginAdmin"])) {
		header("Location: index.php");
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<title>DVDBay || New Customer</title>
	<link rel="shortcut icon" type="image/x-icon" href="assets/favicon.ico" />
	<link rel="stylesheet" type="text/css" href="projectStyles.css" />
	<link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet">
</head>

<body>
	<div id="hContainer">
	<?php
		include("phpscripts/header.php");
	?>
	</div>
	<div id="container">
		<div id="mainContent">
			<h2>New Customer</h2>
			<?php
				include("phpscripts/addCustomer.php");

				if ($success) {
					echo "<p>Account successfully created! You can <a href=\"customerLogIn.php\">log in here</a>.</p>";
				}
				else {
					if (!empty($error)) {
						echo "<p class=\"error\">$error</p>";
					}
			?>
			<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="newCustomer">
				<p><label>First Name: </label><input type="text" name="fname" id="fname" size="15" /> 
				<label>Last Name: </label><input type="text" name="lname" id="lname" size="15" /></p>
				<p><label>E-Mail: </label><input type="text" name="email" id="email" size="20" /> 
				<label>Password: </label><input type="text" name="password" id="password" size="15" /></p>
				<p><label>Address: </label><input type="text" name="address" id="address" /> 
				<label>City: </label><input type="text" name="city" id="city" size="15" /></p>
				<p><label>State:</label>
				<select name="state" id="state">
					<option value="notSelected">-Select-</option>
					<option value="Alabama">Alabama</option>
					<option value="Alaska">Alaska</option>
					<option value="Arizona">Arizona</option>
					<option value="Arkansas">Arkansas</option>
					<option value="California">California</option>
					<option value="Colorado">Colorado</option>
					<option value="Connecticut">Connecticut</option>
					<option value="Delaware">Delaware</option>
					<option value="Florida">Florida</option>
					<option value="Georgia">Georgia</option>
					<option value="Hawaii">Hawaii</option>
					<option value="Idaho">Idaho</option>
					<option value="Illinois">Illinois</option>
					<option value="Indiana">Indiana</option>
					<option value="Iowa">Iowa</option>
					<option value="Kansas">Kansas</option>
					<option value="Kentucky">Kentucky</option>
					<option value="Louisiana">Louisiana</option>
					<option value="Maine">Maine</option>
					<option value="Maryland">Maryland</option>
					<option value="Massachusetts">Massachusetts</option>
					<option value="Michigan">Michigan</option>
					<option value="Minnesota">Minnesota</option>
					<option value="Mississippi">Mississippi</option>
					<option value="Missouri">Missouri</option>
					<option value="Montana">Montana</option>
					<option value="Nebraska">Nebraska</option>
					<option value="Nevada">Nevada</option>
					<option value="New Hampshire">New Hampshire</option>
					<option value="New Jersey">New Jersey</option>
					<option value="New Mexico">New Mexico</option>
					<option value="New York">New York</option>
					<option value="North Carolina">North Carolina</option>
					<option value="North Dakota">North Dakota</option>
					<option value="Ohio">Ohio</option>
					<option value="Oklahoma">Oklahoma</option>
					<option value="Oregon">Oregon</option>
					<option value="Pennsylvania">Pennsylvania</option>
					<option value="Rhode Island">Rhode Island</option>
					<option value="South Carolina">South Carolina</option>
					<option value="South Dakota">South Dakota</option>
					<option value="Tennessee">Tennessee</option>
					<option value="Texas">Texas</option>
					<option value="Utah">Utah</option>
					<option value="Vermont">Vermont</option>
					<option value="Virginia">Virginia</option>
					<option value="Washington">Washington</option>
					<option value="West Virginia">West Virginia</option>
					<option value="Wisconsin">Wisconsin</option>
					<option value="Wyoming">Wyoming</option>
				</select> 
				<label>Zip: </label><input type="text" name="zip" id="zip" size="7" /></p>
				<p><label>Country: </label><input type="text" name="country" id="country" /></p>
				<div>
					<input type="button" name="cancel" id="cancel" onclick="window.location.replace('index.php')" value="Cancel" />
					<input type="submit" name="newAccount" id="newAccount" value="Create New Account" />
				</div>
			</form>
			<?php
				} // end conditionally if creating new account
			?>
		</div> <!-- end main content container div -->
	</div> <!-- end container div -->
	<div id="fContainer" class="clear">
	<?php
		include("phpscripts/footer.php");
	?>
	</div> <!-- end footer container div -->
</body>
</html>