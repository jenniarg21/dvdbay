<!-- Footer movie categories links nav content -->
		<div class="footer">
			<h3>Movie Categories</h3>
			<ul>
			<?php
				if (($queryCategoriesRes = @mysqli_query($connection, $sqlCatStr)) === false) {
					echo "<p>Unable to execute category query.</p>";
				}
				else {
					while ($row = mysqli_fetch_assoc($queryCategoriesRes)) {
						echo "<li><a href=\"index.php?idCategory={$row['id']}\">{$row['categoryName']}</a></li>";
					}
					mysqli_free_result($queryCategoriesRes);
				}
				mysqli_close($connection);
			?>
			</ul>
		</div>
<!-- Footer account links nav content -->
		<div class="footer">
			<h3>Account Links</h3>
			<ul>
			<?php
				if (isset($loginCustomer) && !isset($loginAdmin)) {	
				// Logged on Customer
					echo "<li><a href=\"editAccount.php\">Edit Account Info</a></li>";
					echo "<li><a href=\"phpscripts/logout.php\">Log Out</a></li>";
				}
				else {
					if (isset($loginAdmin)) {
						// Logged on Admin
						echo "<li><a href=\"addProduct.php\">Add Products</a></li>";
						echo "<li><a href=\"phpscripts/logout.php\">Log Out</a></li>";
					}
					else {	
						// Default
						echo "<li><a href=\"newCustomer.php\">Create Account</a></li>";
						echo "<li><a href=\"customerLogIn.php\">Login</a></li>";
						echo "<li><a href=\"adminLogIn.php\">Admin Login</a></li>";
					}
				}
			?>
			</ul>
		</div>