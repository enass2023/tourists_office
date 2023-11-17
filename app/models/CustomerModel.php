<?php
namespace app\models ;

class CustomerModel{
    private $db;

    public function __construct($db) {
        $this->db = $db ;
    }

    public function get_costomer(){
        return $this->db->get('customers');
    }

    public function add_costomer(){
        return $this->db->insert('customers', $data);
    }    

    public function update_coustomer(){
        $this->db->where('id', $id);
        return $this->db->update('customers', $data);
    }    

    public function delete_coustomer(){
        $this->db->where('id', $id);
        return $this->db->delete('customers');
    }    

    public function getById($id) {
        return $this->db->where('id', $id)->getOne('customers');
    }
}
    