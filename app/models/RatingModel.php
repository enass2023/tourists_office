<?php 
class RatingModel{
    private $db;

    public function __construct($db)  {
        $this->db = $db;
    }
    public function addRate($data){
        return $this->db->insert("ratings",$data);
    }
    public function deleteRate($id){
        return $this->db->where("id",$id)->delete("ratings");
    }
    public function updateRate($id,$data){
        return $this->db->where("id",$id)->update("ratings",$data);
    }
    public function getAllRatings(){
        return $this->get("ratings");
    }
    public function getHotelsRatingsOrdered($orderway){//asc or Desc
        return $this->db->orderBy("rate",$orderway)->get("ratings",null,["hotel_id","rate","comment"]);
    }
    public function getCustomerRatingsOrdered($customer_id,$orderway){
        return $this->db->orderBy("rate",$orderway)->where("customer_id",$customer_id)->get("ratings");
    }
    public function getAvgRates($orderway){
        return $this->db->groupBy("hotel_id")->orderBy("AVG(rate)",$orderway)->get("ratings",null,["hotel_id","AVG(rate)"]);
    }
}

?>