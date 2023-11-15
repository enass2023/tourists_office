<?php
namespace app\controllers;
class HotelController{
    private $model;
    public function __construct($model){
        $this->model = $model;
    }
    public function addHotel(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
         $data = ["name"=>$_POST["name"],"city_id" => $_POST["city_id"]];
         $this->model->addHotel($data);
        }
        else 
         echo "No Data To Be Add";
    }
    public function deleteHotel(){
        if($_SERVER["REQUEST_METHOD"] == "POST")
         $this->model->deleteHotel($_POST["id"]);
        else 
         echo "No Data To Be Delete";
    }
    public function getAllHotels(){
        $d = $this->model->getAllHotels();
        echo json_encode($d);
    }
    public function getAllHotelsInCity(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
        $d = $this->model->getAllHotelsInCity($_POST["city_id"]);
        echo json_encode($d);
        }
        else
        echo "No Data To Get On";
    }
}