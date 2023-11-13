<?php

class JourneyModel{
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getJourney() {
        return $this->db->get('journeys');
    }

    public function addJourney($data) {
        return $this->db->insert('journeys', $data);
    }


    public function updatJourney($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('journeys', $data);
    }

    public function deleteJourney($id) {
        $this->db->where('id', $id);
        return $this->db->delete('journeys');
    }

}
?>