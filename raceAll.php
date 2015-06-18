<?php

require "config.php";


startPage("Races - All");

echo "<div class='middle' style='background-color: rgba(225,225,225,0.5); border-radius: 5px; padding: 10px; margin-bottom: 10px;'>";

    $db = dbConnect();

    $stmt = "SELECT raceId, name, location, date From race";
    $result = $db->query($stmt);

    echo "<div style='background-color: rgba(0,0,0,0.6); border-radius: 5px; padding: 20px;'>";
    echo "<table align='center' width='90%' border='0px' cellpadding='1px' style='border-collapse: collapse; border-radius: 5px;'>\n";
    echo "<tr class='solid' style='background-color: rgba(0,0,0,0.5); color: white; font-family: Monaco; font-size: 26px;'><td style='border-top-left-radius: 5px;'>Race</td><td>Location</td><td style='border-top-right-radius: 5px;'>Date</td></tr>";
    $i=0;
    while($row = $result->fetch_assoc())
    {
        if($i % 2 == 0){
            echo "<tr class='solid' style='background-color: rgba(0,0,0,0.1); color: white; font-family: Monaco; font-size: 20px;'>";
            echo "\n<td>" . $row["name"] . "</td>\n<td>" . $row['location'] ."</td>\n<td>";
            $date = $row['date'];
            echo getMonth(substr($date, 5, 2)) ."-";
            if(substr($date, 8, 1) == 0)
                echo substr($date, 9,1);
            else
                echo substr($date, 8,2);

            echo "-";
            echo substr($date, 0, 4);
            echo "</td>\n";
            echo "</tr>\n";
        }
        else{
            echo "<tr class='solid' style='background-color: rgba(256,256,256,0.1); color: white; font-family: Monaco; font-size: 20px;'>";
            echo "\n<td>" . $row["name"] . "</td>\n<td>" . $row['location'] ."</td>\n<td>";
            $date = $row['date'];
            echo getMonth(substr($date, 5, 2)) ."-";
            if(substr($date, 8, 1) == 0)
                echo substr($date, 9,1);
            else
                echo substr($date, 8,2);

            echo "-";
            echo substr($date, 0, 4);
            echo "</td>\n";
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