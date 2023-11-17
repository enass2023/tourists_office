<?php
namespace app\controllers;

class TicketController{
    use MakeItJson;
    use IdsToData;
    private $ticket_model ;
    private $city_model,$company_model;
    public function __construct($ticket_model,$city_model,$company_model){
        $this->ticket_model  = $ticket_model ;
        $this->city_model = $city_model;
        $this->company_model = $company_model;
    }
    

public function get(){
$tickets=$this->ticket_model->getTicket();

$tickets=$this->getData($tickets);
echo $this->toJson($tickets);

}
public function getTicketByCityId(){

if($_SERVER['REQUEST_METHOD'] == 'POST'){
 $a= $this->ticket_model->getTicketByCityId($_POST["city_id"]);
  $a = $this->getData($a);
  echo $this->toJson($a);

}
else{echo "not found";}
}

public function getTicketByCompanyId(){
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $a= $this->ticket_model->getTicketByCompanyId($_POST["company_id"]);
       
     $a=$this->getData($a);
     echo $this->toJson($a);
    
    }
    else{echo "not found";}

}

public function getTicketByDate($date_s){

    $p= $this->model->getTicketDate($data_s);
    $p=$this->getData($p);
    echo $this->toJson($p);

}



}
?>