<?php
namespace app\controllers;

class CompanyController{
    use MakeItJson;
    use IdsToData;

    private $company_model;

    public function __construct($company_model){
        $this->company_model = $company_model;
    }
    public function addCompany(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
           $data = ["title"=>$_POST["title"],"address"=>$_POST["address"],"phone"=>$_POST["phone"]];
           echo $this->toJson($this->company_model->addCompany($data));
        }
        else 
         echo "No Data To Be Add";
    }
    public function deleteCompany(){
        if($_SERVER["REQUEST_METHOD"] == "POST")
        echo $this->toJson($this->company_model->deleteCompany($_POST["id"]));
        else 
         echo "No Data To Be Delete";
    }
    public function updateCompany(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $data = ["title"=>$_POST["title"], "address"=>$_POST["address"],"phone"=>$_POST["phone"]];
         echo $this->toJson($this->company_model->updateCompany($_POST["id"],$data));
        }
        else 
         echo "No Data To Be Update";
    }
    public function getCompany(){
        $data = $this->company_model->getCompany();
        $data = $this->getData($data);
        echo $this->toJson($data);
    }
}