<?php
	include("phpscripts/startIncludes.php");
	if (!isset($_SESSION["loginCustomer"])) {
		header("Location: index.php");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<title>DVDBay || Edit Account</title>
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
			<?php
				$tableCustomersName = "customers";

				include("phpscripts/updateAccount.php");
				
				$sqlUserQuery = "SELECT * FROM $tableCustomersName WHERE email='$loginCustomer'";
				
				$queryUserResult = @mysqli_query($connection, $sqlUserQuery);
				
				if ($queryUserResult === false) {
					echo "<p>Unable to execute the query.</p>";
				}
				else {
					$row = mysqli_fetch_assoc($queryUserResult);
					if ($success) {
						echo "<h2>Account Updated</h2>";
						echo "<p><span class=\"bold\">First Name:</span> {$row['firstName']}</p>";
						echo "<p><span class=\"bold\">Last Name:</span> {$row['lastName']}</p>";
						echo "<p><span class=\"bold\">Email:</span> {$row['email']}</p>";
						echo "<p><span class=\"bold\">Address:</span> {$row['address']}</p>";
						echo "<p><span class=\"bold\">City:</span> {$row['city']}</p>";
						echo "<p><span class=\"bold\">State:</span> {$row['state']}</p>";
						echo "<p><span class=\"bold\">Zip:</span> {$row['zip']}</p>";
						echo "<p><span class=\"bold\">Country:</span> {$row['country']}</p>";
					}
					else {
			?>
		
			<h2>Edit Account</h2>
			<?php
						if (!empty($error)) {
							echo "<p class=\"error\">$error</p>";
						}
			?>
			<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" id="editCustomer">
				<p>
				<label>First Name: </label><input type="text" name="fname" id="fname" value="<?php echo $row["firstName"];?>" size="15" />
				<label>Last Name: </label><input type="text" name="lname" id="lname" value="<?php echo $row["lastName"]; ?>" size="15" />
				</p>
				<p>
				<label>E-Mail: </label><input type="text" name="email" id="email" value="<?php echo $row["email"]; ?>" size="15" />
				<label>Password: </label><input type="password" name="password" id="password" value="<?php echo $row["password"]; ?>" size="15" />
				</p>
				<p>
				<label>Address: </label><input type="text" name="address" id="address" value="<?php echo $row["address"];?>" />
				<label>City: </label><input type="text" name="city" id="city" value="<?php echo $row["city"]; ?>" size="10" />
				</p>
				<p>
				<label>State: </label>
				<select name="state" id="state">
					<option value="notSelected">-Select-</option>
					<option value="Alabama" <?php $value="Alabama"; if ($value == $row["state"]) {echo "selected=\"selected\"";} ?>>Alabama</option>
					<option value="Alaska" <?php $value="Alaska"; if ($value == $row["state"]) {echo "selected=\"selected\"";} ?>>Alaska</option>
					<option value="Arizona" <?php $value="Arizona"; if ($value == $row["state"]) {echo "selected=\"selected\"";} ?>>Arizona</option>
					<option value="Arkansas" <?php $value="Arkansas"; if ($value == $row["state"]) {echo "selected=\"selected\"";} ?>>Arkansas</option>
					<option value="California" <?php $value="California"; if ($value == $row["state"]) {echo "selected=\"selected\"";} ?>>California</option>
					<option value="Colorado" <?php $value="Colorado"; if ($value == $row["state"]) {echo "selected=\"selected\"";} ?>>Colorado</option>
					<option value="Connecticut" <?php $value="Connecticut"; if ($value == $row["state"]) {echo "selected=\"selected\"";} ?>>Connecticut</option>
					<option value="Delaware" <?php $value="Delaware"; if ($value == $row["state"]) {echo "selected=\"selected\"";} ?>>Delaware</option>
					<option value="Florida" <?php $value="Florida"; if ($value == $row["state"]) {echo "selected=\"selected\"";} ?>>Florida</option>
					<option value="Georgia" <?php $value="Georgia"; if ($value == $row["state"]) {echo "selected=\"selected\"";} ?>>Georgia</option>
					<option value="Hawaii" <?php $value="Hawaii"; if ($value == $row["state"]) {echo "selected=\"selected\"";} ?>>Hawaii</option>
					<option value="Idaho" <?php $value="Idaho"; if ($value == $row["state"]) {echo "selected=\"selected\"";} ?>>Idaho</option>
					<option value="Illinois" <?php $value="Illinois"; if ($value == $row["state"]) {echo "selected=\"selected\"";} ?>>Illinois</option>
					<option value="Indiana" <?php $value="Indiana"; if ($value == $row["state"]) {echo "selected=\"selected\"";} ?>>Indiana</option>
					<option value="Iowa" <?php $value="Iowa"; if ($value == $row["state"]) {echo "selected=\"selected\"";} ?>>Iowa</option>
					<option value="Kansas" <?php $value="Kansas"; if ($value == $row["state"]) {echo "selected=\"selected\"";} ?>>Kansas</option>
					<option value="Kentucky" <?php $value="Kentucky"; if ($value == $row["state"]) {echo "selected=\"selected\"";} ?>>Kentucky</option>
					<option value="Louisiana" <?php $value="Louisiana"; if ($value == $row["state"]) {echo "selected=\"selected\"";} ?>>Louisiana</option>
					<option value="Maine" <?php $value="Maine"; if ($value == $row["state"]) {echo "selected=\"selected\"";} ?>>Maine</option>
					<option value="Maryland" <?php $value="Maryland"; if ($value == $row["state"]) {echo "selected=\"selected\"";} ?>>Maryland</option>
					<option value="Massachusetts" <?php $value="Massachusetts"; if ($value == $row["state"]) {echo "selected=\"selected\"";} ?>>Massachusetts</option>
					<option value="Michigan" <?php $value="Michigan"; if ($value == $row["state"]) {echo "selected=\"selected\"";} ?>>Michigan</option>
					<option value="Minnesota" <?php $value="Minnesota"; if ($value == $row["state"]) {echo "selected=\"selected\"";} ?>>Minnesota</option>
					<option value="Mississippi" <?php $value="Mississippi"; if ($value == $row["state"]) {echo "selected=\"selected\"";} ?>>Mississippi</option>
					<option value="Missouri" <?php $value="Missouri"; if ($value == $row["state"]) {echo "selected=\"selected\"";} ?>>Missouri</option>
					<option value="Montana" <?php $value="Montana"; if ($value == $row["state"]) {echo "selected=\"selected\"";} ?>>Montana</option>
					<option value="Nebraska" <?php $value="Nebraska"; if ($value == $row["state"]) {echo "selected=\"selected\"";} ?>>Nebraska</option>
					<option value="Nevada" <?php $value="Nevada"; if ($value == $row["state"]) {echo "selected=\"selected\"";} ?>>Nevada</option>
					<option value="New Hampshire" <?php $value="New Hampshire"; if ($value == $row["state"]) {echo "selected=\"selected\"";} ?>>New Hampshire</option>
					<option value="New Jersey" <?php $value="New Jersey"; if ($value == $row["state"]) {echo "selected=\"selected\"";} ?>>New Jersey</option>
					<option value="New Mexico" <?php $value="New Mexico"; if ($value == $row["state"]) {echo "selected=\"selected\"";} ?>>New Mexico</option>
					<option value="New York" <?php $value="New York"; if ($value == $row["state"]) {echo "selected=\"selected\"";} ?>>New York</option>
					<option value="North Carolina" <?php $value="North Carolina"; if ($value == $row["state"]) {echo "selected=\"selected\"";} ?>>North Carolina</option>
					<option value="North Dakota" <?php $value="North Dakota"; if ($value == $row["state"]) {echo "selected=\"selected\"";} ?>>North Dakota</option>
					<option value="Ohio" <?php $value="Ohio"; if ($value == $row["state"]) {echo "selected=\"selected\"";} ?>>Ohio</option>
					<option value="Oklahoma" <?php $value="Oklahoma"; if ($value == $row["state"]) {echo "selected=\"selected\"";} ?>>Oklahoma</option>
					<option value="Oregon" <?php $value="Oregon"; if ($value == $row["state"]) {echo "selected=\"selected\"";} ?>>Oregon</option>
					<option value="Pennsylvania" <?php $value="Pennsylvania"; if ($value == $row["state"]) {echo "selected=\"selected\"";} ?>>Pennsylvania</option>
					<option value="Rhode Island" <?php $value="Rhode Island"; if ($value == $row["state"]) {echo "selected=\"selected\"";} ?>>Rhode Island</option>
					<option value="South Carolina" <?php $value="South Carolina"; if ($value == $row["state"]) {echo "selected=\"selected\"";} ?>>South Carolina</option>
					<option value="South Dakota" <?php $value="South Dakota"; if ($value == $row["state"]) {echo "selected=\"selected\"";} ?>>South Dakota</option>
					<option value="Tennessee" <?php $value="Tennessee"; if ($value == $row["state"]) {echo "selected=\"selected\"";} ?>>Tennessee</option>
					<option value="Texas" <?php $value="Texas"; if ($value == $row["state"]) {echo "selected=\"selected\"";} ?>>Texas</option>
					<option value="Utah" <?php $value="Utah"; if ($value == $row["state"]) {echo "selected=\"selected\"";} ?>>Utah</option>
					<option value="Vermont" <?php $value="Vermont"; if ($value == $row["state"]) {echo "selected=\"selected\"";} ?>>Vermont</option>
					<option value="Virginia" <?php $value="Virginia"; if ($value == $row["state"]) {echo "selected=\"selected\"";} ?>>Virginia</option>
					<option value="Washington" <?php $value="Washington"; if ($value == $row["state"]) {echo "selected=\"selected\"";} ?>>Washington</option>
					<option value="West Virginia" <?php $value="West Virginia"; if ($value == $row["state"]) {echo "selected=\"selected\"";} ?>>West Virginia</option>
					<option value="Wisconsin" <?php $value="Wisconsin"; if ($value == $row["state"]) {echo "selected=\"selected\"";} ?>>Wisconsin</option>
					<option value="Wyoming" <?php $value="Wyoming"; if ($value == $row["state"]) {echo "selected=\"selected\"";} ?>>Wyoming</option>
				</select>
				<label>Zip: </label><input type="text" name="zip" id="zip" value="<?php echo $row["zip"]; ?>" size="7" />
				</p>
				<p>
				<label>Country: </label><input type="text" name="country" id="country" value="<?php echo $row["country"]; ?>" size="15" />
				</p>
				<div>
					<input type="button" name="cancel" id="cancel" onclick="window.location.replace('index.php')" value="Cancel" />
					<input type="submit" name="editAccount" id="editAccount" value="Edit Account" />
				</div>
				<?php
						}
						mysqli_free_result($queryUserResult);
					}
				?>
			</form>
		</div> <!-- end main content container div -->
	</div> <!-- end container div -->
	<div id="fContainer" class="clear">
	<?php
		include("phpscripts/footer.php");
	?>
	</div> <!-- end footer container div -->
</body>
</html>