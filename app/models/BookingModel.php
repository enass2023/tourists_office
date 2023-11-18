<?php
namespace app\models;

class BookingModel{
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }    



     public function addBookings($data){
        return $this->db->insert("bookings",$data);
    }

         public function updateBookings($id,$data) {
             $this->db->where('id', $id);
             return $this->db->update('bookings', $data);   
          }

    public function deleteBookings($id) {
        $this->db->where('id', $id);
        return $this->db->delete('bookings');   
     }
//\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\get///////////////////////////////
   public function getBookings() {
             return $this->db->get('bookings');
         }

    public function getBookingsById($id) {
        return $this->db->where('id', $id)->getOne('bookings');
    }

         public function getBookingsByHotelId($hotel_id) {
             return $this->db->where('hotel_id', $hotel_id)->getOne('bookings');
         }

    public function getBookingsByCustomerId($customer_id) {
        return $this->db->where('customer_id', $customer_id)->getOne('bookings');
    }
    
          public function getBookingsByTicketId($ticket_id) {
              return $this->db->where('ticket_id', $ticket_id)->getOne('bookings');
          }
        }

?>
