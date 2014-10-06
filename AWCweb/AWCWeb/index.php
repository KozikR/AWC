<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AWC</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<body>
<nav id="myNavbar" class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">AWC</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="http://www.tutorialrepublic.com" target="_blank">Home</a></li>
                <li><a href="http://www.tutorialrepublic.com/about-us.php" target="_blank">Settings</a></li>
                <li><a href="http://www.tutorialrepublic.com/about-us.php" target="_blank">About</a></li>
                <li><a href="http://www.tutorialrepublic.com/contact-us.php" target="_blank">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container-fluid">
    <div class="jumbotron">
        <div class="row" >
            <div class="col-sm-1 col-md-1 col-lg-1">Status</div>
            <div sclass="col-sm-1 col-md-1 col-lg-1">Watering</div>
            <div class="col-sm-1 col-md-1 col-lg-1">Total water consumption</div>
            <div class="col-sm-1 col-md-1 col-lg-1">Temperature</div>
        </div>
    </div>
    <div class="row">
        <?php for($i = 0; $i < 12; $i++){ ?>
        <div class="col-sm-6 col-md-4 col-lg-4">
            <h2>HTML</h2>
            <p>HTML is a markup language that is used for creating web pages. The HTML tutorial section will help you understand the basics of HTML, so that you can create your own web pages or website.</p>
            <p><a href="http://www.tutorialrepublic.com/html-tutorial/" target="_blank" class="btn btn-success">Learn More &raquo;</a></p>
        </div>
        <?php } ?>
    </div>
    <hr>
    <div class="row">
        <div class="col-xs-12">
            <footer>
                <p>&copy; Copyright 2014 Rafał Kozik</p>
            </footer>
        </div>
    </div>
</div>
</body>
</html>              