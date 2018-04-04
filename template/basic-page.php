<?php namespace ProcessWire; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $page->title; ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

    <?php
    // get the templates directory path
    $templateDirectory = $config->urls->templates;
    ?>
    <link rel="stylesheet" href="<?php echo $templateDirectory; ?>styles/main.css">

    <?php
    // get the url of the current pages featured image
    // i.e. current page->fieldname->path to image
    $pageFeaturedImage = $page->featuredImage->url;
    ?>
    <style type="text/css">
        .bg-cover {
            background-image: url('<?php echo $pageFeaturedImage; ?>');
        }
    </style>

</head>

<body class="<?php echo $page->template->name; ?>">
<div class="jumbotron jumbotron bg-cover">
    <div class="overlay"></div>
    <div class="container">
        <h1 class="display-3 mb-1"><?php echo $page->title; ?></h1>

        <?php
        // get a unix timestamp ($page->created) and $format
        // day (single digit - j) month (month name - F) year (four digit - Y)
        // and pass into $datetime->date() method
      //  $dateCreated = $datetime->date($format = 'j F Y', $page->created);
        ?>

        <p class="lead">Posted on <span><?php echo $dateCreated; ?></span></p>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <?php echo $page->myBodyContent; ?>
        </div>
    </div>
</div>
</body>

</html>