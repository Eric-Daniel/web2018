<?php
//session_start();
require_once "./functions/admin.php";
require "./functions/database_functions.php";

//if(isset($_POST['submit'])) {
//    $username = $_POST['name'];
//    $password = ($_POST['pass']);
//    $conn = new db_class();
//    $login = $conn->login($name,$pass);
//}

if (isset($_REQUEST['submit'])) {
    extract($_REQUEST);
    $conn = new db_class();
    $login = $conn->login($name, $pass);
    if ($login) {
        // Registration Success
        $_SESSION['name'] = $name;
        header("Location: admin_movie.php");
       // header("location:home.php");
    } else {
        // Registration Failed
        echo 'Wrong username or password';
    }
}
//if(!isset($_POST['submit'])){
//    echo "Something wrong! Check again!";
//    exit;
//}

///
/// ///
///
//$name = trim($_POST['name']);
//$pass = trim($_POST['pass']);
//
//if($name == "" || $pass == ""){
//    $_SESSION['admin'] = true;
//    header("Location: admin_movie.php");
//}

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