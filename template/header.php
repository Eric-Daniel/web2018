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
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">
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
                        <li class="nav-item"><a href="admin.php" class="nav-link"><i class="fa fa-lock"></i>&nbsp; Admin_Login</a>
                        </li>
                        <!-- link to movies.php -->
                        <li class="nav-item"><a href="index.php" class="nav-link"><i class="fa fa-home"></i>&#xA0; Home</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <?php if(isset($title) && $title=="Index" ) { ?>
        <!-- Main call to action -->
            <div style="float: left; background-color:#71746c; width:100%">
            <div class="container">
               <marquee><h1 style="font-family: 'Tangerine', serif;
        font-size: 70px; width:100%">Welcome to online AAA Library Store</h1></marquee>
                <br>
            </div>
        </div>
        <?php } ?>
        <div class="container" id="main"></div>
    </body>

</html>