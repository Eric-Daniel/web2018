<?php
	session_start();

	require_once "./functions/admin.php";
	$title = "Add new movie";
	require "./template/header.php";
	require "./functions/database_functions.php";

	if(isset($_POST['add'])){

	$title =$_POST['title'];

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



		$conn = new db_class();
		$conn->create($title, $year, $genre, $image, $synopsis);		
		header("Location: admin_movie.php");
		
	}


?>
    <html>
    <head>
        <script src="validation.js"></script>

    </head>
    <body>


	<form name="createForm" form method="post" action="admin_add.php" onsubmit='return validateForm()' enctype="multipart/form-data">
		<table class="table">
			<tr>
				<th>Title</th>
				<td><input type="text" name="title" ></td>
			</tr>
			<tr>
				<th>Year</th>

                <td><input type="text" name="year"></td>
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
		<input type="submit" name="add" value="Add new movie" class="btn btn-primary">
		<input type="reset" value="cancel" class="btn btn-default">
	</form>
	<br/>
<?php

	require_once "./template/footer.php";

?>
