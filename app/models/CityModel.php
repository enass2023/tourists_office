<?php
namespace app\models;
class CityModel{
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getcity() {
        return $this->db->get("citys");
    }
   
    public function addCity($data) {
        return $this->db->insert('citys', $data);
    }

    public function getById($id){
        return $this->db->where("id",$id)->getOne("citys");
    }
    public function deleteCity($id) {
        $this->db->where('id', $id);
        return $this->db->delete('citys');
    }

}