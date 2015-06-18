<?php

require "config.php";

$db = dbConnect();

$team =  strip_tags($_POST['team']);

$stmt = "SELECT teamId, name From team";
$result = $db->query($stmt);

startPage("User Input");

echo "<table align='center' frame='box' width='30%' border='1px' style='border-collapse: collapse'>";
echo "<th colspan='3' bgcolor='#a9a9a9'>Teams:</th>";

while($row = $result->fetch_assoc())
{
    if($row['teamId'] % 2 == 0)
        echo "<tr bgcolor='#a9a9a9'>";
    else
        echo "<tr bgcolor='white'>";
    echo "<td>" . $row["name"] . "</td>";
    echo "</tr>";
}

echo "</table><br/><br/>";

$result->free();

if($team != NULL) {
    $stmt = "SELECT driverId, name FROM drivers WHERE team = (SELECT teamId FROM team WHERE name = '$team')";
    $result = $db->query($stmt);
    echo "<table align='center' frame='box' width='30%' border='1px' style='border-collapse: collapse'>";
    echo "<th colspan='3' bgcolor='#a9a9a9'>".$team." Drivers:</th>";

    while ($row = $result->fetch_assoc()) {
        if ($row['driverId'] % 2 == 0)
            echo "<tr bgcolor='#a9a9a9'>";
        else
            echo "<tr bgcolor='white'>";
        echo "<td>" . $row["name"] . "</td>";
        echo "</tr>";
    }

    echo "</table>";

    $result->free();
}

$db->close();

?>

<h2 align="center">Enter A Team to Display The Drivers of That Team</h2>
<h3 align="center">Check Your Spelling!!!</h3>

<table align="center">
    <form action="userInput.php" method="post">
        <tr>
        <td>Team Name:</td><td><input type="text" name="team"></td>
        </tr>
        <tr>
        <td></td><td><input type="submit" value="submit"></td>
        </tr>
    </form>
</table>
<?php
endPage();
?>