<?php
require "config.php";

$conn = new db_connect();
$conn->connect();

$output = '';
$search = $conn->escape_string($_POST["query"]);
if(isset($_POST["year_selected"]))
{
    $year_selected = $conn->escape_string($_POST["year_selected"]);
    $query = "
    SELECT * FROM movies 
    WHERE year LIKE '%".$year_selected."%' AND genre LIKE '%".$genre_selected."%' 
   ";
}
else if(isset($_POST["genre_selected"]))
{
    $year_selected = $conn->escape_string($_POST["genre_selected"]);
    $query = "
    SELECT * FROM movies 
    WHERE genre LIKE '%".$genre_selected."%' AND year LIKE '%".$year_selected."%' 
   ";
}
else if(isset($_POST["query"]))
{
    $query = "
   SELECT * FROM movies 
   WHERE title LIKE '%".$search."%'
   OR year LIKE '%".$search."%' 
   OR genre LIKE '%".$search."%' 
  ";

}
else
{
    $query = "
  SELECT * FROM movies ORDER BY movie_id;
 ";
}

$result =$conn->db_query($query);

if($result->num_rows > 0)
{
    $output .= '
   <table class="table table bordered">
    <tr>
     <th>Title</th>
     <th>Year</th>
     <th>Genre</th>
     <th>Synopsis</th>
    </tr>
 ';
    while($row = $result->fetch_assoc())
    {
        $output .= '
   <tr>
    <td>'.$row["title"].'</td>
    <td>'.$row["year"].'</td>
    <td>'.$row["genre"].'</td>
    <td><img src="./bootstrap/img/'.$row["image"].'" height="268" width="182" <br> <br>'.$row["synopsis"].'</td>
    <td class="btn btn-space"><center><a class = "btn btn-primary update_movie_id" data-toggle = "modal" data-target = "#update_modal" name = "<?php echo $fetch[\'movie_id\']?>"><i class="fa fa-edit"></i> Update</a> | <a class = "btn btn-danger delete_movie_id" name = "<?php echo $fetch[\'movie_id\']?>" data-toggle = "modal" data-target="#del_modal"><i class="fa fa-trash"></i> Delete</a></center></td>
   </tr>
  ';
    }
    echo $output;
}
else
{
    echo 'Data Not Found';
}

?>