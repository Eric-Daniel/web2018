<!---->
<?php
//
//
//session_start();
//$title = "Administration section";
//require_once "./template/header.php";
//require_once "./functions/database_functions.php";
//$db_class = new db_class();
//
//if (isset($_REQUEST['submit'])) {
//    extract($_REQUEST);
//    $login = $db_class->check_login($name, $pass);
//    if ($login) {
//        // Registration Success
//        header("location:admin_movie.php");
//    } else {
//        // Registration Failed
//        echo 'Wrong username or password';
//    }
//}
//
//?>
<!---->
<!--<!--	<form class="" method="post" action="admin_verify.php">         -->-->
<!--<form action="" method="post" name="login">-->
<!--    <div class="form-group">-->
<!--        <label for="name" class="form-control-label col-lg-4">Name</label>-->
<!--        <div class="col-lg-4">-->
<!--            <input type="text" name="name" class="form-control">-->
<!--        </div>-->
<!--    </div>-->
<!--    <div class="form-group">-->
<!--        <label for="pass" class="form-control-label col-lg-4">Pass</label>-->
<!--        <div class="col-lg-4">-->
<!--            <input type="password" name="pass" class="form-control">-->
<!--        </div>-->
<!--    </div>-->
<!--    <input type="submit" name="submit" class="btn btn-primary" value="Login">-->
<!--</form>-->
<!---->
<?php
//	require_once "./template/footer.php";
//?>

<?php
$title = "Administration section";
require_once "./template/header.php";
?>

<form class="" method="post" action="admin_verify.php">
    <div class="form-group">
        <label for="name" class="form-control-label col-lg-4">Name</label>
        <div class="col-lg-4">
            <input type="text" name="name" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label for="pass" class="form-control-label col-lg-4">Pass</label>
        <div class="col-lg-4">
            <input type="password" name="pass" class="form-control">
        </div>
    </div>
    <input type="submit" name="submit" class="btn btn-primary" value="Login">
</form>

<?php
require_once "./template/footer.php";
?>
