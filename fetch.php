
<?php
/*

$arr = array();
if (!empty($_POST['keywords'])) {
 $keywords = $this->conn->real_escape_string($_POST['keywords']);
 $sql = "SELECT ID, post_title FROM wp_posts WHERE post_content LIKE '%".$keywords."%' AND post_status = 'publish'";
 $result = $this->conn->query($sql) or die($mysqli->error);
 if ($result->num_rows > 0) {
 while ($obj = $result->fetch_object()) {
 $arr[] = array('id' => $obj->ID, 'title' => $obj->post_title);
 }
 }
}
echo json_encode($arr);
*/
?>
<?php
require "config.php";
//require "./functions/database_functions.php";

$conn = new db_connect();
$conn->connect();


//fetch.php
//$connect = mysqli_connect("localhost", "root", "", "amlsdb");
$output = '';
$search = $conn->escape_string($_POST["query"]);
if(isset($_POST["year_selected"]))
{
    $year_selected = $conn->escape_string($_POST["year_selected"]);
    $query = "
    SELECT * FROM movies 
    WHERE year LIKE '%".$year_selected."%' 
   ";
}
else if(isset($_POST["genre_selected"]))
{
    $year_selected = $conn->escape_string($_POST["genre_selected"]);
    $query = "
    SELECT * FROM movies 
    WHERE genre LIKE '%".$genre_selected."%' 
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
//$result = mysqli_query($conn, $query);
$result =$conn->db_query($query);
//print $result->num_rows;
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
    <td><img src="./bootstrap/img/'.$row["image"].'" <br> <br>'.$row["synopsis"].'</td>
   </tr>
  ';
    }
    echo $output;
}
else
{
    echo 'Data Not Found';
}
//<img src="./bootstrap/img/
?>