<?php

require "vendor/autoload.php";

use Mariobacsi\Megahamster\Living as Living;

$rooms [] = new Living\SquRoom("The Room", 49, 80, 50, 50);
$rooms [] = new Living\SquRoom("The Flat", 149, 120, 80, 80, 'food jars');
$rooms [] = new Living\OctRoom("The Pit", 69, 20, 'hamster training gloves', 'hamster punching bag');

function tableData(array $array)
{
    $out = "";
    foreach ($array as $row) {
        $out .= ($row->toListRow());
    }
    return $out;
}

if (isset($_GET['format']) && $_GET['format'] === "json") {
    header("content-type:application/json");
    echo json_encode($rooms);
} else {
    $tableData = tableData($rooms);
    $htmlTemplate = <<<site

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Megahamster</title>

    <link type="text/css" rel="stylesheet" href="app.css">
</head>
<body>
<div class="wrapper">
    <h1>Megahamster</h1>
    <table>
        <tr>
            <th>Raum</th>
            <th>Grundfläche [cm²]</th>
            <th>Preis</th>
            <th>Ausstattung</th>
        </tr>
        $tableData
    </table>
</div>
</body>
</html>

site;
    echo $htmlTemplate;
}
