<?php
namespace app\controllers;
use MakeItJson;
class CityController{
    private $model;
    public function __construct($db){
        $this->model =new app\models\CityController($db);
    }
    public function addCity(){
        if($_SERVER["REQUEST_METHOD"]== "post"){
            $data=["name"=>$_POST["name"],"country"=>$_POST["country"]];
           echo $this->tojson ($this->model->addCity($data));
        }else
        echo "unavailable";

    }
    public function deleteCity(){
        if($_SERVER["REQUEST_METHOD"]== "post"){
            echo $this->toJson( $this->model->deleteCity($_POST["id"]));
           
        }else
        echo "unavailable";
    }
    public function gitAllCity(){
        echo $this->toJson ($this->model->gitAllCity());
        
    }
    public function searchCity($search){
        echo $this->tojson($this->model->searchCity($search));
    
    }

}
?>