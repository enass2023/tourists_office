<?php

require __DIR__.'/../models/AirCompanyModel.php';

class AirCompanyController {
    private $model;
  

    public function __construct($db) {
      
        $this->model = new AirCompanyModel($db);
    }
   public function index()
   {
$a=$this->model->getCompanys();

print_r($a);


   }







}
