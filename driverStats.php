<?php

require "config.php";



startPage("Driver - Stats");



    echo "<div class='middle' style='background-color: rgba(225,225,225,0.5); border-radius: 5px; padding: 10px; margin-bottom: 20px;'>";


    $db = dbConnect();

    $stmt = "SELECT drivers.name AS 'Name', COUNT(*) AS 'Wins', team.name AS 'Team' FROM drivers, race, team WHERE drivers.team = team.teamId AND drivers.driverId = race.first GROUP BY race.first ORDER BY COUNT(*) DESC";
    $result = $db->query($stmt);

    echo "<div style='background-color: rgba(0,0,0,0.6); border-radius: 5px; padding: 21px;'>";
    echo "<table align='center' width='90%' border='0px' cellpadding='1px' style='border-collapse: collapse; border-radius: 5px;'>\n";
    echo "<tr class='solid' style='background-color: rgba(0,0,0,0.5); color: white; font-family: Monaco; font-size: 26px;'><td style='border-top-left-radius: 5px;'>Driver</td><td align='center'>Wins</td><td style='border-top-right-radius: 5px;'>Team</td></tr>";
    echo "<h2 style='font-family: Monaco; color: white; font-size: 28px'>Most Wins:</h2></br>\n";
    $i=0;
    while($row = $result->fetch_assoc()) {
        if($i % 2 ==0){
            echo "<tr class='solid' style='background-color: rgba(0,0,0,0.1); color: white; font-family: Monaco; font-size: 22px;'>";
            echo "\n<td width='33.33%' style='padding-left: 10px;'>" . $row["Name"] . "</td><td width='33.33%' align='center'>" . $row['Wins'] . "</td><td width='33.33%' style='padding-left: 10px;'>" . $row['Team'] . "</td>";
            echo "</tr>\n";
        }
        else{
            echo "<tr class='solid' style='background-color: rgba(256,256,256,0.1); color: white; font-family: Monaco; font-size: 22px;'>";
            echo "\n<td width='33.33%' style='padding-left: 10px;'>" . $row["Name"] . "</td><td width='33.33%' align='center'>" . $row['Wins'] . "</td><td width='33.33%' style='padding-left: 10px;'>" . $row['Team'] . "</td>";
            echo "</tr>\n";
        }
        $i++;
    }

    $result->free();
    echo "</table>\n";
    echo "</div><br/>";

    $stmt = "Select drivers.name AS 'name' , count(*) AS 'podium', team.name AS 'team' FROM drivers, team, race WHERE (driverId = first or driverId = second or driverId = third) and team.teamId = drivers.team  group by drivers.name order by count(*) DESC";
    $result = $db->query($stmt);

    echo "<div style='background-color: rgba(0,0,0,0.6); border-radius: 5px; padding: 21px;'>";
    echo "<table align='center' width='90%' border='0px' cellpadding='1px' style='border-collapse: collapse; border-radius: 5px;'>\n";
    echo "<tr class='solid' style='background-color: rgba(0,0,0,0.5); color: white; font-family: Monaco; font-size: 26px;'><td style='border-top-left-radius: 5px;'>Driver</td><td align='center'>Podiums</td><td style='border-top-right-radius: 5px;'>Team</td></tr>";
    echo "<h2 style='font-family: Monaco; color: white; font-size: 28px'>Most Podiums:</h2></br>\n";

    $i = 0;
    while($row = $result->fetch_assoc()) {
        if($i % 2 ==0){
            echo "<tr class='solid' style='background-color: rgba(0,0,0,0.1); color: white; font-family: Monaco; font-size: 22px;'>";
            echo "\n<td width='33.33%' style='padding-left: 10px;'>" . $row["name"] . "</td><td align='center' width='33.33%'>" . $row['podium'] . "</td><td width='33.33%' style='padding-left: 10px;'>" . $row['team'] . "</td>";
            echo "</tr>\n";
        }
        else{
            echo "<tr class='solid' style='background-color: rgba(256,256,256,0.1); color: white; font-family: Monaco; font-size: 22px;'>";
            echo "\n<td width='33.33%' style='padding-left: 10px;'>" . $row["name"] . "</td><td align='center' width='33.33%'>" . $row['podium'] . "</td><td width='33.33%' style='padding-left: 10px;'>" . $row['team'] . "</td>";
            echo "</tr>\n";
        }
        $i++;
    }

    $result->free();
    echo "</table>\n";
    echo "</div><br/>";


    echo "<div style='background-color: rgba(0,0,0,0.6); border-radius: 5px; padding: 21px;'>";

    echo "<table align='center' width='90%' border='0px' cellpadding='1px' style='border-collapse: collapse; border-radius: 5px;'>\n";
    echo "<tr class='solid' style='background-color: rgba(0,0,0,0.5); color: white; font-family: Monaco; font-size: 26px;'><td style='border-top-left-radius: 5px;'>Nation</td><td align='center' style='border-top-right-radius: 5px;'>Drivers</td></tr>";
    echo "<h2 style='font-family: Monaco; color: white; font-size: 28px'>Drivers By Nation:</h2></br>\n";

    $stmt = "SELECT nation, count(*) AS 'drivers' FROM drivers GROUP BY nation ORDER BY count(*) DESC";
    $result = $db->query($stmt);

    $i = 0;
    while($row = $result->fetch_assoc())
    {
        if($i % 2 == 0) {
            echo "<tr class='solid' style='background-color: rgba(0,0,0,0.1); color: white; font-family: Monaco; font-size: 22px;'>";
            echo "\n<td width='50%' style='padding-left: 10px;'>" . $row["nation"] . "</td><td width='50%' align='center'>" . $row['drivers'] . "</td>";
            echo "</tr>\n";
        }
        else{
            echo "<tr class='solid' style='background-color: rgba(256,256,256, 0.1); color: white; font-family: Monaco; font-size: 22px;'>";
            echo "\n<td width='50%' style='padding-left: 10px;'>" . $row["nation"] . "</td><td width='50%' align='center'>" . $row['drivers'] . "</td>";
            echo "</tr>\n";

        }
        $i++;
    }
    $result->free();
    echo "</table>\n";
    echo "</div><br/>";

    echo "<div style='background-color: rgba(0,0,0,0.6); border-radius: 5px; padding: 21px;'>";

    echo "<table align='center' width='90%' border='0px' cellpadding='1px' style='border-collapse: collapse; border-radius: 5px;'>\n";
    echo "<tr class='solid' style='background-color: rgba(0,0,0,0.5); color: white; font-family: Monaco; font-size: 26px;'><td style='border-top-left-radius: 5px;'>Driver</td><td align='center' style='border-top-right-radius: 5px;'>Votes</td></tr>";
    echo "<h2 style='font-family: Monaco; color: white; font-size: 28px'>Most Popular:</h2></br>\n";

    $stmt = "SELECT drivers.name AS 'driver', count(*) AS 'Votes' FROM drivers, favDriver WHERE drivers.driverId = favDriver.driverId GROUP BY favDriver.driverId ORDER BY count(*) DESC";
    $result = $db->query($stmt);

    $i = 0;
    while($row = $result->fetch_assoc())
    {
        if($i % 2 == 0) {
            echo "<tr class='solid' style='background-color: rgba(0,0,0,0.1); color: white; font-family: Monaco; font-size: 22px;'>";
            echo "\n<td width='50%' style='padding-left: 10px;'>" . $row["driver"] . "</td><td width='50%' align='center'>" . $row['Votes'] . "</td>";
            echo "</tr>\n";
        }
        else{
            echo "<tr class='solid' style='background-color: rgba(256,256,256, 0.1); color: white; font-family: Monaco; font-size: 22px;'>";
            echo "\n<td width='50%' style='padding-left: 10px;'>" . $row["driver"] . "</td><td width='50%' align='center'>" . $row['Votes'] . "</td>";
            echo "</tr>\n";

        }
        $i++;
    }
    $result->free();
    echo "</table>\n";
    echo "</div>";

    $db->close();







    ?>
</div>
<?php
endPage();
?>