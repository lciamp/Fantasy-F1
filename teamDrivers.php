<?php

require "config.php";

startPage("Team - Drivers");

echo "<div class='middle' style='background-color: rgba(225,225,225,0.5); border-radius: 5px; padding: 10px; margin-bottom: 10px;'>";
    $db = dbConnect();

    $stmt = "SELECT name FROM team ORDER BY points DESC";
    $result = $db->query($stmt);

    echo "<div style='background-color: rgba(0,0,0,0.6); border-radius: 5px; padding: 21px;'>";

    while($row = $result->fetch_assoc())
    {
        echo "<table align='center' width='90%' border='0px' cellpadding='1px' style='border-collapse: collapse;'>\n";

            echo "<th colspan='3' class='solid' style='background-color: rgba(256,256,256,0.5); color: black; font-family: Monaco; font-size: 30px; border-radius: 5px;'>" . $row['name'] . "</th>";
            echo "<tr class='solid' style='background-color: rgba(0,0,0,0.1); color: white; font-family: Monaco; font-size: 14px; '>";

            $team = $row['name'];

            $stmt = "SELECT drivers.name FROM drivers WHERE team = (SELECT teamId FROM team WHERE name = '$team') ORDER BY drivers.points DESC";

            $results = $db->query($stmt);
            while ($rows = $results->fetch_assoc())
            {

                echo "\n<td class='try' width='50%'  align='center' style='font-size: 26px;'>" . $rows["name"] . "</td>";
            }
            echo "</tr>\n";
            $i++;
        echo "</table><br/>\n";
    }

echo "</div>";
    $result->free();

    $db->close();


echo "</div>";

endPage();
?>