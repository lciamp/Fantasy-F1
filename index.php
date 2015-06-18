<?php

require "config.php";

session_start();

$db = dbConnect();

startPage("Fantasy Formula 1")
?>
    <div class="middle" style="background-color: rgba(225,225,225,0.5); border-radius: 5px; padding: 10px">


    <div style='background-color: rgba(0,0,0,0.6); border-radius: 5px; padding: 28px; align-items: center'>
<p class="f1">
    Once all cars have safely taken up their grid positions, five red lights will appear in sequence at one-second intervals.<br/><br/>
    These red lights are then extinguished to signal the start of the race.<br/><br/>
    Welcome To Five Red Lights!
</p>
    </div>


</div>

<?php
endPage();
?>