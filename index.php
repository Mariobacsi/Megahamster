<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Megahamster</title>
</head>
<body>

<?php
require("classes/Room.php")
?>

<div class="wrapper">

    <h1>Megahamster</h1>
    <table>
        <th>Raum</th>
        <th>Preis</th>
        <?php
        $rooms [] = new Room("The Flat", 149);
        $rooms [] = new Room("The Room", 119);
        $rooms [] = new Room("The Pit", 69);
        foreach ($rooms as $room) {
            echo <<<ROOM
<tr>
<td>{$room->getName()}</td>
<td>{$room->getPreis()}</td>
</tr>
ROOM;
        }

        ?>
    </table>

</div>
</body>
</html>