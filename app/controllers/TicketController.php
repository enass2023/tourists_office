<?php
namespace app\controllers;
trait qqq{

public function sow($t){

    foreach($t as $val){
        $c=$this->city->getCityById($val['city_id']);
        $s=$this->Company->getCompanyById($val['company_id']);
        $data=[
        'company_name'=>$s['title'],
        'city_name'=>$c['name'],
        'date_s'=>$val['date_s'],
        'date_e'=>$val['date_e']
        ];
        
        $ddata=json_encode($data);
        echo($ddata);
        
        }
}

}


class TicketController{
    use qqq;
    private $model;
  
    public function __construct($db) {
      
        $this->model = new app\models\TicketModel($db);
        $this->city=new app\models\CityModel($db);
        $this->Company=new app\models\CompanyModel($db);

    }

public function get(){
$tickets=$this->model->getTicket();
$this->sow($tickets);
}
public function getTicketByCityId($id){

    $a= $this->model->getTicketByCityId($id);
 
    $this->sow($a);

}
public function getTicketByCompanyId($id){

    $a= $this->model->getTicketByCompanyId($id);
 
    $this->sow($a);

}

public function getTicketByDate($date_s){

    $p= $this->model->getTicketDate($data_s);
 
    $this->sow($p);

}



}
?>