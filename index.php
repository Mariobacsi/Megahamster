<?php


require "vendor/autoload.php";

use Mariobacsi\Megahamster\Living as Living;
use TYPO3Fluid\Fluid\View\TemplateView;

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
    $view = new TemplateView();
    $paths = $view->getTemplatePaths();
    $paths->setTemplatePathAndFilename('./Templates/main.html');

    /*var_dump($rooms[0]->getZusatzausstattung());*/
    $values["rooms"] = $rooms;
    $view->assignMultiple($values);

    echo $view->render();
}