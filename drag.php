<?php
require "config.php";

session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Five Red Lights</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style2.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="http://getbootstrap.com/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- AHHAHAHAHAHHAAHAHAHAHHAHAHAHAHHHAHAHAHAHHAHHHAHAHHAHAHA BULLSHIT JAVASCRIP
    <script>
        function allowDrop(ev) {
            ev.preventDefault();
        }

        function drag(ev) {
            ev.dataTransfer.setData("text", ev.target.id);
        }

        function drop(ev) {
            ev.preventDefault();
            var data = ev.dataTransfer.getData("text");
            ev.target.appendChild(document.getElementById(data));
        }
    </script>

    -->
</head>

<body style="opacity: 1;">

<!-- Fixed navbar -->
<nav class="navbar navbar-inverse navbar-fixed-top" style="opacity: .75;">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="try.php"  style="display: inline;" title="Five Red Lights">Five <span class="red" style="font-size: 26px;">Red</span> Lights</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="#" class="active">Rules</a></li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Teams <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">All</a></li>
                        <li><a href="#">Drivers</a></li>
                        <li><a href="#">Standings</a></li>
                        <li><a href="#">Stats</a></li>

                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Drivers <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">All</a></li>
                        <li><a href="#">Standings</a></li>
                        <li><a href="#">Stats</a></li>

                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Races <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">All</a></li>
                        <li><a href="#">Results</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Polls <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Site</a></li>
                        <li><a href="#">Race</a></li>
                        <li><a href="#">Drivers</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Users <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Info</a></li>
                        <li><a href="#">Make Picks</a></li>
                        <li><a href="#">Results</a></li>
                        <li><a href="#">Standings</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Contact</a></li>
                <li><a href="../navbar/">Sign Up</a></li>
                <li><a href="../navbar-static-top/">Login</a></li>
                <!--<li><a href="./">Fixed top <span class="sr-only">(current)</span></a></li>-->
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<section >
<div class="wrapper">
    <div class="container" >
        <!-- Main component for a primary marketing message or call to action -->
        <div id="main-contain" style="padding: 10px; background-color: rgba(0,0,0, .4); border-radius: 5px; height: inherit;">
            <p style="text-align: center; background-color: rgba(255,255,255, .8); font-family: sans-serif; color: #000000; font-size: 40px; border-radius: 5px;">Make your picks for the $grand_prix</p>

        <div style="padding-right: 10px; padding-left: 10px;">
            <div id="left" style="float: left; display: inline-block;">
            <?php
            getTeam("MERC", "HAM", "ROS");

            getTeam("RB", "RIC", "KVY");

            getTeam("WIL", "BOT", "MAS");

            echo "</br>";

            getTeam("FER", "VET", "RAI");

            getTeam("MC", "ALO", "BUT");

            getTeam("FI", "HUL", "PER");

            echo "</br>";

            getTeam("STR", "VST", "SNZ");

            getTeam("LOT", "GRO", "MAL");

            getTeam("SAU", "NSR", "ERI");

            ?>
            </div>
            <div id="right" style="background-color: #000000; height: inherit; width: inherit;">



            <div id="drop1" style="width: 35%; height: 590px;; float: right; display: inline; background-color: rgba(0,0,0,.5); border-radius: 5px;">
                <?php
                picks("WHO","WHO","WHO");
                ?>






            </div>
            </div>
        </div>


        </div>






    </div>
    <div class="footer-pad"></div>
    <div class="footer-pad2"></div>
</div>
</section>
<?php
footer();

?>



<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="http://getbootstrap.com/assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
