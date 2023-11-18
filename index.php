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


//add switch
switch($_SERVER["REQUEST_URI"]){
    case "/addhot":
        $hotel_controller->addHotel();
        break;
    //-----------done from hotels table add--------//
    case "/addrat":
        $rating_controller->addRate();
        break;
    //-----------done from ratings table add-------//
    case "/addbooking":
        $booking_controller->addbooking();
        break;
    //-----------done from booking table add-------//
    case "/ddmi":
        $admin_controller->addAdmain();
        break;
    //-----------done from admin table add---------//
    case "/addcom":
        $company_controller->addCompany();
        break;
    //-----------done from company table add-----------//
    case "/adcus":
        $customer_controller->addCustomer();
        break;  
    //--------done from customer table add------------//
    case "/adcit":
        $city_controller->addCity();
        break;
    //----------done from city table add--------------//
    case "/adtick":
        $ticket_controller->addTicket();
        break;
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
    case "/deletebooking":
        $booking_controller->deleteBooking();
        break;
    //---------done from ratings table delete------//
    case "/dedmi":
        $admin_controller->deleteAdmin();
          break;
    //---------done from admin table delete--------//
    case"/dcit":
        $city_controller->deleteCity();
        break;
    //--------done from city table delete---------//
    case "/decom":
        $company_controller->deleteCompany();
        break;
    //-------done from company table delete------//
    case "/deCus":
        $customer_controller->deleteCustomer();
        break; 
    //------done from customer table delete-------//
    case "/deltick":
        $ticket_controller->deleteTicket();
        break;
}

//update switch
switch($_SERVER["REQUEST_URI"]){
    case "/updaterat":
        $rating_controller->updateRate();
        break;
    //---------done from ratings table update------//    
    case "/updatebooking":
         $booking_controller->updateBooking();
         break;
    //-------------done from booking table update-------//   
    case"/updmi":
        $admin_controller->updateAdmain();
        break; 
    //-------------done from admin table update-----------//
    case "/upCus":
        $customer_controller->updateCustomer();
        break;
    //-------------done from customer table update--------//
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
    case "/ticomp": 
        $ticket_controller-> getTicketByCompanyId();
        break;
    case "/gtick":
        $ticket_controller->get();
        break;
        case "/ctick":
        $ticket_controller->getTicketByCityId();
        break;
//----------------------done from ticket tabel select----------------------//
    case"/gdmi":
        $admin_controller->gitAllAdmain();
        break;
//----------------------done from admin tabel select----------------------//
    case"/gcit":
        $city_controller->gitAllCity();
        break;
//----------------------done from city tabel select----------------------//
    case "/secom":
        $company_controller->getCompany();
        break;
//----------------------done from company tabel select----------------------//
    case "/seeallcus":
        $customer_controller->getCustomer();
        break;   
//----------------------done from customer tabel select----------------------//
    case "/getallbooking":
        $booking_controller->getallbooking();
        break;  
    case "/getbookingbyticket":
        $booking_controller->getBookingByTicketId();
        break;  

     case "/getbookingbycustomer":
         $booking_controller->getBookingByCustomerId();
         break;  

     case "/getbookingbyhotel":
        $booking_controller->getBookingByHotelId();
         break;  
//-------------------------------------------The End--------------------------------------------//
}


?>