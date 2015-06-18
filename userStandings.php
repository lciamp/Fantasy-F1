<?php

require "config.php";

startPage("User - Standings");

echo "<div class='middle' style='background-color: rgba(225,225,225,0.5); border-radius: 5px; padding: 10px; margin-bottom: 10px;'>";
        $db = dbConnect();

        $stmt = "SELECT user.name AS 'name', score, team.name AS 'team' FROM user, team WHERE user.favTeam = team.teamId ORDER BY score DESC";
        $result = $db->query($stmt);

        echo "<div style='background-color: rgba(0,0,0,0.6); border-radius: 5px; padding: 21px;'>";
        echo "<table align='center' width='90%' border='0px' cellpadding='1px' style='border-collapse: collapse; border-radius: 5px;'>\n";
        echo "<tr class='solid' style='background-color: rgba(0,0,0,0.5); color: white; font-family: Monaco; font-size: 26px;'><td style='border-top-left-radius: 5px;'>Username</td><td align='center'>Score</td><td style='border-top-right-radius: 5px;'>Favorite Team</td></tr>";
        $i = 0;
        while($row = $result->fetch_assoc())
        {
            if($i % 2 ==0){
                echo "<tr class='solid' style='background-color: rgba(0,0,0,0.1); color: white; font-family: Monaco; font-size: 22px;'>";
                echo "\n<td width='20%'>" . $row["name"] . "</td>\n<td width='30%' align='center'>" . $row['score'] ."</td><td width='30%'>" . $row['team'] ."</td>\n";
                echo "</tr>\n";
            }
            else{
                echo "<tr class='solid' style='background-color: rgba(256,256,256,0.1); color: white; font-family: Monaco; font-size: 22px;'>";
                echo "\n<td width='20%'>" . $row["name"] . "</td>\n<td width='30%' align='center'>" . $row['score'] ."</td><td width='30%'>" . $row['team'] ."</td>\n";
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