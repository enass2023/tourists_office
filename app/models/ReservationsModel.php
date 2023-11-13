<?php
class ReservationsModel{
    private $db;
    public function __construct($db){
        $this->db = $db;
    }
    public function addReservation($data){
       return $this->db->insert("reservations",$data);
    }
    public function deleteReservation($id){
        $this->db->where("id",$id);
        return $this->db->delete("reservations");
    }
    public function updateReservation($id,$data){
        $this->db->where("id",$id);
       return $this->db->update("reservations",$data);
    }
    public function getReservation($customer_id){
        $this->db->where("customer_id",$customer_id);
        return $this->db->get("reservations");
    }
}