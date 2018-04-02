<?php
session_start();
	$movie_id = $_REQUEST['movie_id'];
	require_once "./functions/database_functions.php";
//	require_once 'class.php';
	$conn = new db_class();
	 $fetch = $conn->movie_id($movie_id);
?>
<div class = "form-group">
	<label>Title</label>
	<input type = "text" name = "title" value = "<?php echo $fetch['title']?>" class = "form-control" />
	<input type = "hidden" name = "movie_id" value = "<?php echo $movie_id?>" />
</div>
<div class = "form-group">
	<label>Year</label>
	<input type = "text" name = "year" value = "<?php echo $fetch['year']?>" class = "form-control" />
</div>	
<div class = "form-group">
	<label>Genre</label>
	<input type = "text" name = "genre" value = "<?php echo $fetch['genre']?>" class = "form-control" />
</div>	 
<div class = "form-group">
	<label>Image</label>
	<input type = "file" name = "image" value = "<?php echo $fetch['image']?>" class = "form-control" />
</div>	 
<div class = "form-group">
	<label>Synopsis</label>
	<textarea name="synopsis" cols="40" rows="5"></textarea>
</div>	



