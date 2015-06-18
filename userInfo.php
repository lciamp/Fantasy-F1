<?php

require "config.php";

startPage("Users - Info");

echo "<div class='middle' style='background-color: rgba(225,225,225,0.5); border-radius: 5px; padding: 10px; margin-bottom: 10px;'>";

        $db = dbConnect();

        $stmt = "SELECT name, email, country FROM user";
        $result = $db->query($stmt);

        echo "<div style='background-color: rgba(0,0,0,0.6); border-radius: 5px; padding: 21px;'>";
        echo "<h2 style='font-family: Monaco; color: white; font-size: 28px'>Users:</h2></br>\n";

        echo "<table align='center' width='90%' border='0px' cellpadding='1px' style='border-collapse: collapse; border-radius: 5px;'>\n";
        echo "<tr class='solid' style='background-color: rgba(0,0,0,0.5); color: white; font-family: Monaco; font-size: 26px;'><td style='border-top-left-radius: 5px;'>Username</td><td>Email</td><td style='border-top-right-radius: 5px;'>Country</td></tr>";
        $i = 0;
        while($row = $result->fetch_assoc())
        {
            if($i % 2 == 0){
                echo "<tr class='solid' style='background-color: rgba(0,0,0,0.1); color: white; font-family: Monaco; font-size: 22px;'>";
                echo "\n<td width='33.33%'>" . $row["name"] . "</td>\n<td width='33.33%'>" . $row['email'] ."</td><td width='33.33%'>" . $row['country'] ."</td>\n";
                echo "</tr>\n";
            }
            else{
                echo "<tr class='solid' style='background-color: rgba(256,256,256,0.1); color: white; font-family: Monaco; font-size: 22px;'>";
                echo "\n<td width='33.33%'>" . $row["name"] . "</td>\n<td width='33.33%'>" . $row['email'] ."</td><td width='33.33%'>" . $row['country'] ."</td>\n";
                echo "</tr>\n";
            }
            $i++;
        }

        echo "</table>\n";
        echo "</div><br/>";
        $result->free();


        $db = dbConnect();

        $stmt = "SELECT name FROM user WHERE favTeam NOT IN (SELECT teamId FROM team)";
        $result = $db->query($stmt);

        echo "<div style='background-color: rgba(0,0,0,0.6); border-radius: 5px; padding: 21px;'>";
        echo "<h2 style='font-family: Monaco; color: white; font-size: 28px'>Users Without A Favorite Team:</h2></br>\n";

        echo "<table align='center' width='90%' border='0px' cellpadding='1px' style='border-collapse: collapse; border-radius: 5px;'>\n";
        echo "<tr class='solid' style='background-color: rgba(0,0,0,0.5); color: white; font-family: Monaco; font-size: 26px;'><td colspan='3' style='border-top-left-radius: 5px; border-top-right-radius: 5px;'>Username</td></tr>";
        while($row = $result->fetch_assoc())
        {
            echo "<tr class='solid' style='background-color: rgba(0,0,0,0.1); color: white; font-family: Monaco; font-size: 22px;'>";
            echo "\n<td width='33.33%' colspan='3'>" . $row["name"] . "</td>";
            echo "</tr>\n";
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