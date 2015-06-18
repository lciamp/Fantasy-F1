<?php

require "config.php";

$db = dbConnect();

$driverId =  strip_tags($_POST['driverId']);

$points = $_POST['points'];


startPage("Admin - Add Points");


echo "<div class='middle' style='background-color: rgba(225,225,225,0.5); border-radius: 5px; padding: 10px; margin-bottom: 10px;'>";

echo "<div align='center' style='background-color: rgba(0,0,0,0.6); border-radius: 5px; padding: 21px;'>";
if($driverId and $points != null)
{
    $stmt = "UPDATE drivers SET points = (points + '$points') WHERE driverId = '$driverId'";
    $db->query($stmt);

    echo "<h2 style='font-family: Monaco; color: white; font-size: 28px'>Update Successful!!!</h2>\n";


}



echo "<h2 style='font-family: Monaco; color: white; font-size: 28px'>Add Points:</h2>\n";



$stmt = "SELECT driverId, name FROM drivers ORDER BY name";
$result = $db->query($stmt);

echo "<h2 style='font-family: Monaco; color: white; font-size: 28px'>Select Driver & Points:</h2>\n";

echo "<form action='addPoints' method='POST'>\n";
echo "<select name='driverId'>\n";
while($rows = $result->fetch_assoc())
{
    echo "<option value='".$rows['driverId']."'>" . $rows['name']. "</option>\n";
}

$result->free();

echo "</select>\n";
$points = array(25, 18, 15, 12, 10, 8, 6, 4, 2, 1);
echo "<select name='points'>";
for($i=0; $i < count($points); $i++)
    {
        echo "<option value=".$points[$i].">".$points[$i]."</option>\n";

    }
echo "</select>";




echo "<input type='submit' value='submit'>\n";
echo "</form>\n";
echo "<a href='admin' class='fer' style='font-size: 30px; font-family: Monaco'>Back To Admin Page</a><br/>";

echo "</div>";
echo "</div>";

endPage();