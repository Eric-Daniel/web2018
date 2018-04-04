<?php
require_once "./functions/admin.php";
require "./functions/database_functions.php";

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

?>