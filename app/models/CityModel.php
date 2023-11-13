<?php

class CityModel{
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getCity() {
        return $this->db->get('citys');
    }

    public function addCity($data) {
        return $this->db->insert('citys', $data);
    }


    public function deleteCity($id) {
        $this->db->where('id', $id);
        return $this->db->delete('citys');
    }

}