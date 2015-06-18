<?php

require "config.php";


startPage("Team - Stats");


echo "<div class='middle' style='background-color: rgba(225,225,225,0.5); border-radius: 5px; padding: 10px; margin-bottom: 10px;'>";
    $db = dbConnect();

    $stmt = "SELECT team.name AS 'Name', COUNT(*) AS 'Wins' FROM  drivers, race, team WHERE drivers.team = team.teamId AND drivers.driverId = race.first GROUP BY team.name ORDER BY COUNT(*) DESC
";
    $result = $db->query($stmt);

    echo "<div style='background-color: rgba(0,0,0,0.6); border-radius: 5px; padding: 21px;'>";
    echo "<table align='center' width='90%' border='0px' cellpadding='1px' style='border-collapse: collapse; border-radius: 5px;'>\n";
    echo "<tr class='solid' style='background-color: rgba(0,0,0,0.5); color: white; font-family: Monaco; font-size: 26px;'><td style='border-top-left-radius: 5px;'>Team</td><td align='center' style='border-top-right-radius: 5px;'>Wins</td></tr>";
    echo "<h2 style='font-family: Monaco; color: white; font-size: 28px'>Most Wins:</h2></br>\n";

    $i =0;
    while($row = $result->fetch_assoc())
    {
        if($i % 2 ==0) {
            echo "<tr class='solid' style='background-color: rgba(0,0,0,0.1); color: white; font-family: Monaco; font-size: 22px;'>";
            echo "\n<td width='50%' style='padding-left: 10px;'>" . $row["Name"] . "</td><td width='50%' align='center' >" . $row['Wins'] . "</td>";
            echo "</tr>\n";
        }
        else{
            echo "<tr class='solid' style='background-color: rgba(256,256,256,0.1); color: white; font-family: Monaco; font-size: 22px;'>";
            echo "\n<td width='50%' style='padding-left: 10px;'>" . $row["Name"] . "</td><td width='50%' align='center' >" . $row['Wins'] . "</td>";
            echo "</tr>\n";
        }
        $i++;
    }

    $result->free();
    echo "</table></br></br>\n";
    echo "</div><br/>";

    echo "<div style='background-color: rgba(0,0,0,0.6); border-radius: 5px; padding: 21px;'>";
    echo "<table align='center' width='90%' border='0px' cellpadding='1px' style='border-collapse: collapse; border-radius: 5px;'>\n";
    echo "<tr class='solid' style='background-color: rgba(0,0,0,0.5); color: white; font-family: Monaco; font-size: 26px;'><td style='border-top-left-radius: 5px;'>Team</td><td align='center' style='border-top-right-radius: 5px;'>Votes</td></tr>";
    echo "<h2 style='font-family: Monaco; color: white; font-size: 28px'>Most Popular:</h2></br>\n";

    $stmt = "SELECT team.name AS 'name' , count(*) AS 'votes' FROM team, user WHERE team.teamId = user.favTeam GROUP BY team.name ORDER BY count(*) DESC";
    $result = $db->query($stmt);
    $i = 0;
    while($row = $result->fetch_assoc())
    {
        if($i % 2 == 0)
        {
            echo "<tr class='solid' style='background-color: rgba(0,0,0,0.1); color: white; font-family: Monaco; font-size: 22px;'>";
            echo "\n<td width='50%' style='padding-left: 10px;'>" . $row["name"] . "</td><td width='50%' align='center'>". $row['votes']."</td>";
            echo "</tr>\n";
        }
        else{

            echo "<tr class='solid' style='background-color: rgba(256,256,256,0.1); color: white; font-family: Monaco; font-size: 22px;'>";
            echo "\n<td width='50%' style='padding-left: 10px;'>" . $row["name"] . "</td><td width='50%' align='center'>". $row['votes']."</td>";
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
?>