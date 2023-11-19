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

    public function addAdmins($data) {
        return $this->db->insert('admins', $data);
    }


    public function updateAdmins($id,$data) {
        $this->db->where('id', $id);
        return $this->db->update('admins', $data);
    }

    public function deleteAdmins($id) {
        $this->db->where('id', $id);
        return $this->db->delete('admins');
    }
    public function gitAdminByemailpassword($email,$password){
        return $this->db->where('email', $email)->where('password',$password)->getone('admins');

}
public function gitAdminBycard($card){
    return $this->db->where('card', $card)->getone('admins');

}

}
?>