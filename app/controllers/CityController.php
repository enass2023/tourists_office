<?php
namespace app\controllers;
class CityController{
    use MakeItJson;
    use IdsToData;
    private $city_model;
    public function __construct($city_model){
        $this->model=$city_model;}
    
        public function addCity(){
        if($_SERVER["REQUEST_METHOD"]== "POST"){
         $this->testPost(["name","country"]);
         $data=["name"=>$_POST["name"],"country"=>$_POST["country"]];
           echo $this->toJson ($this->model->addCity($data));
        }else
        echo "unavailable";

    }
    public function deleteCity(){
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $this->testPost(["id"]);
            echo $this->toJson($this->model->deleteCity($_POST["id"]));
           
        }else
        echo "unavailable";
    }

    public function gitAllCity(){
        $data = $this->model->getcity();
        $data = $this->getData($data);
        echo $this->toJson($data);
    }


   

}
?>