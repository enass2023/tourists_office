<?php
spl_autoload_register(function ($class){
    require "./$class.php";
});
require_once "./lib/DB/MysqliDb.php";
$config = require './config/config.php';
$db = new MysqliDb(
    $config['db_host'],
    $config['db_user'],
    $config['db_pass'],
    $config['db_name']
);

$hotel_controller = new app\controllers\HotelController($db);
$rating_controller = new app\controllers\RatingController($db);
$ticket_controller = new app\controllers\TicketController($db);

switch($_SERVER["REQUEST_URI"]){
    case "/addhot":
        $hotel_controller->addHotel();
        break;
    case "/deletehot":
        $hotel_controller->deleteHotel();
        break;
    case "/seeallhot":
        $hotel_controller->getAllHotels();
        break;
    case "/seecithot": 
        $hotel_controller->getAllHotelsInCity();
        break;
    case "/addrat":
        $rating_controller->addRate();
        break;
    case "/deleterat":
        $rating_controller->deleteRate();
        break;
    case "/updaterat":
        $rating_controller->updateRate();
        break;
    case "/seeallrat":
        $rating_controller->getAllRatings();
        break;
    case "/seehotratord":
        $rating_controller->getHotelsRatingsOrdered();
        break;
    case "/seecustratord":
        $rating_controller->getCustomerRatingsOrdered();
        break;
    case "/mxrathot":
        $rating_controller->getMaxRatedHotels();
        break;
    case "/mnrathot": 
        $rating_controller->getMinRatedHotels();
        break;
}


?>