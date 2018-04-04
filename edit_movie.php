
<?php 
	//require_once 'class.php';
//	if(ISSET($_POST['update'])){	
//		$firstname = $_POST['firstname'];
//		$lastname = $_POST['lastname'];
//		$movie_id = $_POST['movie_id'];
//$movie_id = $_REQUEST['movie_id'];				//duplicated
// $fetch = $conn->movie_id($movie_id);			// duplicated
require_once "./functions/database_functions.php";
		$conn = new db_class();
	//	$conn->update($title, $year, $genre, $image, $synopsis);	
//		echo '
//			<script>alert("Updated Successfully")</script>;
//			<script>window.location = "admin_movie.php"</script>; 			
//		';
//	}	
	
	// if save change happen
	if(!isset($_POST['save_change'])){   			//if(!isset($_POST['save_change'])){
		echo "Something wrong!";
		exit;
	}
	if(isset($_POST['save_change'])){	//////////////////////////////////////////////////////////// changed to update
/* $title = ($_POST['title']);
	$year = ($_POST['year']);
	$genre = ($_POST['genre']);
	$synopsis = ($_POST['synopsis']); */
	$title = trim($_POST['title']);
	$year = intval(trim($_POST['year']));
	$genre = trim($_POST['genre']);
	$synopsis = trim($_POST['synopsis']);

	if(isset($_FILES['image']) && $_FILES['image']['name'] != ""){
		$image = $_FILES['image']['name'];
		$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
		$uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . "bootstrap/img/";
		$uploadDirectory .= $image;
		move_uploaded_file($_FILES['image']['tmp_name'], $uploadDirectory);
	}

	
//require_once("./functions/database_functions.php");
//	$conn = db_connect();


//$conn->update($title, $year, $genre, $image, $synopsis, $movie_id);	
$result = $conn->update();

/*	$query = "UPDATE movies SET title='$title',year='$year',genre='$genre',synopsis='$synopsis'";
	if(isset($image)){
		$query .= ", image='$image' WHERE movie_id ='$movie_id'";
	} else {
		$query .= " WHERE movie_id = '$movie_id'";
	}
	// two cases for file , if file submit is on => change a lot
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "Can't update data " . mysqli_error($conn);
		exit;
	} else {
		header("Location: admin_edit.php?movie_id=$movie_id");
	} */
	header("Location: admin_edit.php?movie_id=$movie_id"); }
?>