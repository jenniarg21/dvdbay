<?php
	include_once("phpscripts/startIncludes.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<title>DVDBay || Search</title>
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
			<h2>Search for Movies</h2>
			<form id="form" action="search.php<?php
					if (!empty($_GET['user'])) {
						echo "?user=". $_GET['user'];
					}
					else {
						if (!empty($_GET['adminUser'])) {
							echo "?adminUser=". $_GET['adminUser'];
						}
					}
				?>" method="post">
				<p><input type="text" name="q" />
				
				<input type="submit" name="Submit" value="Search" /></p>
			</form>


	<?php
		include_once("phpscripts/dblogin.php");
		$PHP_SELF = "";
					
		$connection = db_connect();
		if ($connection === false) {
			die("<p>Sorry there was a problem: ". mysqli_connect_error($connection). "</p>");
		}
		else {
			// check for a search parameter
			if (!isset($_POST['q']))
			{
				echo "<p>Please use form above to search for movies.</p>";
			}
			else 
			{
				$var = $_POST['q'];
				$trimmed = trim($var); //trim whitespace from the stored variable
				// rows to return
				$limit=10; 
				// check for an empty string and display a message.
				if ($trimmed == "")
				{
					echo "<p>Please enter a search...</p>";
				}
				else {
					// Build SQL Query  
					$query = "select * from movies where title like \"%$trimmed%\" order by title";
					$numresults = mysqli_query($connection, $query);
					$numrows = mysqli_num_rows($numresults);
					// If we have no results, offer a google search as an alternative
					if ($numrows == 0)
					{
						echo "<h4>Results</h4>";
						echo "<p>Sorry, your search: &quot;" . $trimmed . "&quot; returned zero results</p>";
						// google
						echo "<p><a href=\"http://www.google.com/search?q=" . $trimmed . "\" title=\"Look up " . $trimmed . " on Google\">Click here</a> to try the search on google</p>";
					}

					// next determine if s has been passed to script, if not use 0
					if (empty($s)) {$s = 0;}
					// get results
					$query .= " limit $s,$limit";
					$result = mysqli_query($connection, $query) or die("Couldn't execute query");

					// display what the person searched for
					if ($s >= 2){
						echo "<p>You searched for: &quot;" . $var . "&quot;</p>";
					}


					// begin to show results set

					$count = 1 + $s ;
					$showonce = false;
					// now you can display the results returned
					while ($row = mysqli_fetch_array($result)) {
						if ($showonce == false){
							echo "<h4>Results</h4>";
							$showonce = true;
						}
						$title = $row["title"];
						echo "$count.)&nbsp;<a href=\"index.php?movieId={$row['id']}\">$title</a>";
						echo "<br />";
						$count++;
					}
					$currPage = (($s/$limit) + 1);

					//break before paging
					echo "<br />";

					// next we need to do the links to other results
					if ($s >= 1) { // bypass PREV link if s is 0
						$prevs = ($s - $limit);

								print "&nbsp;<a href=\"$PHP_SELF?s=$prevs&amp;q=$var\">&lt;&lt;
								Prev 10</a>&nbsp&nbsp;";
					}
					// calculate number of pages needing links
					$pages = intval($numrows / $limit);
					// $pages now contains int of pages needed unless there is a remainder from division
					if ($numrows % $limit) {
						// has remainder so add one page
						$pages++;
					}
					// check to see if last page
					if (!((($s + $limit) / $limit) == $pages) && $pages != 1) 
					{
						// not last page so give NEXT link
						$news = $s + $limit;
						if ($s >= 1){
							echo "&nbsp;<a href=\"$PHP_SELF?s=$news&amp;q=$var\">Next 10 &gt;&gt;</a>";
						}
					}
					$a = $s + ($limit) ;
					if ($a > $numrows) { $a = $numrows ; }
					$b = $s + 1 ;
					if ($a >= 2)
					{
						echo "<p>Showing results $b to $a</p>";
					}
					if ($a == 1)
					{
						echo "";
					}
				}
			}
		}
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