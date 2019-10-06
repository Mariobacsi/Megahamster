<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Megahamster</title>

    <link type="text/css" rel="stylesheet" href="app.css">
</head>
<body>

<?php
require("classes/Room.php");
require("classes/OctRoom.php");
require("classes/SquRoom.php");
?>

<div class="wrapper">

    <h1>Megahamster</h1>
    <table>
        <tr>
            <th>Raum</th>
            <th>Grundfläche [cm²]</th>
            <th>Preis</th>
            <th>Ausstattung</th>
        </tr>
        <?php
        $rooms [] = new SquRoom("The Room", 49, 80, 50, 50);
        $rooms [] = new SquRoom("The Flat", 149, 120, 80, 80, 'food jars');
        $rooms [] = new OctRoom("The Pit", 69, 20, 'hamster training gloves', 'hamster punching bag');
        foreach ($rooms as $room) {
            echo <<<ROOM
            <tr>
            <td>{$room->getName()}</td>
            <td>{$room->berechneGrundfläche()}</td>
            <td>{$room->getPreis()}</td>
            <td>{$room->getZusatzausstattung()}</td>
            </tr>
            ROOM;
        }
        ?>
    </table>

</div>
</body>
</html>