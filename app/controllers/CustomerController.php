<?php
namespace app\controllers;

class CustomerController{
    use MakeItJson;
    use IdsToData;

    private $customer_model;

    public function __construct($customer_model){
        $this->customer_model = $customer_model;
    }
    public function addCustomer(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
        $this->testPost(["name","mobile","gender","email"]);
       $data = ["name"=>$_POST["name"],"mobile"=>$_POST["mobile"],"gender"=>$_POST["gender"],"email"=>$_POST["email"]];
       echo $this->toJson($this->customer_model->addCustomer($data));
        }
        else 
         echo "No Data To Be Add";
    }
    public function deleteCustomer(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
        $this->testPost(["id"]);
        echo $this->toJson($this->customer_model->deleteCustomer($_POST["id"]));
        }
        else 
         echo "No Data To Be Delete";
    }
    public function updateCustomer(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $this->testPost(["name","mobile","gender","email"]);
            $data = ["name"=>$_POST["name"],"mobile"=>$_POST["mobile"],"gender"=>$_POST["gender"],"email"=>$_POST["email"]];
            echo $this->toJson($this->customer_model->updateCustomer($_POST["id"],$data));
        }
        else 
         echo "No Data To Be Update";
    }
    public function getCustomer(){
        $data = $this->customer_model->getCustomer();
        $data = $this->getData($data);
        echo $this->toJson($data);
    }
}