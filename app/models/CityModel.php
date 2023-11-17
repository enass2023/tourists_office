<?php
namespace app\models;
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

    
    public function deleteCity($id) {
        $this->db->where('id', $id);
        return $this->db->delete('citys');
    }
    public function searchCity($search) {
        $this->db->where('name', $searchTerm, 'LIKE');
        return $this->db->get('citys');
    }


}