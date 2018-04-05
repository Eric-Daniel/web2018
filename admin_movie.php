<?php
require_once 'session.php';

	require_once "./functions/admin.php";
	$title = "List Movie";
	require_once "./template/header.php";
	require_once "./functions/database_functions.php";


//$expiry = 10 ;//session expiry required after 30 mins
//if (isset($_SESSION['LAST']) && (time() - $_SESSION['LAST'] > $expiry)) {
//    session_unset();
//    session_destroy();
//}
//$_SESSION['LAST'] = time();
//$time = $_SERVER['REQUEST_TIME'];
//
///**
// * for a 30 minute timeout, specified in seconds
// */
//$timeout_duration = 5;
//
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
//}
//
///**
// * Finally, update LAST_ACTIVITY so that our timeout
// * is based on it and not the user's login time.
// */
//$_SESSION['LAST_ACTIVITY'] = $time;
//
//$inactive = 6;
//$session_life = time() - $_SESSION['timeout'];
//if($session_life > $inactive) {
//    session_destroy();
//    header("Location: admin.php");
//}
//$_SESSION['timeout']=time();
//echo 'Hello '.($_COOKIE['username']!='' ? $_COOKIE['username'] : 'Admin'); // Hello David!

















//                    if (!isset($_SESSION['username'])) {
//                        echo "Please Login again";
//                        echo "<a href=admin.php'>Click Here to Login</a>";
//                    }
//                    else {
//                        $now = time(); // Checking the time now when home page starts.
//
//                        if ($now > $_SESSION['expire']) {
//                            session_destroy();
//                            echo "Your session has expired! <a admin.php'>Login here</a>";
//                            header("Location: admin.php");
//                        }
//                        else { //Starting this else one [else1]
//                            ?>
<!--                            <!-- From here all HTML coding can be done -->-->
<!--                            <html>-->
<!--                            Welcome-->
<!--                            --><?php
//                            echo $_SESSION['username'];
//                            echo "<a href='admin_signout.php'>Log out</a>";
//                            ?>
<!--                            </html>-->
<!--                            --><?php
//                        }
//                    }

?>
<?php
//setcookie('CookieEnabledTest', 'check', time()+3600);
//?>
<!--    <script type="text/javascript">-->
<!---->
<!--        CookieCheck();-->
<!---->
<!--        function CookieCheck()-->
<!--        {-->
<!--            $.post-->
<!--            (-->
<!--                'ajax.php',-->
<!--                {-->
<!--                    cmd: 'cookieCheck'-->
<!--                },-->
<!--                function (returned_data, status)-->
<!--                {-->
<!--                    if (status === "success")-->
<!--                    {-->
<!--                        if (returned_data === "enabled")-->
<!--                        {-->
<!--                            alert ("Cookies are activated.");-->
<!--                        }-->
<!--                        else-->
<!--                        {-->
<!--                            alert ("Cookies are not activated.");-->
<!--                        }-->
<!--                    }-->
<!--                }-->
<!--            );-->
<!--        }-->
<!---->
<!--        $cmd = filter_input(INPUT_POST, "cmd");-->
<!---->
<!--        if ( isset( $cmd ) && $cmd == "cookieCheck" )-->
<!--        {-->
<!--            echo (isset($_COOKIE['CookieEnabledTest']) && $_COOKIE['CookieEnabledTest']=='check') ? 'enabled' : 'disabled';-->
<!--        }-->
<!--    </script>-->















<!--                --><?php
//                if(!isset($_SESSION['pageload']))
//                {
//                    $_SESSION['pageload'] = 1;
//                }
//                else
//                {
//                    echo "USER TIMEOUT.";
//                }
//
//                if(!isset($_COOKIE['SomeThing']))
//                {
//                    echo "USER TIMEOUT.";
//                }
//                else
//                {
//                    $value = "some value";
//                    setcookie("SomeThing", $value, time()+180);
//                }
//                ?>

<div style="float: left; background-color:#71746c; width:100%">
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
  <br>
  <p  style="text-align:right" class="lead"><a  href="admin_add.php" class="btn btn-primary btn-md" href="#">
                    <i class="fa fa-plus" aria-hidden="true"></i> Add New Movie </a></p>
<div class="container">
    <h5><button onclick="myFunction()">Reload page/Back</button></h5>
    <script>
        function myFunction() {
            location.reload();
        }
    </script>
<div class="row">
    <div class="col-sm-6">
        <div class="dropdown">
            <h5>
                <select id="year">
                    <option value="" selected="selected">Select Year</option>
                    <?php

                    $conn = new db_class();

                    $filter = $conn->filter();
                    //           ($stmt = $conn->query("$query"));
                    while($fetch = $filter->fetch_array()){
                        ?>
                        <option value=<?php echo $fetch['year']; ?>><?php echo $fetch['year']; ?></option>
                    <?php }	?>
                    }
                </select>
                <select id="genre">
                    <option value="" selected="selected">Select Genre</option>
                    <?php
                    $conn = new db_class();

                    $filter = $conn->filterGenre();

                    while($fetch = $filter->fetch_array()){
                        ?>
                        <option value=<?php echo $fetch['genre']; ?>><?php echo $fetch['genre']; ?></option>
                    <?php }	?>
                    }
                </select>
            </h5>
        </div>
    </div>
</div>
<div class="container">
    <br>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">SEARCH</span>
        </div>
        <input type="text" name="search_text" id="search_text" class="form-control" placeholder="Search By Title, Year or Genre" aria-label="SEARCH" aria-describedby="basic-addon1">
    </div>
    <div class="form-group">
    <div id="result" style="position:absolute;background-color:#c5faff;"></div>
</div>
</div>
    </body>
    <div style=background-color:white;">
	<table class="table" style="margin-top: 20px">
		<tr style=background-color:#5df9d5;">
			<th>Title</th>
			<th>Year</th>
			<th>Genre</th>
			<th>Description</th>
			<th>&nbsp;</th> 
			<th>&nbsp;</th>
		</tr>
		<?php ?>
		<?php
					$conn = new db_class();
					$read = $conn->read();
					while($fetch = $read->fetch_array()){ 
				?>
		<tr>
			<td><?php echo $fetch['title']; ?></td>
			<td><?php echo $fetch['year']; ?></td>
			<td><?php echo $fetch['genre']; ?></td>
			<td><img src="./bootstrap/img/<?php echo $fetch['image'];?> "> <br> <?php echo $fetch['synopsis']; ?> </td> <!-- able display larger image above desc-->
			<td><center><a class = "btn btn-warning update_movie_id" data-toggle = "modal" data-target = "#update_modal" name = "<?php echo $fetch['movie_id']?>"><span class = "glyphicon glyphicon-edit"></span> Update</a> | <a class = "btn btn-danger delete_movie_id" name = "<?php echo $fetch['movie_id']?>" data-toggle = "modal" data-target="#del_modal"><span class = "glyphicon glyphicon-trash"></span> Delete</a></center></td>
		</tr>
		<?php } ?>
    </table> </div>
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

</div>

    <script src="validation.js"></script>

	<script>
	$(document).ready(function(){
        $("#year").change(function(){
            var year_selected = $('#year').find(":selected").text();
            console.log(year_selected);
            if($.isNumeric(year_selected))
            {
                find_movie_by_year(year_selected);
            }
            else
            {
                $("#result").html('');
            }
        });


        function find_movie_by_year(year_selected)
        {
            $.ajax({
                url:"fetch.php",
                method:"POST",
                data:{query:year_selected},
                success:function(data)
                {
                    $('#result').html(data);
                }
            });
        }

        $("#genre").change(function(){
            var genre_selected = $('#genre').find(":selected").text();
            console.log(genre_selected);
            if($(genre_selected)) // if($.isNumeric(genre_selected))
            {
                find_movie_by_genre(genre_selected);
            }
            else
            {
                $("#result").html('');
            }
        });

        function find_movie_by_genre(genre_selected) //pass in yearSelected para
        {
            $.ajax({
                url:"fetch.php",
                method:"POST",
                data:{query:genre_selected}, //pass in year_selected para
                success:function(data)
                {
                    $('#result').html(data);
                }
            });
        }

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
        $("#search_text").keyup(function(){

            var values = "";

            if($('#search_text').val() == "" || $('#search_text').val() == " ")
            {
                $("#result").html('');
            }
            else
            {
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

<?php

	require_once "./template/footer.php";
?>