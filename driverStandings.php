<?php

require "config.php";

startPage("Drivers - Standings");



    echo "<div class='middle' style='background-color: rgba(225,225,225,0.5); border-radius: 5px; padding: 10px; margin-bottom: 10px;'>";

    $db = dbConnect();

    $stmt = "SELECT drivers.name AS 'name', COUNT(*) AS 'wins', drivers.points AS 'points', team.name AS 'team' FROM drivers, race, team WHERE drivers.team = team.teamId AND drivers.driverId = race.first GROUP BY drivers.name ORDER BY COUNT(*) DESC limit 1
";
    $result = $db->query($stmt);


    echo "<div style='background-color: rgba(0,0,0,0.6); border-radius: 5px; padding: 22px;'>";
    echo "<h2 style='font-family: Monaco; color: white; font-size: 28px'>2014 World Drivers Champion:</h2></br>\n";

    echo "<table align='center' width='90%' border='0px' cellpadding='1px' style='border-collapse: collapse; border-radius: 5px;'>\n";
    echo "<tr class='solid' style='background-color: rgba(0,0,0,0.5); color: white; font-family: Monaco; font-size: 26px;'><td style='border-top-left-radius: 5px;'>Driver</td><td align='center'>Wins</td><td align='center'>Points</td><td style='border-top-right-radius: 5px;'>Team</td></tr>";
    while($row = $result->fetch_assoc())
    {
        echo "<tr class='solid' style='background-color: rgba(0,0,0,0.1); color: white; font-family: Monaco; font-size: 22px;'>";
        echo "\n<td width='25%' style='padding-left: 10px;'>   " . $row["name"] . "</td><td width='20%' align='center'>" . $row["wins"] . "</td><td width='22.5%' align='center'>" . $row["points"] . "</td><td width='32.5%' style='padding-left: 10px;'>" . $row["team"] . "</td>";
        echo "</tr>\n";
    }

    echo "</table>\n";
    echo "</div></br>";
    $result->free();


    $stmt = "SELECT * From drivers ORDER BY points DESC";
    $result = $db->query($stmt);

    echo "<div style='background-color: rgba(0,0,0,0.6); border-radius: 5px; padding: 21px;'>";
    echo "<h2 style='font-family: Monaco; color: white; font-size: 28px'>2014 Drivers Standings:</h2></br>\n";

    echo "<table align='center' width='90%' border='0px' cellpadding='1px' style='border-collapse: collapse; border-radius: 5px;'>\n";
    echo "<tr class='solid' style='background-color: rgba(0,0,0,0.5); color: white; font-family: Monaco; font-size: 26px;'><td style='border-top-left-radius: 5px;'>Driver</td><td align='center' style='border-top-right-radius: 5px;'>Points</td></tr>";
    $i=0;
    while($row = $result->fetch_assoc())
    {
        if($i % 2 == 0)
        {
            echo "<tr class='solid' style='background-color: rgba(0,0,0,0.1); color: white; font-family: Monaco; font-size: 22px;'>";
            echo "\n<td width='50%' style='padding-left: 10px;'>" . $row["name"] . "</td><td width='50%' align='center'>". $row['points']."</td>";
            echo "</tr>\n";
        }
        else{
            echo "<tr class='solid' style='background-color: rgba(256,256,256,0.1); color: white; font-family: Monaco; font-size: 22px;'>";
            echo "\n<td width='50%' style='padding-left: 10px;'>" . $row["name"] . "</td><td width='50%' align='center'>". $row['points']."</td>";
            echo "</tr>\n";
        }
        $i++;
    }

    echo "</table>\n";
echo "</div>";
    $result->free();

    $db->close();







    ?>
</div>
<?php
endPage();
?>