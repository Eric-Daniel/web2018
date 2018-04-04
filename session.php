<?php
session_start();
if(!($_SESSION['username'])){
    header('location:admin.php');
}
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

$time = $_SERVER['REQUEST_TIME'];

/**
 * for a 30 minute timeout, specified in seconds
 */
$timeout_duration = 5;

/**
 * Here we look for the user's LAST_ACTIVITY timestamp. If
 * it's set and indicates our $timeout_duration has passed,
 * blow away any previous $_SESSION data and start a new one.
 */
if (isset($_SESSION['LAST_ACTIVITY']) &&
    ($time - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) {
    session_unset();
    session_destroy();
    session_start();
}

/**
 * Finally, update LAST_ACTIVITY so that our timeout
 * is based on it and not the user's login time.
 */
$_SESSION['LAST_ACTIVITY'] = $time;
?>