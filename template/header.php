<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=no;">
        <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE" />
        <title>
            <?php echo $title; ?>
        </title>
        <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="./bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
        <link href="./bootstrap/css/jumbotron.css" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
        rel="stylesheet" />-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css"
        integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy"
        crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    </head>
    
    <body>
        <nav class="navbar navbar-dark bg-dark fixed-top navbar-expand-md">
            <div class="container">
			<a class="navbar-brand"
                href="index.php">AAA Library Store</a>
                <button type="button" class="collapse navbar-collapse" data-toggle="collapse"
                data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span>
&#x2630;</button> 
                <!--/.navbar-collapse -->
                <div>
                    <ul class="nav navbar-nav ml-auto">
                        <!-- link to admin.php -->
                        <li class="nav-item"><a href="admin.php" class="nav-link"><span class="glyphicon glyphicon-lock"></span>&nbsp; Admin_Login</a>
                        </li>
                        <!-- link to movies.php -->
                        <li class="nav-item"><a href="index.php" class="nav-link"><span class="glyphicon glyphicon-film"></span>&#xA0; Movies</a>
                        </li>
                        <!-- link to contacts.php -->
                        <li class="nav-item"><a href="contact.php" class="nav-link"><span class="glyphicon glyphicon-phone-alt"></span>&#xA0; Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <?php if(isset($title) && $title=="Index" ) { ?>
        <!-- Main call to action -->
        <div>
            <div class="container">
                 <h1>Welcome to online AAA Library Store</h1>
                <p class="lead">Text-Add-On</p>
            </div>
        </div>
        <?php } ?>
        <div class="container" id="main"></div>
    </body>

</html>