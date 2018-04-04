<?php
$title = "Administration section";
require_once "./template/header.php";
?>

<form method = "POST" action = "login_query.php">
    <div class="form-group">
        <input type = "text" placeholder = "Username"  name = "username" class = "form-control" required = "required"/>
    </div>
    <div class="form-group">
        <input type = "password" placeholder = "Password"  name = "password" class = "form-control" required = "required">
    </div>
    <button class = "btn btn-primary pull-left" name = "login"><span class = "glyphicon glyphicon-log-in"></span> Login</button>
    <label class = "pull-right">Don't have an account yet? <a href = "index.php"> Click here</a></label>
</form>

<?php
require_once "./template/footer.php";
?>
