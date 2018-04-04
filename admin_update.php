<?php 
session_start();

	require_once "./template/header.php";
	require_once "./functions/database_functions.php";
	$conn = new db_class();
	if(isset($_POST['update'])){
	$title = $_POST['title'];
	$year = $_POST['year'];
	$genre = $_POST['genre'];
	$synopsis = $_POST['synopsis'];
	
//	if(isset($_FILES['image']) && $_FILES['image']['name'] != ""){
//		$image = $_FILES['image']['name'];
//		$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
//		$uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . "bootstrap/img/";
//		$uploadDirectory .= $image;
//		move_uploaded_file($_FILES['image']['tmp_name'], $uploadDirectory);
//	}

	$conn->update();
		
		echo '
			<script>alert("Updated Successfully")</script>;
			<script>window.location = "admin_movie.php"</script>;
		';
	}	
?>
<?php

	require "./template/footer.php"
?>
