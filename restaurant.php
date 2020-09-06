<?php
header("Content-type: application/json");
require 'Data.php';

$req = $_GET['req'] ?? null;

if ($req) {
    $jsonData = file_get_contents("restaurant.json");
    $dataList = json_decode($jsonData, true)['menu_items'];
    try {
        $restaurant = new Restaurant($dataList);
    } catch (Exception $th) {
        echo json_encode([$th->getMessage()]);
        return;
    }
}

switch ($req) {
    case 'name_list':
        echo $restaurant->getITEMName();
        break;

    case "restaurant":
        $menuid = $_GET['id'] ?? null;
        echo $restaurant->getITEMid($menuid);
        break;
    
    default:
        echo json_encode(["In-valid request"]);
        break;
}

?>