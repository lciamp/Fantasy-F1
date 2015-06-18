<?php

require "config.php";

$db = dbConnect();

$userId =  intval(strip_tags($_POST['userId']));
$raceId =  intval(strip_tags($_POST['raceId']));
$first =  intval(strip_tags($_POST['first']));
$second =  intval(strip_tags($_POST['second']));
$third =  intval(strip_tags($_POST['third']));

$submit = $_POST['submit'];


startPage("Admin - User Picks");


echo "<div class='middle' style='background-color: rgba(225,225,225,0.5); border-radius: 5px; padding: 10px'>";

echo "<div align='center' style='background-color: rgba(0,0,0,0.6); border-radius: 5px; padding: 11px;'>";


if($submit)
{
    if($userId && $raceId && $first && $second && $third)
    {
        $stmt = "INSERT INTO picks VALUES('$userId', '$raceId', '$first', '$second', '$third')";
        $db->query($stmt);

        echo "<h2 style='font-family: Monaco; color: white; font-size: 28px'>Insert Successful:</h2>\n";
    }

}


echo "<h2 style='font-family: Monaco; color: white; font-size: 32px'>Make Picks:</h2>\n";



$stmt = "SELECT userId, name FROM user";
$result = $db->query($stmt);

echo "<h2 style='font-family: Monaco; color: white; font-size: 28px'>User:</h2>\n";

echo "<form action='makePick' method='POST'>\n";
echo "<select name='userId'>\n";
while($rows = $result->fetch_assoc())
{
    echo "<option value='".$rows['userId']."'>" . $rows['name']. "</option>\n";
}


$result->free();
echo "</select>\n";


$stmt = "SELECT raceId, name FROM race";
$result = $db->query($stmt);

echo "<h2 style='font-family: Monaco; color: white; font-size: 28px'>Race:</h2>\n";

echo "<select name='raceId'>\n";
while($rows = $result->fetch_assoc())
{
    echo "<option value='".$rows['raceId']."'>" . $rows['name']. "</option>\n";
}

$result->free();
echo "</select>\n";





$stmt = "SELECT driverId, drivers.name FROM drivers";
$result = $db->query($stmt);

echo "<h2 style='font-family: Monaco; color: white; font-size: 28px'>First:</h2>\n";

echo "<select name='first'>\n";
while($rows = $result->fetch_assoc())
{
    echo "<option value='".$rows['driverId']."'>" . $rows['name']. "</option>\n";
}

echo "</select>\n";

echo "<h2 style='font-family: Monaco; color: white; font-size: 28px'>Second:</h2>\n";

echo "<select name='second'>\n";
$result = $db->query($stmt);

while($rows = $result->fetch_assoc())
{
    echo "<option value='".$rows['driverId']."'>" . $rows['name']. "</option>\n";
}

echo "</select>\n";

echo "<h2 style='font-family: Monaco; color: white; font-size: 28px'>Third:</h2>\n";
$result = $db->query($stmt);

echo "<select name='third'>\n";
while($rows = $result->fetch_assoc())
{
    echo "<option value='".$rows['driverId']."'>" . $rows['name']. "</option>\n";
}

echo "</select>\n";


echo "<input type='submit' name='submit' value='submit'>\n";
echo "</form>\n";
echo "<a href='admin' class='fer' style='font-size: 30px; font-family: Monaco'>Back To Admin Page</a><br/>";
echo "</div>";
echo "</div>";
endPage();