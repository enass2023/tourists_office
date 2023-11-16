<?php
namespace app\controllers;
class HotelController{
    use MakeItJson;
    private $model;
    public function __construct($model){
        $this->model = $model;
    }
    public function addHotel(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
         $data = ["name"=>$_POST["name"],"city_id" => $_POST["city_id"]];
         echo $this->toJson($this->model->addHotel($data));
        }
        else 
         echo "No Data To Be Add";
    }
    public function deleteHotel(){
        if($_SERVER["REQUEST_METHOD"] == "POST")
         echo $this->toJson($this->model->deleteHotel($_POST["id"]));
        else 
         echo "No Data To Be Delete";
    }
    public function getAllHotels(){
        echo $this->toJson($this->model->getAllHotels());
    }
    public function getAllHotelsInCity(){
        if($_SERVER["REQUEST_METHOD"] == "POST")
        echo $this->toJson($this->model->getAllHotelsInCity($_POST["city_id"]));
        else
        echo "No Data To Get On";
    }
}