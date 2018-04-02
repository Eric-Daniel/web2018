<?php 
session_start();
//	require_once 'class.php';
	require_once "./template/header.php";
	require_once "./functions/database_functions.php";
	$conn = new db_class();
	if(isset($_POST['update'])){
	$title = $_POST['title'];
	$year = $_POST['year'];
	$genre = $_POST['genre'];
	$synopsis = $_POST['synopsis'];
	
	if(isset($_FILES['image']) && $_FILES['image']['name'] != ""){
		$image = $_FILES['image']['name'];
		$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
		$uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . "bootstrap/img/";
		$uploadDirectory .= $image;
		move_uploaded_file($_FILES['image']['tmp_name'], $uploadDirectory);
	}
	
	//	$conn = new db_class();

	$conn->update();
		
		echo '
			<script>alert("Updated Successfully")</script>;
			<script>window.location = "admin_movie.php"</script>;
		';
	}	
?>
<?php
//	if(isset($conn)) {mysqli_close($conn);}
	require "./template/footer.php"
?>


<?php
/*
	require_once("db.php");
	if (isset($_POST['submit'])) {		
		$sql = $conn->prepare("UPDATE tbl_emp_details SET department=? , name=? , email=?  WHERE id=?");
		$department=$_POST['department'];
		$name = $_POST['name'];
		$email= $_POST['email'];
		$sql->bind_param("sssi",$department, $name, $email,$_GET["id"]);	
		if($sql->execute()) {
			$success_message = "Edited Successfully";
		} else {
			$error_message = "Problem in Editing Record";
		}

	}
	$sql = $conn->prepare("SELECT * FROM tbl_emp_details WHERE id=?");
	$sql->bind_param("i",$_GET["id"]);			
	$sql->execute();
	$result = $sql->get_result();
	if ($result->num_rows > 0) {		
		$row = $result->fetch_assoc();
	}
	$conn->close();
	//$stmt = $this->conn->prepare("UPDATE movies SET title=?,year=?,genre=?, image=?, synopsis=? WHERE movie_id=?") or die($this->conn->error);			*/
?>