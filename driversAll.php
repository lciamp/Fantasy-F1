<?php

require "config.php";

startPage("Drivers - All");



    echo "<div class='middle' style='background-color: rgba(225,225,225,0.5); border-radius: 5px; padding: 10px; margin-bottom: 10px;'>";
    $db = dbConnect();

    $stmt = "SELECT drivers.name AS 'driver', nation, team.name AS 'team', number
             FROM drivers, team
             WHERE drivers.team = team.teamId
             ORDER BY team.points DESC";

    $result = $db->query($stmt);

    echo "<div style='background-color: rgba(0,0,0,0.6); border-radius: 5px; padding: 21px;'>";
    echo "<table align='center' width='90%' border='0px' cellpadding='1px' style='border-collapse: collapse; border-radius: 5px;'>\n";
    echo "<tr class='solid' style='background-color: rgba(0,0,0,0.5); color: white; font-family: Monaco; font-size: 26px;'><td style='border-top-left-radius: 5px;'>Driver</td><td align='center'>Number</td><td style='border-top-right-radius: 5px;'>Team</td></tr>";
    $i =0;
    while($row = $result->fetch_assoc())
    {
        if($i % 2 == 0){
            echo "<tr class='solid' style='background-color: rgba(0,0,0,0.1); color: white; font-family: Monaco; font-size: 22px;'>";
            echo "\n<td width='33.33%'>" . $row["driver"] . "</td><td width='33.33%' align='center'>" . $row["number"] . "</td>\n<td width='33.33%'>" . $row['team'] ."</td>\n";
            echo "</tr>\n";
        }
        else{
            echo "<tr class='solid' style='background-color: rgba(256,256,256,0.1); color: white; font-family: Monaco; font-size: 22px;'>";
            echo "\n<td width=33.33%'>" . $row["driver"] . "</td><td width='33.33%' align='center'>" . $row["number"] . "</td>\n<td width='33.33%'>" . $row['team'] ."</td>\n";
            echo "</tr>\n";
        }
        $i++;
    }

    echo "</table>\n";
    echo "</div>";
    $result->free();

    $db->close();


    echo "</div>";

endPage();
