<?php 
namespace app\EvaluationsModel ;

class EvaluationsModel{
    private $db;

    public function __construct($db)  {
        $this->db = $db;
    }

    public function getEvaluations(){
        return $this->db->get('Evaluations');
    }

    public function addEvaluation(){
        return $this->db->insert('Evaluations', $data);
    }

    public function updateEvaluation(){
        $this->db->where('id', $id);
        return $this->db->update('Evaluations', $data);
    }

    public function deleteEvaluation(){
        $this->db->where('id', $id);
        return $this->db->delete('Evaluations');
    }

    public function getEvaluationById($id) {
        return $this->db->where('id', $id)->getOne('Evaluations');
    }
}

?>