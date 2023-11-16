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
$model = new app\models\HotelModel($db);
$hotel_controller = new app\controllers\HotelController($model);
$model = new app\models\RatingModel($db);
$rating_controller = new app\controllers\RatingController($model);
//$ticket_controller = new app\controllers\TicketController($db);

//add switch
switch($_SERVER["REQUEST_URI"]){
    case "/addhot":
        $hotel_controller->addHotel();
        break;
    //-----------done from hotels table add--------//
    case "/addrat":
        $rating_controller->addRate();
        break;
    //-----------done from ratings table select-------//
}
//delete switch
switch($_SERVER["REQUEST_URI"]){
    case "/deletehot":
        $hotel_controller->deleteHotel();
        break;
    //---------done from hotels tabel delete-------//
    case "/deleterat":
        $rating_controller->deleteRate();
        break;
    //---------done from ratings table delete------//
}
//update switch
switch($_SERVER["REQUEST_URI"]){
    case "/updaterat":
        $rating_controller->updateRate();
        break;
    //--------done frome ratings tabel update-----------//
}
//get switch
switch($_SERVER["REQUEST_URI"]){
    case "/seeallhot":
        $hotel_controller->getAllHotels();
        break;
    case "/seecithot": 
        $hotel_controller->getAllHotelsInCity();
        break;
    //-------------------done from hotels tabel select-------------------//
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
    //----------------------done from ratings tabel select----------------------//
}


?>