<?php
class HotelsModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getHotels() {
        return $this->db->get('hotels');
    }

    public function addHotels($data) {
        return $this->db->insert('hotels', $data);
    }

    public function getUserById($id) {
        return $this->db->where('id', $id)->getOne('users');
    }

    public function updateHotels($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('hotels', $data);
    }

    public function deleteUser($id) {
        $this->db->where('id', $id);
        return $this->db->delete('hotels');
    }
}