<?php
namespace app\CustomerModel ;

class CustomerModel{
    private $db;

    public function __construct($db) {
        $this->db = $db ;
    }

    public function getCustomers(){
        return $this->db->get("customers");
    }

    public function addCustomer($data){
        return $this->db->insert('customers', $data);
    }    

    public function updateCustomer($id,$data){
        $this->db->where('id', $id);
        return $this->db->update('customers', $data);
    }    

    public function deleteCustomer($id){
        $this->db->where('id', $id);
        return $this->db->delete('customers');
    }    

    public function getCustomerByEmail($email) {
        return $this->db->where('id', $email)->getOne('customers');
    }
}
    