<?php
	include('../private/configMovies.php');

	if (!function_exists("db_connect")) {
		function db_connect() {
			static $conneciton;

			if (!isset($connection)) {
				$connection = mysqli_connect(DBHOST, DBUSER, DBPWD, DBNAME);
			}

			if ($connection === false) {
				die("<p>Sorry, there was a connection issue: " . mysqli_connect_error($connection) . "</p>");
				return $connection;
			}
			return $connection;
		}
	}
?>