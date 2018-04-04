<?php
session_start();
	$movie_id = $_REQUEST['movie_id'];
	require_once "./functions/database_functions.php";
//	require_once 'class.php';
	$conn = new db_class();
	 $fetch = $conn->movie_id($movie_id);
?>

<html>
<head>
    <script src="validation.js"></script>
</head>
<body>


<div class = "form-group">
	<label>Title</label>
	<input type = "text" name = "title" value = "<?php echo $fetch['title']?>" class = "form-control"  onblur="titleValidation(this.value,event)"/>
	<input type = "hidden" name = "movie_id" value = "<?php echo $movie_id?>" />
</div>
<div class = "form-group">
	<label>Year</label>
	<input type = "text" name = "year" value = "<?php echo $fetch['year']?>" class = "form-control" onblur="yearValidation(this.value,event)"/>
</div>
<div class = "form-group">
	<label>Genre</label>
	<input type = "text" name = "genre" value = "<?php echo $fetch['genre']?>" class = "form-control" onblur="genreValidation(this.value,event)"/>
</div>
<div class = "form-group">
	<label>Image</label>
<!--    <img src="./bootstrap/img/--><?php //echo $fetch['image'];?><!-- ">-->
	<input type = "file" name = "image" value = "<?php echo $fetch['image']?>" class = "form-control" onblur="imageValidation(this.value,event)" id="img" onchange="imageValidation()"/>
</div>
<div class = "form-group">
	<label>Synopsis</label>
	<textarea name="synopsis" cols="40" rows="5" onblur="synopsisValidation(this.value,event)"><?php echo $fetch['synopsis']?></textarea>
</div>




