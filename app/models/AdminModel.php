<?php 
namespace app\models;

class AdminModel{
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAdmins() {
        return $this->db->get('admins');
    }

    public function addAdmins() {
        return $this->db->insert('admins', $data);
    }

    public function getById() {
        return $this->db->where('id', $id)->getOne('admins');
    }

    public function updateAdmins() {
        $this->db->where('id', $id);
        return $this->db->update('admins', $data);
    }

    public function deleteAdmins() {
        $this->db->where('id', $id);
        return $this->db->delete('admins');
    }


}
?>