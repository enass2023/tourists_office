<?php

class AirCompanyModel{
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getCompany() {
        return $this->db->get('aircompanys');
    }

    public function addCompany($data) {
        return $this->db->insert('aircompanys', $data);
    }


    public function updatCompany($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('aircompanys', $data);
    }

    public function deletCompany($id) {
        $this->db->where('id', $id);
        return $this->db->delete('aircompanys');
    }
   





}
?>