<?php
namespace app\models;

class BookingModel{
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }    

         public function getBookings() {
             return $this->db->get('booking');
         }

    public function getBookingsById() {
        return $this->db->where('id', $id)->getOne('booking');
    }

         public function getBookingsByHotelId() {
             return $this->db->where('hotel_id', $id)->getOne('booking');
         }

    public function getBookingsByCustomerId() {
        return $this->db->where('customer_id', $id)->getOne('booking');
    }
    
          public function getBookingsByTicketId() {
              return $this->db->where('ticket_id', $id)->getOne('booking');
          }

    public function addBookings() {
        return $this->db->insert('booking', $data);   
     }

         public function updateBookings() {
             $this->db->where('id', $id);
             return $this->db->update('booking', $data);   
          }

    public function deleteBookings() {
        $this->db->where('id', $id);
        return $this->db->delete('booking');   
     }
}

?>