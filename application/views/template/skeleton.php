<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php echo $title ?></title>
        <meta name="description" content="<?php echo $description ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="<?php echo $keywords ?>" />
        <meta name="author" content="<?php echo $author ?>" />
        <link rel="shortcut icon" href="img/favicon.png">
        
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="<?php echo base_url(CSS."bootstrap.min.css");?>">
        <link rel="stylesheet" href="<?php echo base_url(ASSETS."font-awesome/css/font-awesome.min.css");?>">
        
    </head>
    <body>
	<?php echo $body ?>
        <!-- js placed at the end of the document so the pages load faster -->
        <script src="<?php echo base_url(JS."jquery-3.1.1.min.js");?>"></script>
        <script src="<?php echo base_url(JS."bootstrap.min.js");?>"></script>
    </body>
</html>
