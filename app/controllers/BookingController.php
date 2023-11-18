<?php
namespace app\controllers;

class BookingController{

    use MakeItJson;
    use IdsToData;
    
    private $booking_model;
    private $ticket_model;
    private $customer_model;
    private $hotel_model;
    private $city_model;
    private $company_model;
  
    public function  __construct($booking_model,$ticket_model,$customer_model,$hotel_model,$company_model,$city_model){
    
                 $this->booking_model=$booking_model;
                 $this->ticket_model=$ticket_model;
                 $this->customer_model=$customer_model;
                 $this->hotel_model=$hotel_model; 
                 $this->company_model=$company_model; 
                 $this->city_model=$city_model; 

}

public function addbooking()  {
    if ($_SERVER['REQUEST_METHOD'] == "POST" ) {
        $this->testPost(["ticket_id","customer_id","hotel_id","book_date"]);
        $data = [
            "ticket_id"=>$_POST['ticket_id'],
            "customer_id"=>$_POST['customer_id'],
            "hotel_id"=>$_POST['hotel_id'],
            "book_date"=>$_POST['book_date'],
        ];

        echo $this->toJson($this->booking_model->addBookings($data));
    }
    else 
    echo "No Data To Be Add";
}

public function deleteBooking(){
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
    $this->testPost(["id"]);
    echo $this->toJson($this->booking_model->deleteBookings($_POST["id"]));
    }
    else 
     echo "No Data To Be Delete";
}

public function  updateBooking(){
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $this->testPost(["ticket_id","customer_id","hotel_id","book_date"]);
        $data = [
            "ticket_id"=>$_POST['ticket_id'],
            "customer_id"=>$_POST['customer_id'],
            "hotel_id"=>$_POST['hotel_id'],
            "book_date"=>$_POST['book_date'],
        ];
        echo $this->toJson($this->booking_model->updateBookings($_POST["id"],$data));

    }
    else 
     echo "No Data To Be Update With";
}
//--------------------Get Method-------------------------//
public function getallbooking() {
    $data = $this->booking_model->getBookings();
    
    $data = $this->getData($data);
    echo $this->toJson($data);
  }

  public function getBookingByTicketId() {
     if($_SERVER["REQUEST_METHOD"] == "POST"){
        $this->testPost(["ticket_id"]);
        $data = $this->booking_model->getBookingsByTicketId($_POST["ticket_id"]);
        $data = $this->getData($data);
        echo $this->toJson($data);
        }
  }

  
public function getBookingByCustomerId() {
    if($_SERVER["REQUEST_METHOD"] == "POST"){
     $this->testPost(["customer_id"]);
     $data = $this->booking_model->getBookingsByCustomerId($_POST["customer_id"]);
     $data = $this->getData($data);
     echo $this->toJson($data);
 }
 }

 public function getBookingByHotelId() {
     if($_SERVER["REQUEST_METHOD"] == "POST"){
         $this->testPost(["hotel_id"]);
         $data = $this->booking_model->getBookingsByHotelId($_POST["hotel_id"]);
         $data = $this->getData($data);
         echo $this->toJson($data);
     }
 }
}

?>