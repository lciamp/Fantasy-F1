<?php

require "config.php";

$db = dbConnect();

$raceName =  strip_tags($_POST['race']);

?>

<?php
startPage("Races - Results");


echo "<div class='middle' style='background-color: rgba(225,225,225,0.5); border-radius: 5px; padding: 10px; margin-bottom: 10px;'>";
        if($raceName != null){
                //echo "the if loop works\n";

                echo "<div style='background-color: rgba(0,0,0,0.6); border-radius: 5px; padding: 20px; align-items: center'>";


                echo "\n<table align='center' width='90%' border='0px' cellpadding='1px' style='border-collapse: collapse; border-radius: 5px;'>\n";
                echo "<th colspan=3 bgcolor='#ffffff' style='font-family: Monaco; font-style: inherit; font-size: 34px; border-top-left-radius: 5px; border-top-right-radius: 5px;'> 2014 " . $raceName . " Results</th>\n";

                echo "<tr style='background-color: rgba(5,5,5,.05);' font-family: Monaco; font-size: 26px'>\n<td align='center'><h2 style='font-family: Monaco; color: white; font-size: 28px'>First</h2></td>\n<td align='center'><h2 style='font-family: Monaco; color: white; font-size: 28px'>Second</h2></td>\n<td align='center'><h2 style='font-family: Monaco; color: white; font-size: 28px'>Third</h2></td>\n</tr>\n";

                echo "<tr bgcolor='#ffffff' style='opacity: .5; font-family: Monaco; font-size: 24px; border-bottom-left-radius: 5px; border-bottom-right-radius: 5px;'>\n";

                $stmt = "SELECT a.name AS 'first', b.name AS 'second', c.name AS 'third'  from drivers a, drivers b, drivers c, race where race.name = '$raceName' and a.driverId = first and b.driverId = second and c.driverId = third";
                $result = $db->query($stmt);
                $row = $result->fetch_assoc();

                echo "<td width='33.33%' style='border-bottom-left-radius: 5px; font-size: 26px;' align='center'>" . $row['first'] . "</td>\n";
                echo "<td width='33.33%' align='center' style='font-size: 26px;'>" . $row['second'] . "</td>\n";
                echo "<td width='33.33%' class='none' align='center' style='border-bottom-right-radius: 5px; font-size: 26px;' >" . $row['third'] . "</td>\n";

                $result->free();
                echo "</tr>\n</table>\n";
                echo "</div></br>";
            }


        echo "<div style='background-color: rgba(0,0,0,0.6); border-radius: 5px; padding: 18px;'>";

        echo "<h2 style='font-family: Monaco; color: white; font-size: 28px'>Select a Race to View the Results:</h2></br>\n";
        echo "<form action='raceResults' method='POST'>\n";


        echo "<p>";
		echo "<select name='race'>\n";

        $stmt = "SELECT name FROM race";
        $result = $db->query($stmt);

        while($rows = $result->fetch_assoc())
        {
            echo "<option value='".$rows['name']."'";
            if($rows['name'] == $raceName)
                echo " selected='".$raceName."'";
            echo ">" . $rows['name']. "</option>\n";
        }

        $result->free();
        $db->close();
        echo "</select>\n";
            echo "</p>";
        echo "<input type='submit' value='Results '>\n";
        echo "</form>\n";
        echo "</div>";

    echo "</div>";
endPage();
?>