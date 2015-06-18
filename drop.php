<?php

require "config.php";

$db = dbConnect();

$raceName =  strip_tags($_POST['race']);

startPage("Drop Down");

if($raceName != NULL) {
    echo "\n<table frame='box' width='50%' border='1px' style='border-collapse: collapse'>\n";
    echo "<th colspan='3' bgcolor=white>" . $raceName . " Results:</th>\n";
    echo "<tr bgcolor='#a9a9a9'>\n<td>First</td>\n<td>Second</td>\n<td>Third</td>\n</tr>\n";

    $stmt = "SELECT first, second, third FROM race WHERE name ='$raceName'";

    $result = $db->query($stmt);
    $row = $result->fetch_assoc();

    echo "<tr>\n";

    echo "<td width='33.33%'>" . getDriverName($row['first']) . "</td>\n";
    echo "<td width='33.33%'>" . getDriverName($row['second']) . "</td>\n";
    echo "<td width='33.33%'>" . getDriverName($row['third']) . "</td>\n";

    $result->free();
    echo "</tr>\n</table>\n";
}

$stmt = "SELECT name FROM race";
$result = $db->query($stmt);

echo "<h2>Select a Race to View the Results:</h2>\n";
echo "<form action='drop.php' method='POST'>\n";
echo "<select name='race'>\n";

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
echo "<input type='submit' value='submit'>\n";
echo "</form>\n";

endPage();