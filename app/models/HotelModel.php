<?php
class HotelModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }
    public function addHotel($data){
        return $this->db->insert($data);
    }
    public function deleteHotel($id){
        return $this->db->where("id",$id)->delete("hotels");
    }
    public function getAllHotels(){
        return $this->db->get("hotels");
    }
    public function getAllHotelsInCity($city_id){
        return $this->db->where("city_id",$city_id)->get("hotels");
    }
    public function getHotelById($id){
        return $this->db->where("id",$id)->getOne("hotels");
    }
}