<?php
require_once 'session.php';

	require_once "./functions/admin.php";
	$title = "List Movie";
	require_once "./template/header.php";
	require_once "./functions/database_functions.php";

?>

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

<button onclick="myFunction()">Reload page/Back</button>

<script>
    function myFunction() {
        location.reload();
    }
</script>

<div class="page-header">
    <h3>
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
    </h3>
</div>

<div class="page-header">
    <h3>
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
    </h3>
</div>



<body>
<div class="container">
    <br>
    <h2 align="center">Test Ajax LS</h2>
    <br>
    <div class="form-group">
        <div class="input-group"> <span class="input-group-addon">Search</span>
            <input type="text" name="search_text"
                   id="search_text" placeholder="Search By Title, Year or Genre" class="col-6">

            <select id="year">
                <option value="" selected="selected">Select Year</option>
                <?php

                $conn = new db_class();

                $filter = $conn->filter();

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
