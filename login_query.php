<?php
require_once 'session.php';
require_once "./functions/database_functions.php";
if(ISSET($_POST['login'])){
    $conn = new db_class();
    $username = $_POST['username'];
    $password = $_POST['password'];
    $get_user = $conn->login($username, $password);

    if($get_user['count'] > 0){

        $_SESSION['username'] = $get_user['username'];

        $username = 'admin';
        $_SESSION["username"]= $get_user["username"];

        if(!empty($_POST["remember"])) {
            setcookie ("member_login",$_POST["username"],time()+ (30));
            setcookie ("password",$_POST["password"],time()+ (30));
        } else {
            if(isset($_COOKIE["member_login"])) {
                setcookie ("member_login","");
            }
            if(isset($_COOKIE["password"])) {
                setcookie ("password","");
            }
        }

//        echo 'Hello '.($_COOKIE['username']!='' ? $_COOKIE['username'] : 'Admin');
        echo '<script>alert("Successfully login!")</script>';
        echo '<script>window.location = "admin_movie.php"</script>';}
    else{
        echo '<script>alert("Invalid username or password")</script>';
        echo '<script>window.location = "admin.php"</script>';
    }
}
?>