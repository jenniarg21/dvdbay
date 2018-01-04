<?php
	include("phpscripts/startIncludes.php");
	if (!isset($_SESSION["loginAdmin"])) {
		header("Location: index.php");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<title>DVDBay || Add Movie</title>
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
			<h2>Add Product</h2>
			<?php
				include_once("phpscripts/dblogin.php");
				
				$connection = db_connect();

				if (isset($_POST['Submit'])){
					if (empty($_POST['title']) || empty($_POST['price']) || empty($_POST['cat']) || empty($_POST['summary']) || empty($_POST['qty']) || empty($_POST['img']) || !isset($_POST['title']) || !isset($_POST['price']) || !isset($_POST['cat']) || !isset($_POST['summary']) || !isset($_POST['qty']) || !isset($_POST['img'])) {
						echo "<p class=\"error\">Please fill out all fields.</p>";
					}
					else {
						$title = $_POST['title'];
						$price = $_POST['price'];
						$genre = $_POST['cat'];
						$summary = $_POST['summary'];
						$qty = $_POST['qty'];
						$img = $_POST['img'];

						$sql = "INSERT INTO movies(title, price, category, summary, img, qty) VALUES('" . addslashes($title) . "','$price','$genre','" . addslashes($summary) . "','$img','$qty')";
						if (!mysqli_query($connection, $sql)){
							echo "<p>Sorry, something went wrong. Please try again later.</p>";
						}
						else {
							echo "<p class=\"success\">Record added!</p>";
							$_POST = array();
							mysqli_free_result($queryResult);
						}
					}
				}
			?>
			<p>Use the form below to add a new DVD.</p>
		
			<form id="addMovie" action="addProduct.php" method="post">
				<p>
					Movie Title: <input type="text" name="title" <?php if (isset($_POST['title'])) { echo "value=\"{$_POST['title']}\""; } ?> />
					Price: <input type="text" name="price" size="5" <?php if (isset($_POST['price'])) { echo "value=\"{$_POST['price']}\""; } ?> />
				</p>
				<p>
					Category:<br />
					<input type="radio" name="cat" value="action" /> action<br />
					<input type="radio" name="cat" value="adventure" /> adventure <br />
					<input type="radio" name="cat" value="comedy" /> comedy<br />
					<input type="radio" name="cat" value="drama" /> drama
				</p>
				<p>
					Summary:<br/>
					<textarea rows="5" cols="35" name="summary"><?php
							if (isset($_POST['summary'])) {
								echo $_POST['summary'];
							}
						?></textarea>
				</p>
				<p>
					Quantity: <input type="text" name="qty" size="5" <?php if (isset($_POST['qty'])) { echo "value=\"{$_POST['qty']}\""; } ?> />
				</p>
				<p>
					Image URL: <input type="text" name="img" <?php if (isset($_POST['img'])) { echo "value=\"{$_POST['img']}\""; } else { echo "value=\"noImg.jpg\""; } ?> /><br />
					<span class="italic">Note:  If movie image has not been uploaded to the database yet, leave image file as "noImg.jpg"</span>
				</p>
				<div>
					<input type="button" name="cancel" id="cancel" onclick="window.location.replace('index.php')" value="Cancel" />
					<input type="submit" name="Submit" value="Submit" />
				</div>
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