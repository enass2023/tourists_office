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
$hotel_model = new app\models\HotelModel($db);
$rating_model = new app\models\RatingModel($db);
$city_model = new app\models\CityModel($db);
$customer_model = new app\models\CustomerModel($db);
$admain_model= new app\models\AdminModel($db);
$city_model= new app\models\CityModel($db);
//----------------------end of models-------------------------------//
$hotel_controller = new app\controllers\HotelController($hotel_model,$city_model);
$rating_controller = new app\controllers\RatingController($rating_model,$hotel_model,$customer_model);
$admain_controller= new app\controllers\AdmainController($model);
$city_controller=new app\controllers\CityController($model);
//---------------------end of controllers--------------------------//

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
switch($_SERVER["REQUEST_URI"]){
    case "/allcity":
        $city_controller->getAllCity();
        break;
        case "/addcity":
            $city_controller->addcity();
            break;
            case "/deletecity":
                $city_controller->deletecity();
                break;
                case "/search":
                    $controller->searchCity($_POST['search']);
    break;

}
// -------done from citys tabel --------//
switch($_SERVER["REQUEST_URI"]){
  
        case "/addadmain":
            $admain_controller->addAdmain();
            break;
            case "/updateAdmain":
                $admain_controller->updateAdmain();
                break;
                case "/deleteAdmain":
                    $admain_controller->deleteAdmain();
                    break;
                    case "/editAdmain":
                        $admain_controller->editAdmain($_GET['id']);
                        break;
                        
}

// -------------done from amain table----------//





?>