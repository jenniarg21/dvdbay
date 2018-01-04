<?php
	if ($rowMovies['img'] == "noImg.jpg") {
		echo "<div class=\"movie noImg\">";
	}
	else {
		echo "<div class=\"movie\">";
	}
	echo "<a href=\"index.php?movieId={$rowMovies['id']}\"><img src=\"assets/{$rowMovies['img']}\" alt=\"{$rowMovies['title']}\"/>";
	echo "<div class=\"textOverlay\"><h3>{$rowMovies['title']}</h3><p><span class=\"bold\">Price: </span>{$rowMovies['price']}</p></div>";
	echo "</a>";
	echo "</div>";
?>