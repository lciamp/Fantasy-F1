<?php

require "config.php";

$db = dbConnect();

$raceName =  strip_tags($_POST['raceName']);
$raceLocation =  strip_tags($_POST['raceLocation']);
$raceDate =  strip_tags($_POST['raceDate']);
$first =  strip_tags($_POST['first']);
$second =  strip_tags($_POST['second']);
$third =  strip_tags($_POST['third']);

if($raceName && $raceDate && $raceLocation && $first && $second && $third != NULL) {

    $stmt = "INSERT INTO race VALUES ('','$raceName', '$raceLocation', '$raceDate', '$first', '$second', '$third' )";

    $db->query($stmt);
}
$db->close();

startPage("Insert");
?>

<h1>Insert a Race:</h1>

<form action="insert.php" method="post">

    <table>
        <tr>
        <td>Race Name:</td><td> <input type="text" name="raceName"></td>
        </tr>
        <tr>
    <td>Race Location:</td><td> <input type="text" name="raceLocation"></td>
        </tr>
        <tr></tr>
    <td>Race Date:</td><td> <input type="text" name="raceDate"></td>
        </tr>
        <tr>
    <td>First:</td><td> <input type="text" name="first"></td>
        </tr>
        <tr>
    <td>Second:</td><td> <input type="text" name="second"></td>
        </tr>

        <tr>
    <td>Third:</td><td><input type="text" name="third"></td>
        </tr>
        <tr>
    <td></td><td><input type="submit" value="submit"></td>
        </tr>
    </table>
</form>

<?php

endPage();

?>

