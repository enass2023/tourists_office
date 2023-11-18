<?php
namespace app\controllers;
class HotelController{
    use MakeItJson;
    use IdsToData;
    private $hotel_model,$city_model;
    public function __construct($hotel_model,$city_model){
        $this->hotel_model = $hotel_model;
        $this->city_model = $city_model;
    }
    public function addHotel(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
         $this->testPost(["name","city_id"]);
         $data = ["name"=>$_POST["name"],"city_id" => $_POST["city_id"]];
         echo $this->toJson($this->hotel_model->addHotel($data));
        }
        else 
         echo "No Data To Be Add";
    }
    public function deleteHotel(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
         $this->testPost(["id"]);
         echo $this->toJson($this->hotel_model->deleteHotel($_POST["id"]));
        }
        else 
         echo "No Data To Be Delete";
    }
    public function getAllHotels(){
        $data = $this->hotel_model->getAllHotels();
        $data = $this->getData($data);
        echo $this->toJson($data);
    }
    public function getAllHotelsInCity(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
        $this->testPost(["city_id"]);
        $data = $this->hotel_model->getAllHotelsInCity($_POST["city_id"]);
        $data = $this->getData($data);
        echo $this->toJson($data);
    }
        else
        echo "No Data To Get On";
    }
}?>