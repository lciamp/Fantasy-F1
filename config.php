<?php


function dbConnect()
{
    // variables for connecting to server and selecting database
    $dbHost = "localhost";
    $dbUsername = "root";
    $dbPassword = "root";
    $dbName = "formula1";

    // connect to mysql
    $connection = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName)
                  or
                  die ("Connect error: (" . $connection->connect_errno . ") " . $connection->connect_error);

    //return database connection as an object
    return $connection;
}


function startPage($title)
{
    echo<<<END
    <!doctype html>
    <html>
        <head>
            <title>$title</title>
            <link rel='stylesheet' href='css/admin.css' type='text/css'>
            </head>

<body>
<div class="site">
<div>
<h1 style="margin-top: 0px; margin-bottom: -70px; padding-left: 100px; font-family: 'Monaco'; font-size: 52px; color: white;"><a href='index' class="fer">Five</a> <a href='index' class="ferRED">Red</a> <a href='index' class="fer"> Lights</a></h1>
</div>

    <div style="font-family: 'Ferro Rosso'">
  <nav >
    <ul style="font-family: 'Monaco'; font-size: 24px">
        <li><a href="#" class="f1" style="font-size: 26px; font-weight: bold">Teams</a>
            <ul style="font-family: 'Monaco'">
                <li><a href="teamAll" class="f1">All</a></li>
                <li><a href="teamDrivers" class="f1">Drivers</a></li>
                <li><a href="teamStadings" class="f1">Standings</a></li>
                <li><a href="teamStats" class="f1">Stats</a></li>
            </ul>
        <li><a href="#" class="f1" style="font-size: 26px; font-weight: bold">Drivers</a>
            <ul>
                <li><a href="driversAll" class="f1">All</a></li>
                <li><a href="driverStandings" class="f1">Standings</a></li>
                <li><a href="driverStats" class="f1">Stats</a></li>
            </ul>
        <li><a href="#" class="f1" style="font-size: 26px; font-weight: bold">Races</a>
            <ul>
                <li><a href="raceAll" class="f1">All</a></li>
                <li><a href="raceResults" class="f1">Results</a></li>
            </ul>
        <li><a href="#" class="f1" style="font-size: 26px; font-weight: bold">Users</a>
            <ul>
                <li><a href="userInfo" class="f1">Info</a></li>
                <li><a href="userStandings" class="f1">Standings</a></li>
            </ul>

        </li>
    </ul>
  </nav>
</div>

END;
}

function endPage()
{
    echo "</div></body></html>";
}
/*
function getDriverName($id)
{

    $db = dbConnect();
    $stmt = "SELECT name FROM drivers WHERE driverId='".$id."'";
    $result = $db->query($stmt);
    $name = $result->fetch_assoc();
    $name = $name['name'];
    $result->free();
    $db->close();

    return $name;
}

function getTeamName($id)
{

    $db = dbConnect();
    $stmt = "SELECT name FROM team WHERE teamId =".$id."";
    $result = $db->query($stmt);
    $name = $result->fetch_assoc();
    $name = $name['name'];
    $result->free();
    $db->close();

    return $name;
}

function getTeamId($name)
{

    $db = dbConnect();
    $stmt = "SELECT teamId FROM team WHERE name ='".$name."'";
    $result = $db->query($stmt);
    $name = $result->fetch_assoc();
    $name = $name['name'];
    $result->free();
    $db->close();

    return $name;
}
*/
function getMonth($month)
{
    if ($month == '03')
        return "Mar";
    else if ($month == '04')
        return "Apr";
    else if ($month == '05')
        return "May";
    else if ($month == '06')
        return "Jun";
    else if ($month == '07')
        return "Jul";
    else if ($month == '08')
        return "Aug";
    else if ($month == '09')
        return "Sept";
    else if ($month == '10')
        return "Oct";
    else if ($month == '11')
        return "Nov";
    else
        return 0;
}


function footer()
{
    echo <<<END

<footer class="footer_wrapper" style="align-content: center;">
    <div class="container" style="align-content: center; opacity: 1;">
        <p class="text-muted-footer" style="align-content: center; padding-top: 10px; padding-left: 15%; padding-right: 5%;">FiveRedLights.com is not affiliated with Formula 1, Formula One Management (FOM), Formula One Administration (FOA), or any other subsidiary
            associated with the official Formula One governing organisations or their shareholders.
            If you are the
            copyright holder of any material on this site and believe that your material has been used unfairly, please
            <a href="#" title="Contact Us" class="red" style="font-size: 14px; font-weight: 600; line-height: 1px;">contact us</a>.</p>
    </div>
</footer>

END;
}

function getTeam($name, $driver1, $driver2)
{
    $colors = array(
        "FER" => "red",
        "RB" => "black",
        "MERC" => "darkturquoise",
        "FI" => "darkorange",
        "WIL" => "darkblue",
        "MC" => "darkgrey",
        "LOT" => "darkgoldenrod",
        "SAU" => "blue",
        "STR" => "purple"
    );

    echo "<div id='$name' style='background: #000000; width: 223px; height: 170px; display: inline-block; border-radius: 5px; margin-right: 5px; opacity: 1;'>";
    echo "            <div id='draggable' draggable='true' style='width: 104px; border-top-left-radius: 5px; float: left; margin-left: 5px; margin-top: 5px; margin-bottom: 0; border-radius: 5px;' >";
    echo "                <img id='" . $driver1 . "' src='images/" . $driver1 . ".jpg' draggable='false' style='opacity: 1; border-top-right-radius: 5px; border-top-left-radius: 5px;'>";
    echo "                <p style='font-size: 24px; background-color: ". $colors[$name]."; text-align: center; color: #ffffff; border-bottom-right-radius: 5px; border-bottom-left-radius: 5px; margin-bottom:0;'>" . $driver1 . "</p>";
    echo "            </div>";
    echo "            <div id='dragable' draggable='true' style='width: 104px; border-top-left-radius: 5px; float: left; margin-left: 5px; margin-top: 5px;' >";
    echo "                <img id='" . $driver2 . "' src='images/" . $driver2 . ".jpg' draggable='false' style='opacity: 1; border-top-right-radius: 5px; border-top-left-radius: 5px;'>";
    echo "                <p style='font-size: 24px; background-color: " . $colors[$name] . "; text-align: center; color: #ffffff; border-bottom-right-radius: 5px; border-bottom-left-radius: 5px; margin-bottom:0;'>" . $driver2 . "</p>";
    echo "            </div>";
    echo "</div>";
}

function picks($name, $driver1, $driver2){

    $colors = array(
        "FER" => "red",
        "RB" => "purple",
        "MERC" => "darkturquoise",
        "FI" => "darkorange",
        "WIL" => "darkblue",
        "MC" => "darkgrey",
        "LOT" => "darkgoldenrod",
        "SAU" => "black",
        "STR" => "navy"
    );
    echo "<div style='background: rgba(0,0,0,.5); border-radius: 5px; float:none; display: inline-block; width: 100%; height: 270px; text-align: center; border-radius: 5px; margin-right: 5px; opacity: 1;'>";
    echo "            <div id='droppable' style='width: 104px; height: 200px; background-color: red; border-top-left-radius: 5px; float:none; display: inline-block; margin-left: 5px; margin-top: 5px; margin-bottom: 0; border-radius: 5px;' >";
    #echo "                <img id='" . $driver1 . "' src='images/" . $driver1 . ".jpg' draggable='false' style='opacity: 1; border-top-right-radius: 5px; border-top-left-radius: 5px;'>";
    #echo "                <p style='font-size: 24px; background-color:#ffffff; text-align: center; color: #000000; border-bottom-right-radius: 5px; border-bottom-left-radius: 5px; margin-bottom:0;'>1st</p>";
    echo "            </div>";
    echo "            <div id='dragable' dragable='false' dropable='true' style='width: 104px; border-top-left-radius: 5px; float:none; display: inline-block; margin-left: 5px; margin-top: 5px; margin-bottom: 0; border-radius: 5px;' >";
    echo "                <img id='" . $driver1 . "' src='images/" . $driver1 . ".jpg' draggable='false' style='opacity: 1; border-top-right-radius: 5px; border-top-left-radius: 5px;'>";
    echo "                <p style='font-size: 24px; background-color: #ffffff; text-align: center; color: #000000; border-bottom-right-radius: 5px; border-bottom-left-radius: 5px; margin-bottom:0;'>2nd</p>";
    echo "            </div>";
    echo "            <div id='dragable' dragable='false' dropable='true' style='width: 104px; border-top-left-radius: 5px; float:none; display: inline-block; margin-left: 5px; margin-top: 5px; margin-bottom: 0; border-radius: 5px;' >";
    echo "                <img id='" . $driver1 . "' src='images/" . $driver1 . ".jpg' draggable='false' style='opacity: 1; border-top-right-radius: 5px; border-top-left-radius: 5px;'>";
    echo "                <p style='font-size: 24px; background-color: #ffffff; text-align: center; color: #000000; border-bottom-right-radius: 5px; border-bottom-left-radius: 5px; margin-bottom:0;'>3rd</p>";
    echo "            </div>";

    echo "</br>";
    echo "<div id='$name' style='background: rgba(0,0,0,.5); border-radius: 5px; float:none; display: inline-block; width: 100%; height: 170px; text-align: center; border-radius: 5px; margin-right: 5px; opacity: 1;'>";
    echo "            <div id='dragable' dragable='false' dropable='true' style='width: 104px; border-top-left-radius: 5px; float:none; display: inline-block; margin-left: 5px; margin-top: 5px; margin-bottom: 0; border-radius: 5px;' >";
    echo "                <img id='" . $driver1 . "' src='images/" . $driver1 . ".jpg' draggable='false' style='opacity: 1; border-top-right-radius: 5px; border-top-left-radius: 5px;'>";
    echo "                <p style='font-size: 24px; background-color:#ffffff; text-align: center; color: #000000; border-bottom-right-radius: 5px; border-bottom-left-radius: 5px; margin-bottom:0;'>Pole</p>";
    echo "            </div>";
    echo "            <div id='dragable' dragable='false' dropable='true' style='width: 104px; border-top-left-radius: 5px; float:none; display: inline-block; margin-left: 5px; margin-top: 5px; margin-bottom: 0; border-radius: 5px;' >";
    echo "                <img id='" . $driver1 . "' src='images/" . $driver1 . ".jpg' draggable='false' style='opacity: 1; border-top-right-radius: 5px; border-top-left-radius: 5px;'>";
    echo "                <p style='font-size: 24px; background-color: #ffffff; text-align: center; color: #000000; border-bottom-right-radius: 5px; border-bottom-left-radius: 5px; margin-bottom:0;'>Fast Lap</p>";
    echo "            </div>";
    echo "            <div id='dragable' draggable='true' style='width: 104px; border-top-left-radius: 5px; float:none; display: inline-block; margin-left: 5px; margin-top: 5px; margin-bottom: 0; border-radius: 5px;' >";
    echo "                <img id='" . $driver1 . "' src='images/" . $driver1 . ".jpg' draggable='false' style='opacity: 1; border-top-right-radius: 5px; border-top-left-radius: 5px;'>";
    echo "                <p style='font-size: 24px; background-color: #ffffff; text-align: center; color: #000000; border-bottom-right-radius: 5px; border-bottom-left-radius: 5px; margin-bottom:0;'>Crash</p>";
    echo "            </div>";

    echo "</br>";

    echo "<div id='$name' style='background: rgba(0,0,0,.5); border-radius: 5px; float:none; display: inline-block; width: 100%; height: 264px; text-align: center; border-radius: 5px; margin-right: 5px; opacity: 1;'>";
    echo "<p style='color: #ffffff; font-size: 20px; margin-bottom: 0;'>Team Battle:</p>";
    echo "            <div id='dragable' dragable='false' dropable='true' style='width: 104px; border-top-left-radius: 5px; float:none; display: inline-block; margin-left: 5px; margin-top: 5px; margin-bottom: 0; border-radius: 5px;' >";
    echo "                <img id='" . $driver1 . "' src='images/" . $driver1 . ".jpg' draggable='false' style='opacity: 1; border-top-right-radius: 5px; border-top-left-radius: 5px;'>";
    echo "                <p style='font-size: 24px; background-color:#ffffff; text-align: center; color: #000000; border-bottom-right-radius: 5px; border-bottom-left-radius: 5px; margin-bottom:0;'>Winner</p>";
    echo "            </div>";
    echo "            <div id='dragable' dragable='false' dropable='true' style='width: 104px; border-top-left-radius: 5px; float:none; display: inline-block; margin-left: 5px; margin-top: 5px; margin-bottom: 0; border-radius: 5px;' >";
    echo "                <img id='" . $driver2 . "' src='images/" . $driver2 . ".jpg' draggable='false' style='opacity: 1; border-top-right-radius: 5px; border-top-left-radius: 5px;'>";
    echo "                <p style='font-size: 24px; background-color: #ffffff; text-align: center; color: #000000; border-bottom-right-radius: 5px; border-bottom-left-radius: 5px; margin-bottom:0;'>Loser</p>";

    echo "            </div>";
    echo "</br></br>";
    echo "<p style='background-color: rgba(0,0,0,.5); display: inherit;'>";
    echo "<button type='button' class='btn btn-primary' style='width: 200px; font-size: 18px; margin-left: 5px'>Submit</button>";
    echo "</p>";

    echo "</div>";

}

