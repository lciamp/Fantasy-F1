<?php

require "config.php";

$db = dbConnect();

$name =  strip_tags($_POST['name']);
$email =  strip_tags($_POST['email']);
$country =  strip_tags($_POST['country']);
$teamId =  intval(strip_tags($_POST['teamId']));

startPage("Admin - Insert User");

echo "<div class='middle' style='background-color: rgba(225,225,225,0.5); border-radius: 5px; padding: 10px'>";


echo "<div align='center' style='background-color: rgba(0,0,0,0.6); border-radius: 5px; padding: 21px;'>";

if($name && $email && $country && $teamId != NULL)
{
    $stmt = "INSERT INTO user VALUES(NULL, '$name', '$email', '$country', 0, '$teamId')";
    $db->query($stmt);


    echo "<h2 style='font-family: Monaco; color: white; font-size: 28px'>User Added!!!</h2>\n";
}


echo "<h2 style='font-family: Monaco; color: white; font-size: 28px'>Insert a New User</h2>\n";

echo<<<END
    <form action="insertUser" method="post">

        <table>
            <tr>
                <td style='font-family: Monaco; color: white; font-size: 18px'>Name:</td><td> <input type="text" name="name"></td>
            </tr>
            <tr>
                <td style='font-family: Monaco; color: white; font-size: 18px'>Email:</td><td> <input type="text" name="email"></td>
            </tr>
            <tr></tr>
            <td style='font-family: Monaco; color: white; font-size: 18px'>Country:</td><td> <input type="text" name="country"></td>
            </tr>
            <tr>
            <td style='font-family: Monaco; color: white; font-size: 18px'>Favorite Team:   </td><td>
END;
                $stmt = "SELECT teamId, name FROM team";
                $result = $db->query($stmt);


                echo "<select name='teamId'>\n";
                echo "<option value=0>Don't Have One</option>";
                while($rows = $result->fetch_assoc())
                {
                    echo "<option value='".$rows['teamId']."'>" . $rows['name']. "</option>\n";
                }

                echo "</select>";
                $result->free();
echo "</td>";
echo "</tr>";
echo "<tr>";
            echo"    <td></td><td><input type='submit' value='submit'></td>";
            echo "</tr>";
        echo "</table>";
    echo "</form>";
echo "<a href='admin' class='fer' style='font-size: 30px; font-family: Monaco'>Back To Admin Page</a><br/>";
echo "</div>";
echo "</div>";

endPage();