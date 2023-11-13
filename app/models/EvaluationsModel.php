<?php 
namespace app\EvaluationsModel ;

class EvaluationsModel{
    private $db;

    public function __construct($db)  {
        $this->db = $db;
    }

    public function get_Evaluations(){
        return $this->db->get('Evaluations');
    }

    public function add_Evaluations(){
        return $this->db->insert('Evaluations', $data);
    }

    public function update_Evaluations(){
        $this->db->where('id', $id);
        return $this->db->update('Evaluations', $data);
    }

    public function delete_Evaluations(){
        $this->db->where('id', $id);
        return $this->db->delete('Evaluations');
    }

    public function get_Evaluations_ById($id) {
        return $this->db->where('id', $id)->getOne('Evaluations');
    }
}

?>