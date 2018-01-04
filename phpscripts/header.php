<?php			
				$connection = db_connect();

				$tableMoviesName = "movies";
				$tableCategoryName = "categories";

				$sqlCatStr = "SELECT * FROM $tableCategoryName";
				if (($queryCategoriesRes = @mysqli_query($connection, $sqlCatStr)) === false) {
					echo "<p>Unable to execute category query.</p>";
				}
				else {
?>
			<h1><a href="index.php">DVDBay</a></h1>
			<div id="mainNav">
				<div class="dropdown">
					<p class="ddLabel">Categories</p>
					<div class="ddContent">
			<?php

					while ($row = mysqli_fetch_assoc($queryCategoriesRes)) {
							echo "<a href=\"index.php?idCategory={$row['id']}\">{$row['categoryName']}</a>";
					}
					mysqli_free_result($queryCategoriesRes);
				} // end else for successful query
			?>
					</div>
				</div>
				<div class="dropdown">
					<p class="ddLabel">Account</p>
					<div class="ddContent">
			<?php
						if (isset($loginCustomer) && !isset($loginAdmin)) {
							echo "<a href=\"editAccount.php\">Edit Account</a>";
							echo "<a href=\"phpscripts/logout.php\">Log Out</a>";
						}
						else {
							if (isset($loginAdmin)) {
							echo "<a href=\"addProduct.php\">Add Product</a>";
							echo "<a href=\"phpscripts/logout.php\">Log Out</a>";
							}
							else {
								echo "<a href=\"newCustomer.php\">Create Account</a>";
								echo "<a href=\"customerLogIn.php\">Login</a>";
								echo "<a href=\"adminLogIn.php\">Admin Login</a>";
							}
						}
			?>
					</div>
				</div>
				<div class="dropdown">
					<p class="ddLabel"><a href="search.php">Search</a></p>
				</div>
			</div>