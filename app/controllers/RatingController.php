<?php
namespace app\controllers;
class RatingController{
    private $model;
    public function __construct($db){
        $this->model = new app\models\RatingModel($db);
    }
    public function addRate(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
        $data = ["hotel_id"=>$_POST["hotel_id"],"customer_id"=>$_POST["customer_id"],
                 "rate"=>$_POST["rate"], "comment"=>$_POST["comment"]];
        $this->model->addRate($data);
    }
        else
         echo "No Data To Be Add";
    }
    public function deleteRate(){
        if($_SERVER["REQUEST_METHOD"] == "POST")
         $this->model->deleteRate($_POST["id"]);
        else
         echo "No Data To Be Delete";
    }
    public function updateRate(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
         $data = ["rate"=>$_POST["rate"],"comment"=>$_POST["comment"]];
         $this->model->updateRate($_POST["id"],$data);
        }
        else 
         echo "No Data To Be Update";
    }
    public function getAllRatings(){
        $d = $this->model->getAllRatings();
        echo json_encode($d);
    }
    public function getHotelsRatingsOrdered(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
         $d = $this->model->getHotelsRatingsOrdered($_POST["orderway"]);
         echo json_encode($d);
        }
        else 
         echo "There Is No Way To Order";
    }
    public function getCustomerRatingsOrdered(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
           $d = $this->model->getCustomerRatingsOrdered($_POST["customer_id"],$_POST["orderway"]);
           echo json_encode($d);
        }
        else
         echo "No Data To Works On";
    }
    public function getMaxRatedHotels(){
        $mar = $this->model->getAvgRates("Desc");
        $ar = [];
        $mx = $mar[0]["rate"];
        foreach($mar as $ma)
            if($ma["rate"] == $mx)
             array_push($ma);
            else
            break;
        echo json_encode($ar);
    }
    public function getMinRatedHotels(){
        $mnrs = $this->model->getAvgRates("asc");
        $ar = [];
        $mn = $mnrs[0]["rate"];
        foreach($mnrs as $mnr)
            if($mnr["rate"] == $mn)
             array_push($mnr);
            else
            break;
        echo json_encode($ar);
    }
}