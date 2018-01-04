<?php
	include("phpscripts/startIncludes.php");

	// if user is logged in, redirect to homepage
	if (isset($_SESSION["loginAdmin"]) || isset($_SESSION["loginCustomer"])) {
		header("Location: index.php");
	}

	$connection = db_connect();

	include('phpscripts/login.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<title>DVDBay || Customer Login</title>
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
	<div id="container" class="clear">
		<div id="mainContent">
			<h2>Customer Login</h2>
			<?php
				if (!empty($error)) {
					echo "<p class=\"error\">$error</p>";
				}
			?>
				<form method="post" action=<?php echo "\"{$_SERVER['PHP_SELF']}\""; ?>>
					<p>
						Username/E-mail: <input type="text" name="username" id="username" value=<?php echo "\"{$_POST['username']}\""; ?> />
					</p>
					<p>
						Password: <input type="password" name="password" id="password" />
					</p>
					<p>
						<input type="submit" name="submit" id="submit" value="Log In" />
					</p>
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