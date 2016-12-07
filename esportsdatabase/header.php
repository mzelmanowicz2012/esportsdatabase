<?php // Example 26-2: header.php
session_start();

echo "<!DOCTYPE html>\n<html>\n";

require_once 'functions.php';

$userstr = ' (Guest)';

if (isset($_SESSION['user']))
{
    $user     = $_SESSION['user'];
    $loggedin = TRUE;
    $userstr  = " ($user)";
}
else $loggedin = FALSE;

echo <<<_END
  <head>
    <title>$appname$userstr</title>

    <!-- A header that appears no matter what. Normal header stuff like bootstrap files, etc. go here -->
    
        <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link href="./freelancer/css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="./freelancer/css/freelancer.css" rel="stylesheet">
    
    
    <!-- Custom Fonts -->
    <link href="./freelancer/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!--- My adjustments-->
    <link rel="stylesheet" type="text/css" href="myedits.css">
    <link rel="icon" href="./jhenfavicon.ico" type="image/x-icon" />

    <script src='javascript.js'></script>

  </head>

_END;

if ($loggedin)
{
    echo <<<_END
    
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">eSports Database</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="games.php">Games</a>
                    </li>
                    <li class="page-scroll">
                        <a href="tournaments.php">Tournaments</a>
                    </li>
                    <li class="page-scroll">
                        <a href="tournamentsponsorships.php">Tournament Sponsorships</a>
                    </li><br>
                    <li class="page-scroll">
                        <a href="players.php">Players</a>
                    </li>
                    <li class="page-scroll">
                        <a href="playersponsorships.php">Player Sponsorships</a>
                    </li>
                    <li class="page-scroll">
                        <a href="companies.php">Companies</a>
                    </li>
                    <li class="page-scroll">
                        <a href="logout.php">Log Out</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    
    <header>
        <!-- A header that appears when the user is logged in -->
        <br><br><br><br><br><br><br><br><br><br>
    </header>

_END;
}
else
{
    echo <<<_END
<nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">eSports Database</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="signup.php">Sign Up</a>
                    </li>
                    <li class="page-scroll">
                        <a href="login.php">Log In</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    
    <header>
        <!-- A header that appears when the user is not logged in -->
        <br><br><br><br><br><br><br><br><br><br>
    </header>

_END;
    echo ("<br><div class='col-md-4 col-md-offset-4 text-center'><p><div class='info wallimage'><span class='fa fa-exclamation-triangle'></span> You are not logged in! Please either <a href='./login.php'>log in</a> or <a href='./signup.php'>sign up</a>!</div></p></div><br><br><br><br>");
}
?>
