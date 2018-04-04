<?php
require_once 'session.php';
//session_start();
//$time = $_SERVER['REQUEST_TIME'];

///**
// * for a 30 minute timeout, specified in seconds
// */
//$timeout_duration = 10;

	//session_start();
    // set time-out period (in seconds)
    //$inactive = 3;
	require_once "./functions/admin.php";
	$title = "List Movie";
	require_once "./template/header.php";
	require_once "./functions/database_functions.php";

//	$conn = db_connect();
//	$result = getAll($conn);

//
//if(isset($_SESSION['last-activity']) && time() - $_SESSION['last-activity'] > 6) {
//    // session inactive more than 10 min
//    header('location:admin_signout.php?timeout=1');
//}
//
//$_SESSION['last-activity'] = time(); // update last activity time stamp




//timeout failed!
//    if((time() - $_SESSION['last_time']) > 6) // Time in Seconds
//    {
//        header("location:admin_signout.php");
//    }
//
//
//
//$_SESSION['last_time']= time();
///**
// * Here we look for the user's LAST_ACTIVITY timestamp. If
// * it's set and indicates our $timeout_duration has passed,
// * blow away any previous $_SESSION data and start a new one.
// */
//if (isset($_SESSION['LAST_ACTIVITY']) &&
//    ($time - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) {
//    session_unset();
//    session_destroy();
//    session_start();
//    header("location:admin.php");
//}
//
///**
// * Finally, update LAST_ACTIVITY so that our timeout
// * is based on it and not the user's login time.
// */
//$_SESSION['LAST_ACTIVITY'] = $time;

//// check to see if $_SESSION["timeout"] is set
//if (isset($_SESSION["timeout"])) {
//    // calculate the session's "time to live"
//    $sessionTTL = time() - $_SESSION["timeout"];
//    if ($sessionTTL > $inactive) {
//        session_destroy();
//        header("Location: admin.php");
//    }
//}
//
//$_SESSION["timeout"] = time();

//if(isset($_SESSION['username']))
//{
//    if((time() - $_SESSION['last_time']) > 3)
//    {
//        echo"<script>alert('Login Session Expire!');
//            window.location.href = 'admin.php';
//            </script>";
//        header("location:admin_signout.php");
//    }
//    else
//    {
//        $_SESSION['last_time'] = time();
//    }
//}
?>

				
<!--<marquee direction="right"><b>Testing_Mode!!!</marquee>-->
<div class="container-fluid">
    <section class="row">
	<div class="col-md-8">
        </div>
        <div class="col-md-4">
            <div class="btn-group float-right mt-2" role="group">
                <a  href="admin_signout.php" class="btn btn-primary btn-md" href="#">
                    <i aria-hidden="true"></i> Logout </a>
            </div>
        </div>
    </section>
</div>


  
  <p  style="text-align:right" class="lead"><a  href="admin_add.php" class="btn btn-primary btn-md" href="#">
                    <i class="fa fa-plus" aria-hidden="true"></i> Add New Movie </a></p>
					
<body>
    <div class="container">
        <br>
         <h2 align="center">Test Ajax LS</h2>
        <br>
        <div class="form-group">
            <div class="input-group"> <span class="input-group-addon">Search</span>
                <input type="text" name="search_text"
                id="search_text" placeholder="Search By Title, Year or Genre" class="col-6">
                <select id="filter_movie">
                    <option value="title">Title</option>
                    <option value="year">Year</option>
                    <option value="genre">Genre</option>

                </select>
            </div>
        </div>
        <br>
        <div id="result" style="position:absolute;background-color:powderblue;"></div>
    </div>
</body>
					

	<table class="table" style="margin-top: 20px">
		<tr>
			<th>Title</th>
			<th>Year</th>
			<th>Genre</th>
			<!--<th>Image</th> -->
			<th>Description</th>
			<th>&nbsp;</th> 
			<th>&nbsp;</th>
		</tr>
		<?php /*while($row = mysqli_fetch_assoc($result)){ */?>
		<?php
				//	require 'class.php';
					$conn = new db_class();
					$read = $conn->read();
					while($fetch = $read->fetch_array()){ 
				?>
		<tr>
			<td><?php echo $fetch['title']; ?></td>
			<td><?php echo $fetch['year']; ?></td>
			<td><?php echo $fetch['genre']; ?></td>
			<td><img src="./bootstrap/img/<?php echo $fetch['image'];?> "> <br> <?php echo $fetch['synopsis']; ?> </td> <!-- able display larger image above desc-->
			<td><a href="admin_edit.php?movie_id=<?php echo $fetch['movie_id']; ?>">Edit</a></td>
			<!--	<td><a href="admin_delete.php?movie_id=<?php echo $fetch['movie_id']; ?>">Delete</a></td>	-->
			<td><center><a class = "btn btn-warning update_movie_id" data-toggle = "modal" data-target = "#update_modal" name = "<?php echo $fetch['movie_id']?>"><span class = "glyphicon glyphicon-edit"></span> Update</a> | <a class = "btn btn-danger delete_movie_id" name = "<?php echo $fetch['movie_id']?>" data-toggle = "modal" data-target="#del_modal"><span class = "glyphicon glyphicon-trash"></span> Delete</a></center></td>
		</tr>
		<?php } ?>
	</table>
	<!-- Modal -->
<div class="modal fade" id="del_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
		<center><h4 class = "text-danger">Are you sure you want to delete this record?</h4></center>
      </div>
      <div class="modal-footer">
        <button type = "button" class="btn btn-warning" data-dismiss="modal"><span class = "glyphicon glyphicon-remove"></span> No</button>
        <button type = "button" class="btn btn-danger del_movie"><span class = "glyphicon glyphicon-trash"></span> Yes</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="update_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
		<div class = "modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h3 class = "text-success modal-title">Update Movie</h3>
		</div>
		<form method = "POST" action = "admin_update.php">
<!--		<form name="createForm" method = "POST" action = "admin_update.php" onsubmit='return validateForm()'>-->
		<div class="modal-body update">
			
      </div>
      <div class="modal-footer">
        <button class="btn btn-warning" name = "update"><span class = "glyphicon glyphicon-edit"></span> Save Changes</button>
      </div>
	  </form>
    </div>
  </div>
</div>


    <script src="validation.js"></script>

	<script>
	$(document).ready(function(){

        function load_data(query)
{
 $.ajax({
  url:"fetch.php",
  method:"POST",
  data:{query:query},
  success:function(data)
  {
   $('#result').html(data);
  }
 });
}
// var myRegExp = new RegExp("Greatest");
 $("#search_text").keyup(function(){
   //  var myRegExp = new RegExp($('#search_text').val().trim());
     var values = "";
    // $filter = $('#filter_movie').find(':selected').text();
    // console.log($filter);
     if($('#search_text').val() == "" || $('#search_text').val() == " ")
     {
        $("#result").css("display","none");
     }
   else
     {
        $("#result").css("display","block");
        load_data($('#search_text').val());
     }
 });
		
		//Delete
		$('.delete_movie_id').on('click', function(){
			$movie_id = $(this).attr('name');
			$('.del_movie').on('click', function(){
				window.location = "admin_delete.php?movie_id=" + $movie_id;
			});
		});
		
		//Update
		$('.update_movie_id').on('click', function(){
			$movie_id = $(this).attr('name');
			$('.update').load('update_movie_form.php?movie_id=' + $movie_id);
		});
	});
</script>
<!--
<script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"fetch.php",     //  url:"fetch.php",   //halt temporarily
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>				-->

<?php
//	if(isset($conn)) {mysqli_close($conn);}
	require_once "./template/footer.php";
?>
