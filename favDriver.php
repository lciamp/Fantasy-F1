<?php

require "config.php";

$db = dbConnect();

$driverId =  strip_tags($_POST['driverId']);

$userId =  strip_tags($_POST['userId']);



startPage("Admin - Favorite Driver");



echo "<div class='middle' style='background-color: rgba(225,225,225,0.5); border-radius: 5px; padding: 10px; margin-bottom: 10px;'>";
echo "<div align='center' style='background-color: rgba(0,0,0,0.6); border-radius: 5px; padding: 21px;'>";
if($driverId and $userId != null)
{
    $stmt = "INSERT INTO favDriver VALUES('$userId', '$driverId')";
    $db->query($stmt);

    echo "<h2 style='font-family: Monaco; color: white; font-size: 28px'>Insert Successful:</h2>\n";


}

echo "<h2 style='font-family: Monaco; color: white; font-size: 28px'>Favorite Drivers</h2>\n";



$stmt = "SELECT userId, name FROM user";
$result = $db->query($stmt);

echo "<h2 style='font-family: Monaco; color: white; font-size: 28px'>Select User:</h2>\n";

echo "<form action='favDriver' method='POST'>\n";
echo "<select name='userId'>\n";
while($rows = $result->fetch_assoc())
{
    echo "<option value='".$rows['userId']."'>" . $rows['name']. "</option>\n";
}


$result->free();




echo "</select>\n";


$stmt = "SELECT driverId, name FROM drivers";
$result = $db->query($stmt);

echo "<h2 style='font-family: Monaco; color: white; font-size: 28px'>Select Favorite Driver:</h2>\n";

echo "<form action='favDriver.php' method='POST'>\n";
echo "<select name='driverId'>\n";
while($rows = $result->fetch_assoc())
{
    echo "<option value='".$rows['driverId']."'>" . $rows['name']. "</option>\n";
}


$result->free();


echo "</select>\n";
echo "<input type='submit' value='submit'>\n";
echo "</form>\n";
echo "<a href='admin' class='fer' style='font-size: 30px; font-family: Monaco'>Back To Admin Page</a><br/>";
echo "</div>";
echo "</div>";

endPage();