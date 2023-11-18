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
 $this->testPost(["city_id"]);
 $a= $this->ticket_model->getTicketByCityId($_POST["city_id"]);
  $a = $this->getData($a);
  echo $this->toJson($a);

}
else{echo "not found";}
}

public function getTicketByCompanyId(){
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $this->testPost(["company_id"]);
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

public function addTicket(){
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $this->testPost(["company_id","city_id","date_s","date_e"]);
        $data = ["company_id"=>$_POST["company_id"],"city_id"=>$_POST["city_id"],"date_s"=>$_POST["date_s"],"date_e"=>$_POST["date_e"]];
        echo $this->toJson($this->model->addTicket($data));
    }
}
public function deleteTicket(){
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    $this->testPost(["id"]);
    $this->model->deleteTicket($_POST["id"]);
    }
}
}
?>