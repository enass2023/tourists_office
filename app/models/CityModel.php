<?php

class CityModel{
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getCity() {
        return $this->db->get('city');
    }

    public function addCity($data) {
        return $this->db->insert('city', $data);
    }


    public function deleteCity($id) {
        $this->db->where('id', $id);
        return $this->db->delete('city');
    }

}