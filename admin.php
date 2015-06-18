<?php



require "config.php";

startPage("Admin");



echo "<div class='middle' style='background-color: rgba(225,225,225,0.5); border-radius: 5px; padding: 10px'>";

    echo "<div style='background-color: rgba(0,0,0,0.6); border-radius: 5px; padding: 21px;'>";


    echo "<a href='addPoints' class='fer' style='font-size: 30px; font-family: Monaco'>Add Points to Driver</a><br/>";
    echo "<a href='insertUser' class='fer' style='font-size: 30px; font-family: Monaco'>Insert a User</a><br/>";
    echo "<a href='favDriver' class='fer' style='font-size: 30px; font-family: Monaco'>Choose Favorite Driver</a><br/>";
    echo "<a href='makePick' class='fer' style='font-size: 30px; font-family: Monaco'>Make User Picks</a><br/>";



    echo "</div>";







    ?>
</div>
<?php
endPage();
?>
