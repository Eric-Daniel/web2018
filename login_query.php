<?php
require_once 'session.php';
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
     //   $_SESSION['LAST_ACTIVITY'] = $time;
      //  $_SESSION['timeout']=time();
        $username = 'admin';
        $_SESSION["member_id"]		   = $user["member_id"];

        if(!empty($_POST["remember"])) {
            setcookie ("member_login",$_POST["username"],time()+ (10));
            setcookie ("password",$_POST["password"],time()+ (10));
        } else {
            if(isset($_COOKIE["member_login"])) {
                setcookie ("member_login","");
            }
            if(isset($_COOKIE["password"])) {
                setcookie ("password","");
            }
        }

//        setcookie('username',$username,time() + (86400 * 7)); // 86400 = 1 day
//        setcookie('username',$username,time() + (8)); // 86400 = 1 day
//        echo 'Hello '.($_COOKIE['username']!='' ? $_COOKIE['username'] : 'Admin'); // Hello David!
        echo '<script>alert("Successfully login!")</script>';
        echo '<script>window.location = "admin_movie.php"</script>';}
    else{
        echo '<script>alert("Invalid username or password")</script>';
        echo '<script>window.location = "admin.php"</script>';
    }
}
?>