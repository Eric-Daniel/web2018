<?php
session_start();
if(!isset($_POST['submit'])){
    echo "Something wrong! Check again!";
    exit;
}

///
/// ///
///
$name = trim($_POST['name']);
$pass = trim($_POST['pass']);

if($name == "" || $pass == ""){
    $_SESSION['admin'] = true;
    header("Location: admin_movie.php");
}

/*
require_once "./functions/database_functions.php";
$conn = db_connect();

$name = trim($_POST['name']);
$pass = trim($_POST['pass']);

if($name == "" || $pass == ""){
    echo "Name or Pass is empty!";
    echo $pass;
    exit;
}

$name = mysqli_real_escape_string($conn, $name);
$pass = mysqli_real_escape_string($conn, $pass);
$pass = md5($pass);

// get from db
$query = "SELECT name, pass from admin";
$result = mysqli_query($conn, $query);
if(!$result){
    echo "Empty data " . mysqli_error($conn);
    exit;
}
$row = mysqli_fetch_assoc($result);

if($name != $row['name'] && $pass != $row['pass']){
    echo "Name or pass is wrong. Check again!";
    $_SESSION['admin'] = false;
    exit;
}
//if($name == $row['name'] && $pass == $row['pass']){
//			echo "Welcome admin! Long time no see";
//			break;
//		}
if(isset($conn)) {mysqli_close($conn);}
echo '<script>alert("Correct User Details")$pass</script>';
$_SESSION['admin'] = true;
header("Location: admin_movie.php");                */
?>