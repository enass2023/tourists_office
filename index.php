<?php
spl_autoload_register(function ($class){
    require "./$class.php";
});
require_once "./lib/DB/MysqliDb.php";
require_once "./config/BaseUrl.php";
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
$ticket_model = new app\models\TicketModel($db);
$company_model=new app\models\CompanyModel($db);
$admin_model=new app\models\AdminModel($db);
$booking_model = new  app\models\BookingModel($db);
//----------------------end of models-------------------------------//
$hotel_controller = new app\controllers\HotelController($hotel_model,$city_model);
$rating_controller = new app\controllers\RatingController($rating_model,$hotel_model,$customer_model);
$ticket_controller = new app\controllers\TicketController($ticket_model,$city_model,$company_model);
$admin_controller=new app\controllers\AdmainController($admin_model);
$city_controller=new  app\controllers\CityController($city_model);
$company_controller = new app\controllers\CompanyController($company_model);
$customer_controller = new app\controllers\CustomerController($customer_model);
$booking_controller = new app\controllers\BookingController($booking_model,$ticket_model,$customer_model,$hotel_model,$company_model,$city_model);
//---------------------end of controllers--------------------------//
$admin_controller->login();
define("BASE_URL",$url);
//add switch
switch($_SERVER["REQUEST_URI"]){
    case BASE_URL . "addhot":
        $hotel_controller->addHotel();
        break;
    //-----------done from hotels table add--------//
    case BASE_URL . "addrat":
        $rating_controller->addRate();
        break;
    //-----------done from ratings table add-------//
    case BASE_URL . "addbooking":
        $booking_controller->addbooking();
        break;
    //-----------done from booking table add-------//
    case BASE_URL . "ddmi":
        $admin_controller->addAdmain();
        break;
    //-----------done from admin table add---------//
    case BASE_URL . "addcom":
        $company_controller->addCompany();
        break;
    //-----------done from company table add-----------//
    case BASE_URL . "adcus":
        $customer_controller->addCustomer();
        break;  
    //--------done from customer table add------------//
    case BASE_URL . "adcit":
        $city_controller->addCity();
        break;
    //----------done from city table add--------------//
    case BASE_URL . "adtick":
        $ticket_controller->addTicket();
        break;
}

//delete switch
switch($_SERVER["REQUEST_URI"]){
    case BASE_URL . "deletehot":
        $hotel_controller->deleteHotel();
        break;
    //---------done from hotels tabel delete-------//
    case BASE_URL . "deleterat":
        $rating_controller->deleteRate();
        break;
    //---------done from ratings table delete------//
    case BASE_URL . "deletebooking":
        $booking_controller->deleteBooking();
        break;
    //---------done from ratings table delete------//
    case BASE_URL . "dedmi":
        $admin_controller->deleteAdmin();
          break;
    //---------done from admin table delete--------//
    case BASE_URL . "dcit":
        $city_controller->deleteCity();
        break;
    //--------done from city table delete---------//
    case BASE_URL . "decom":
        $company_controller->deleteCompany();
        break;
    //-------done from company table delete------//
    case BASE_URL . "deCus":
        $customer_controller->deleteCustomer();
        break; 
    //------done from customer table delete-------//
    case BASE_URL . "deltick":
        $ticket_controller->deleteTicket();
        break;
}

//update switch
switch($_SERVER["REQUEST_URI"]){
    case BASE_URL . "updaterat":
        $rating_controller->updateRate();
        break;
    //---------done from ratings table update------//    
    case BASE_URL . "updatebooking":
         $booking_controller->updateBooking();
         break;
    //-------------done from booking table update-------//   
    case BASE_URL . "updmi":
        $admin_controller->updateAdmain();
        break; 
    case BASE_URL . "logout" : 
        $admin_controller->logout();
        break;
    //-------------done from admin table update-----------//
    case BASE_URL . "upCus":
        $customer_controller->updateCustomer();
        break;
    //-------------done from customer table update--------//
}

//get switch
switch($_SERVER["REQUEST_URI"]){
    case BASE_URL . "seeallhot":
        $hotel_controller->getAllHotels();
        break;
    case BASE_URL . "seecithot": 
        $hotel_controller->getAllHotelsInCity();
        break;
    //-------------------done from hotels tabel select-------------------//
    case BASE_URL . "seeallrat":
        $rating_controller->getAllRatings();
        break;
    case BASE_URL . "seehotratord":
        $rating_controller->getHotelsRatingsOrdered();
        break;
    case BASE_URL . "seecustratord":
        $rating_controller->getCustomerRatingsOrdered();
        break;
    case BASE_URL . "mxrathot":
        $rating_controller->getMaxRatedHotels();
        break;
    case BASE_URL . "mnrathot": 
        $rating_controller->getMinRatedHotels();
        break;
    //----------------------done from ratings tabel select----------------------//
    case BASE_URL . "ticomp": 
        $ticket_controller-> getTicketByCompanyId();
        break;
    case BASE_URL . "gtick":
        $ticket_controller->get();
        break;
        case BASE_URL . "ctick":
        $ticket_controller->getTicketByCityId();
        break;
//----------------------done from ticket tabel select----------------------//
    case BASE_URL . "gdmi":
        $admin_controller->gitAllAdmain();
        break;
//----------------------done from admin tabel select----------------------//
    case BASE_URL . "gcit":
        $city_controller->gitAllCity();
        break;
//----------------------done from city tabel select----------------------//
    case BASE_URL . "secom":
        $company_controller->getCompany();
        break;
//----------------------done from company tabel select----------------------//
    case BASE_URL . "seeallcus":
        $customer_controller->getCustomer();
        break;   
//----------------------done from customer tabel select----------------------//
    case BASE_URL . "getallbooking":
        $booking_controller->getallbooking();
        break;  
    case BASE_URL . "getbookingbyticket":
        $booking_controller->getBookingByTicketId();
        break;  

     case BASE_URL . "getbookingbycustomer":
         $booking_controller->getBookingByCustomerId();
         break;  

     case BASE_URL . "getbookingbyhotel":
        $booking_controller->getBookingByHotelId();
         break;  
//-------------------------------------------The End--------------------------------------------//

case BASE_URL . "lout":
    $admin_controller->logout();
     break;  


}


?>