<?php
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

    public function getCompanyById($id) {
        return $this->db->where('id', $id)->getOne('companys');
    }

    public function updateCompany($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('companys', $data);
    }

    public function deleteCompany($id) {
        $this->db->where('id', $id);
        return $this->db->delete('companys');
    }

   
}