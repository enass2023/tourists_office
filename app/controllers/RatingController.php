<?php
namespace app\controllers;
class RatingController{
    use MakeItJson;
    private $model;
    public function __construct($model){
        $this->model = $model;
    }
    public function addRate(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
        $data = ["hotel_id"=>$_POST["hotel_id"],"customer_id"=>$_POST["customer_id"],
                 "rate"=>$_POST["rate"], "comment"=>$_POST["comment"]];
        echo $this->toJson($this->model->addRate($data));
    }
        else
         echo "No Data To Be Add";
    }
    public function deleteRate(){
        if($_SERVER["REQUEST_METHOD"] == "POST")
         echo $this->toJson($this->model->deleteRate($_POST["id"]));
        else
         echo "No Data To Be Delete";
    }
    public function updateRate(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
         $data = ["rate"=>$_POST["rate"],"comment"=>$_POST["comment"]];
         echo $this->toJson($this->model->updateRate($_POST["id"],$data));
        }
        else 
         echo "No Data To Be Update";
    }
    public function getAllRatings(){
        echo $this->toJson($this->model->getAllRatings());
    }
    public function getHotelsRatingsOrdered(){
        if($_SERVER["REQUEST_METHOD"] == "POST")
         echo $this->toJson($this->model->getHotelsRatingsOrdered($_POST["orderway"]));
        else 
         echo "There Is No Way To Order";
    }
    public function getCustomerRatingsOrdered(){
        if($_SERVER["REQUEST_METHOD"] == "POST")
           echo $this->toJson($this->model->getCustomerRatingsOrdered($_POST["customer_id"],$_POST["orderway"]));
        else
         echo "No Data To Works On";
    }
    public function getMaxRatedHotels(){
        $mar = $this->model->getAvgRates("Desc");
        $ar = [];
        $mx = $mar[0]["rate"];
        foreach($mar as $ma)
            if($ma["rate"] == $mx)
             array_push($ar,$ma);
            else
            break;
        echo $this->toJson($ar);
    }
    public function getMinRatedHotels(){
        $mnrs = $this->model->getAvgRates("asc");
        $ar = [];
        $mn = $mnrs[0]["rate"];
        foreach($mnrs as $mnr)
            if($mnr["rate"] == $mn)
             array_push($ar,$mnr);
            else
            break;
        echo $this->toJson($ar);
    }
}