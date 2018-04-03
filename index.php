


<?php
 
  // connection database
  
  $title = "Index";
  require_once "./template/header.php";
  require_once "./functions/database_functions.php";
  //require_once "./template/header.php";

  
  /* $conn = new db_class();
					$read = $conn->read();
					while($fetch = $read->fetch_array()){  */
  
?>

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
 //           $query = "SELECT DISTINCT year FROM movies";
//            $resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
//            while( $rows = mysqli_fetch_assoc($resultset) ) {
            $conn = new db_class();
   //         $read = $conn->filter();
            $filter = $conn->filter();
 //           ($stmt = $conn->query("$query"));
            while($fetch = $filter->fetch_array()){
//                ?>
                <option value=<?php echo $fetch['year']; ?>><?php echo $fetch['year']; ?></option>
            <?php }	?>
            }
        </select>
    </h3>
</div>
<!--<div id="display">-->
<!--    <div class="row" id="heading" style="display:none;"><h3><div class="col-sm-4"><strong>Employee Name</strong></div><div class="col-sm-4"><strong>Age</strong></div><div class="col-sm-4"><strong>Salary</strong></div></h3></div><br>-->
<!--    <div class="row" id="records"><div class="col-sm-4" id="emp_name"></div><div class="col-sm-4" id="emp_age"></div><div class="col-sm-4" id="emp_salary"></div></div>-->
<!--    <div class="row" id="no_records"><div class="col-sm-4">Plese select year to view details</div></div>-->
<!--</div>-->

<div class="page-header">
    <h3>
        <select id="genre">
            <option value="" selected="selected">Select Genre</option>
            <?php
            //           $query = "SELECT DISTINCT year FROM movies";
            //            $resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
            //            while( $rows = mysqli_fetch_assoc($resultset) ) {
            $conn = new db_class();
            //         $read = $conn->filter();
            $filter = $conn->filterGenre();
            //           ($stmt = $conn->query("$query"));
            while($fetch = $filter->fetch_array()){
//                ?>
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
<!--            <select id="filter_movie">-->
<!--                <option value="title">Title</option>-->
<!--                <option value="year">Year</option>-->
<!--                <option value="genre">Genre</option>-->
<!---->
<!--            </select>-->
            <select id="year">
                <option value="" selected="selected">Select Year</option>
                <?php
                //           $query = "SELECT DISTINCT year FROM movies";
                //            $resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
                //            while( $rows = mysqli_fetch_assoc($resultset) ) {
                $conn = new db_class();
                //         $read = $conn->filter();
                $filter = $conn->filter();
                //           ($stmt = $conn->query("$query"));
                while($fetch = $filter->fetch_array()){
//                ?>
                    <option value=<?php echo $fetch['year']; ?>><?php echo $fetch['year']; ?></option>
                <?php }	?>
                }
            </select>
            <select id="genre">
                <option value="" selected="selected">Select Genre</option>
                <?php
                //           $query = "SELECT DISTINCT year FROM movies";
                //            $resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
                //            while( $rows = mysqli_fetch_assoc($resultset) ) {
                $conn = new db_class();
                //         $read = $conn->filter();
                $filter = $conn->filterGenre();
                //           ($stmt = $conn->query("$query"));
                while($fetch = $filter->fetch_array()){
//                ?>
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
        </tr>
    <?php } ?>
</table>



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
// var myRegExp = new RegExp("Greatest");
        $("#search_text").keyup(function(){
            //  var myRegExp = new RegExp($('#search_text').val().trim());
            var values = "";
            // $filter = $('#filter_movie').find(':selected').text();
            // console.log($filter);
            if($('#search_text').val() == "" || $('#search_text').val() == " ")
            {
                $("#result").html('');
            }
            else
            {
                load_data($('#search_text').val());
            }
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
