<?php
namespace app\models;
class CompanyModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getCompany() {
        return $this->db->get('companys');
    }

    public function addCompany($data) {
        return $this->db->insert('companys', $data);
    }

    public function getById($id) {
        return $this->db->where('id', $id)->getOne('companys');
    }

    public function deleteCompany($id) {
        $this->db->where('id', $id);
        return $this->db->delete('companys');
    }

   
}