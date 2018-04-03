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
?>