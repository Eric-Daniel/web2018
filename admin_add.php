<?php
/*	require_once 'class.php';
	
	if(ISSET($_POST['save'])){	
		$firstname = $_POST['firstname'];
		$lastname  = $_POST['lastname'];
		$conn = new db_class();
		$conn->create($firstname, $lastname);
		//header('location: index.php');
	}	
	*/
?>
<?php
	session_start();
  //  $_SESSION['username'] = true;
	require_once "./functions/admin.php";
	$title = "Add new movie";
	require "./template/header.php";
	require "./functions/database_functions.php";
	//require "validation.js";
//	$conn = db_connect();

	if(isset($_POST['add'])){
	//	$title = trim($_POST['title']);
	//	$title = mysqli_real_escape_string($conn, $_POST['title']);
	$title =$_POST['title'];
		
	//	$year = intval($_POST['year']);
	//	$year = mysqli_real_escape_string($conn, $_POST['year']);
	//$year = mysqli_real_escape_string($conn, $year);
	$year = $_POST['year'];
		
	//	$genre = trim($_POST['genre']);
	//	$genre = mysqli_real_escape_string($conn, $_POST['genre']);
	$genre = $_POST['genre'];
		
	//	$synopsis = trim($_POST['synopsis']);
	//	$synopsis = mysqli_real_escape_string($conn, $_POST['synopsis']);
	$synopsis = $_POST['synopsis'];
		
		
		
		// add image
		if(isset($_FILES['image']) && $_FILES['image']['name'] != ""){
			$image = $_FILES['image']['name'];
			$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
			$uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . "bootstrap/img/";
			$uploadDirectory .= $image;
			move_uploaded_file($_FILES['image']['tmp_name'], $uploadDirectory);
		}


//$query = "INSERT INTO movies VALUES('" . $title . "',  . $year . , '" . $genre . "', '" . $image . "', '" . $synopsis . "')";

/*

		echo "INSERT INTO movies(title,year,genre,image,synopsis) VALUES('$title','$year','$genre','$image','$synopsis')";
		$result = mysqli_query($conn, "INSERT INTO movies(title,year,genre,image,synopsis) VALUES('$title','$year','$genre','$image','$synopsis')");

		//$query = "INSERT INTO movies VALUES("$title",'$year',"$genre","$image","$synopsis")";
//		$query = "INSERT INTO movies VALUES('".$title."','.$year.','".$genre."','".$image."','".$synopsis."')";
		//$query = mysqli_query("INSERT INTO movies VALUES ('$title', $year, '$genre', '$image', '$synopsis')");
//		$result = mysqli_query($conn, $query);
		if(!$result){
			echo "Can't add new data " . mysqli_error($conn);
			exit;
		} else {
			//display success message
        //echo "<font color='green'>Data added successfully.";
			header("Location: admin_movie.php");
		}
		
*/		
		$conn = new db_class();
		$conn->create($title, $year, $genre, $image, $synopsis);		
		header("Location: admin_movie.php");
		
	}


?>
    <html>
    <head>
        <script src="validation.js"></script>
<!--        <script>-->
<!--            function validateForm() {-->
<!--                var x = document.forms["createForm"]["title"].value;-->
<!--                if (x == "") {-->
<!--                    alert("Title must be filled out");-->
<!--                    return false;-->
<!--                }-->
<!--            }-->
<!--        </script>-->
<!--        <script type="text/javascript">-->
<!--            function validateForm()-->
<!--            {-->
<!--                var title=document.forms["createForm"]["title"].value;-->
<!---->
<!--                if (title==null )-->
<!--                {-->
<!--                    alert("Please Fill All Required Field");-->
<!--                    return false;-->
<!--                }-->
<!--            }-->
<!--        </script>-->
    </head>
    <body>


	<form name="createForm" form method="post" action="admin_add.php" onsubmit='return validateForm()' enctype="multipart/form-data">
		<table class="table">
			<tr>
				<th>Title</th>
				<td><input type="text" name="title"></td>
			</tr>
			<tr>
				<th>Year</th>
				<td><input type="text" name="year"  onblur="yearValidation(this.value,event)"
                           onkeypress="yearValidation(this.value,event)"></td>
			</tr>
			<tr>
				<th>Genre</th>
				<td><input type="text" name="genre"></td>
			</tr>
			<tr>
				<th>Image</th>
				<td><input type="file" name="image" id="img" onchange="imageValidation()"></td>
			</tr>
			<tr>
				<th>Synopsis</th>
				<td><textarea name="synopsis" cols="40" rows="5"></textarea></td>
			</tr>
			
		</table>
		<input type="submit" name="add" value="Add new book" class="btn btn-primary">
		<input type="reset" value="cancel" class="btn btn-default">
	</form>
	<br/>
<?php
	//if(isset($conn)) {mysqli_close($conn);}
	require_once "./template/footer.php";
	//header("Location: admin_movie.php");
?>