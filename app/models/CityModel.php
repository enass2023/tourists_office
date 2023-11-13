<?php

class CityModel{
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getCityById($id) {
        return $this->db->where('id', $id)->getOne('citys');
    }

    public function addCity($data) {
        return $this->db->insert('citys', $data);
    }

    public function updateCity($id,$data){
        $this->db->where("id",$id);
        return $this->db->update("citys",$data);
    }
    public function deleteCity($id) {
        $this->db->where('id', $id);
        return $this->db->delete('citys');
    }

}