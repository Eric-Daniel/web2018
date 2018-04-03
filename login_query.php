<?php
session_start();
//require_once 'class.php';
require_once "./functions/database_functions.php";
if(ISSET($_POST['login'])){
    $conn = new db_class();
    $username = $_POST['username'];
    $password = $_POST['password'];
    $get_user = $conn->login($username, $password);

    if($get_user['count'] > 0){
    //    session_start();
        $_SESSION['username'] = $get_user['username'];
      //  $_SESSION['last_time']= time();
     //   $_SESSION["timeout"] = time();
        echo '<script>alert("Successfully login!")</script>';
        echo '<script>window.location = "admin_movie.php"</script>';
    }else{
        echo '<script>alert("Invalid username or password")</script>';
        echo '<script>window.location = "admin.php"</script>';
    }
}
?>