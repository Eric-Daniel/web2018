<?php
	//require_once 'class.php';
	require_once "./functions/database_functions.php";
	
	$movie_id = $_REQUEST['movie_id'];
	$conn = new db_class();
	$conn->delete($movie_id);
//header('location:index.php');
header("Location: admin_movie.php");
?>


<?php
/*	$movie_id = $_GET['movie_id'];

	require_once "./functions/database_functions.php";
	$conn = db_connect();

	$query = "DELETE FROM movies WHERE movie_id = '$movie_id'";
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "delete data unsuccessfully " . mysqli_error($conn);
		exit;
	}
	header("Location: admin_movie.php");	*/
?>

