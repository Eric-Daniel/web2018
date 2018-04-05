<?php 
	session_start();
	require_once "./template/header.php";
	require_once "./functions/database_functions.php";
	$conn = new db_class();
	if(isset($_POST['update'])){
	$title = trim($_POST['title']);
	$year = intval(trim($_POST['year']));
	$genre = trim($_POST['genre']);
	$synopsis = trim($_POST['synopsis']);

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
