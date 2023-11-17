<?php
namespace app\controllers;
class RatingController{
    use MakeItJson;
    use IdsToData;
    private $rating_model,$hotel_model,$customer_model;
    public function __construct($rating_model,$hotel_model,$customer_model){
        $this->rating_model = $rating_model;
        $this->hotel_model = $hotel_model;
        $this->customer_model = $customer_model;
    }
    public function addRate(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
        $data = ["hotel_id"=>$_POST["hotel_id"],"customer_id"=>$_POST["customer_id"],
                 "rate"=>$_POST["rate"], "comment"=>$_POST["comment"]];
        echo $this->toJson($this->rating_model->addRate($data));
    }
        else
         echo "No Data To Be Add";
    }
    public function deleteRate(){
        if($_SERVER["REQUEST_METHOD"] == "POST")
         echo $this->toJson($this->rating_model->deleteRate($_POST["id"]));
        else
         echo "No Data To Be Delete";
    }
    public function updateRate(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
         $data = ["rate"=>$_POST["rate"],"comment"=>$_POST["comment"]];
         echo $this->toJson($this->rating_model->updateRate($_POST["id"],$data));
        }
        else 
         echo "No Data To Be Update";
    }
    public function getAllRatings(){
        $data = $this->rating_model->getAllRatings();
        $data = $this->getData($data);
        echo $this->toJson($data);
    }
    public function getHotelsRatingsOrdered(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
         $data = $this->rating_model->getHotelsRatingsOrdered($_POST["orderway"]);
         $data = $this->getData($data);
         echo $this->toJson($data);
        }
        else 
         echo "There Is No Way To Order";
    }
    public function getCustomerRatingsOrdered(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
           $data = $this->rating_model->getCustomerRatingsOrdered($_POST["customer_id"],$_POST["orderway"]);
           $data = $this->getData($data);
           echo $this->toJson($data);
        }
        else
         echo "No Data To Works On";
    }
    public function getMaxRatedHotels(){
        $mar = $this->rating_model->getAvgRates("Desc");
        $ar = [];
        $mx = $mar[0]["rate"];
        foreach($mar as $ma)
            if($ma["rate"] == $mx)
             array_push($ar,$ma);
            else
            break;
        $ar = $this->getData($ar);
        echo $this->toJson($ar);
    }
    public function getMinRatedHotels(){
        $mnrs = $this->rating_model->getAvgRates("asc");
        $ar = [];
        $mn = $mnrs[0]["rate"];
        foreach($mnrs as $mnr)
            if($mnr["rate"] == $mn)
             array_push($ar,$mnr);
            else
            break;
        $ar = $this->getData($ar);
        echo $this->toJson($ar);
    }
}