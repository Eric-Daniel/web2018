<?php
	require_once "./functions/database_functions.php";
	
	$movie_id = $_REQUEST['movie_id'];
	$conn = new db_class();
	$conn->delete($movie_id);
	header("Location: admin_movie.php");
?>


