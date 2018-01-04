<?php
	include("phpscripts/startIncludes.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<title>DVDBay</title>
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
			<?php
				/* default index view */
				if (!isset($_GET["idCategory"]) && !isset($_GET["movieId"])) {
					if (isset($loginCustomer)) {
						echo "<h2>Hi {$_SESSION['firstName']}!</h2>";
						echo "<p>New DVD's are added everyday, so be sure to keep a look out for any of your favorites.</p>";
					}
					else {
						if (isset($loginAdmin)) {
							echo "<h2>Hi {$_SESSION['firstName']}!</h2>";
							echo "<p>Thank you for being part of the DVDBay team. New features are coming soon to this website that'll make your job a breeze.</p>";
						}
						else {
							echo "<p>Remember to <a href=\"customerLogin.php\">log in</a> or <a href=\"newCustomer.php\">sign up</a> if you haven't already.</p>";
						}
					}
					$sqlCatStr = "SELECT * FROM $tableCategoryName";

					if (($queryCategoriesRes = @mysqli_query($connection, $sqlCatStr)) === false) {
						echo "<p>Unable to execute category query.</p>";
					}
					else {
						while (!is_null($row = mysqli_fetch_assoc($queryCategoriesRes))) {
							echo "<h2><a href=\"index.php?idCategory={$row['id']}\">{$row['categoryName']}</a></h2>";
							// display first five results
							$sqlMovieStr = "SELECT * FROM $tableMoviesName WHERE category LIKE '{$row['categoryName']}' ORDER BY title ASC LIMIT 4";

							if (($queryMoviesRes = @mysqli_query($connection, $sqlMovieStr)) === false) {
								echo "<p>Unable to execute movie query.</p>";
							}
							else {
								echo "<div class=\"movieDisplay\">";
								while (!is_null($rowMovies = mysqli_fetch_assoc($queryMoviesRes))) {
									include("phpscripts/movie.php");
								}
								mysqli_free_result($queryMoviesRes);
								// View All option at end
								echo "<div class=\"movie\">";
								echo "<a href=\"index.php?idCategory={$row['id']}\">View All";
								echo "<div class=\"textOverlay\">View All</div>";
								echo "</a>";
								echo "</div>";
								echo "</div>";
							}
						}
					}
					mysqli_free_result($sqlCatStr);
				}

				/* category content */
				if (isset($_GET["idCategory"])) {
					$idCategory = $_GET["idCategory"];
					
					$sqlCategoryString = "SELECT * FROM $tableCategoryName WHERE id=$idCategory";
				
					if (($queryCategoryResult = @mysqli_query($connection, $sqlCategoryString)) === false) {
						echo "<p>Unable to execute the query.</p>";
					}
					else {
						if ($rowCategory = mysqli_fetch_assoc($queryCategoryResult)) {
							echo "<h2>{$rowCategory['categoryName']}</h2>";
							$sqlMovieString = "SELECT * FROM $tableMoviesName WHERE category LIKE '{$rowCategory['categoryName']}' ORDER BY title";
							if (($queryMovieResult = @mysqli_query($connection, $sqlMovieString)) === false) {
								echo "<p>Unable to execute the query.</p>";
							}
							else {
								if (mysqli_num_rows($queryMovieResult) === 0) {
									echo "<p class=\"errMsg\">Sorry, something went wrong.</p>";
								}
								echo "<div class=\"movieAll\">";
								while (!is_null($rowMovies = mysqli_fetch_assoc($queryMovieResult))) {
									include("phpscripts/movie.php");
								}
								echo "</div>";
							}
						} // end conditional if category query returned result
						mysqli_free_result($queryMovieResult);
						mysqli_free_result($queryCategoryResult);
					}
				} // end conditional for set idCategory

				/* product content */
				if (isset($_GET["movieId"])) {
					$movieId = $_GET["movieId"];
					
					$sqlString = "SELECT * FROM $tableMoviesName WHERE id=$movieId ORDER BY title ASC";
					
					if (($queryResult = @mysqli_query($connection, $sqlString)) === false) {
						echo "<p>Unable to execute query.</p>";
					}
					else { //display product information
						$row = mysqli_fetch_assoc($queryResult);
						echo "<h2>{$row['title']}</h2>";
						echo "<img src=\"assets/{$row['img']}\" alt=\"Movie cover for {$row['title']}\" class=\"image\" />";
						echo "<p><span class=\"bold\">Price:</span> \${$row['price']}<br />";
						echo "<span class=\"bold\">Amount in stock:</span> {$row['qty']}</p>";
						echo "<p><span class=\"bold\">Summary:</span><br />{$row['summary']}</p>";
						mysqli_free_result($queryResult);
					}
				} // end conidtion for set movieId
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