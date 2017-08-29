<?php 

require_once './src/ParrotApi.php';

$parrotApi = new ParrotApi();

if (empty($_POST) && empty($_GET)) {
    $parrotApi->noDataRequest()->toJson();
} else if (empty($_POST)) {
    $parrotApi->getRequest($_GET)->toJson();
} else if (empty($_GET)) {
    $parrotApi->postRequest($_POST)->toJson();
}