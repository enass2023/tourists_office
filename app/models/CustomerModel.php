<?php
namespace app\CustomerModel ;

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

    public function get_coustomer_ById($id) {
        return $this->db->where('id', $id)->getOne('customers');
    }
}
    