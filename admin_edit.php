<!---->
<?php
//	session_start();
//$movie_id = $_REQUEST['movie_id'];
////	require_once "./functions/admin.php";
//	$title = "Edit Movie";
//	require_once "./template/header.php";
//	require_once "./functions/database_functions.php";
////	$conn = db_connect();
//$conn = new db_class();
//
// $fetch = $conn->movie_id($movie_id);
//	/*
//	if(isset($_POST['save_change']))
//{
//    $title = $_POST['title'];
//    $year=$_POST['year'];
//    $genre=$_POST['genre'];
//    $image=$_POST['image'];
//	$synopsis=$_POST['synopsis'];
//
//
//        //updating the table
//        $result = mysqli_query($conn, "UPDATE movies SET title='$title',year='$year',genre='$genre',image='$image',synopsis='$synopsis' WHERE movie_id=$movie_id");
//
//        //redirectig to the display page. In this case, it is index.php
//       // header("Location: index.php");
//
//}*/
///*
//if(isset($_GET['movie_id'])){
//		$movie_id = $_GET['movie_id'];
//	} else {
//		echo "Empty query!";
//		exit;
//	}
//
//	if(!isset($movie_id)){
//		echo "Empty movie_id! check again!";
//		exit;
//	}
//
//	// get movie data
//	$query = "SELECT * FROM movies WHERE movie_id = '$movie_id'";
//	$result = mysqli_query($conn, $query);
//	if(!$result){
//		echo "Can't retrieve data " . mysqli_error($conn);
//		exit;
//	}
//	$row = mysqli_fetch_assoc($result);				*/
//?>
<!---->
<?php///*
////getting id from url
//$movie_id = $_GET['movie_id'];
//
////selecting data associated with this particular id
//$result = mysqli_query($conn, "SELECT * FROM movies WHERE movie_id=$movie_id");
//
//while($res = mysqli_fetch_array($result))
//{
//	$title =$_res['title'];
//	$year = $_res['year'];
//	$genre = $_res['genre'];
//	$image = $_res['image'];
//	$synopsis = $_res['synopsis'];
//}*/
//?>


<?php
//session_start();
////	require_once 'class.php';
//require_once "./template/header.php";
//require_once "./functions/database_functions.php";
//$conn = new db_class();
//if(isset($_POST['update'])){
//    $title = $_POST['title'];
//    $year = $_POST['year'];
//    $genre = $_POST['genre'];
//    $synopsis = $_POST['synopsis'];
//
//    if(isset($_FILES['image']) && $_FILES['image']['name'] != ""){
//        $image = $_FILES['image']['name'];
//        $directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
//        $uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . "bootstrap/img/";
//        $uploadDirectory .= $image;
//        move_uploaded_file($_FILES['image']['tmp_name'], $uploadDirectory);
//    }
//
//    //	$conn = new db_class();
//
//    $conn->update();
//
//    echo '
//			<script>alert("Updated Successfully")</script>;
//			<script>window.location = "admin_movie.php"</script>;
//		';
//}
//?>

<?php
session_start();
$movie_id = $_REQUEST['movie_id'];
require_once "./functions/database_functions.php";
//	require_once 'class.php';
$conn = new db_class();
$fetch = $conn->movie_id($movie_id);
?>

	<form method="post" action="edit_movie.php" enctype="multipart/form-data">
		<table class="table">
			<tr>
				<th>Title</th>
				<td><input type="text" name="title" required></td>
			</tr>
			<tr>
				<th>Year</th>
				<td><input type="text" name="year" required></td>
			</tr>
			<tr>
				<th>Genre</th>
				<td><input type="text" name="genre" required></td>
			</tr>
			<tr>
				<th>Image</th>
				<td><input type="file" name="image"></td>
			</tr>
			<tr>
				<th>Synopsis</th>
				<td><textarea name="synopsis" cols="40" rows="5"></textarea></td>
			</tr>
		</table>
		<input type="submit" name="save_change" value="Change" class="btn btn-primary">				<!--<input type="submit" name="save_change" value="Change" class="btn btn-primary">  -->
		<input type="reset" value="cancel" class="btn btn-default">
	</form>
	<br/>
	<a href="admin_movie.php" class="btn btn-success">Confirm</a>
<?php
//	if(isset($conn)) {mysqli_close($conn);}
	require "./template/footer.php"
?>