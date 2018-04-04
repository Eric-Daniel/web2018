<?php
  $title = "Index";
  require_once "./template/header.php";
  require_once "./functions/database_functions.php";
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

            $conn = new db_class();

            $filter = $conn->filter();

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


    });

</script>

<?php
require_once "./template/footer.php";
?>
