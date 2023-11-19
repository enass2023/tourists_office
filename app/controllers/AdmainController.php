<?php
namespace app\controllers;

class AdmainController{
    use MakeItJson;
    use IdsToData;
    private $admin_model;
    public function __construct($admin_model){
        $this->model=$admin_model;
    }
    public function addAdmain(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $this->testPost(["name","email","password"]);
            $data = ["name"=>$_POST["name"],"email" => $_POST["email"],"password" => $_POST["email"]];
           // echo $this->toJson($this->model->addaddAdmins($data));
          $a= $this->model->addAdmins($data);
          echo json_encode($a);
           }
    else{echo "no acount";}

}


public function updateAdmain(){
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $this->testPost(["name","email","password"]);
        $data = ["name"=>$_POST["name"],"email"=>$_POST["email"],"password"=>$_POST["password"]];
            echo $this->toJson($this->model->updateAdmins($_POST["id"],$data));
 }else
    echo "not update";

}


public function deleteAdmin(){
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $this->testPost(["id"]);
        echo $this->tojson ($this->model->deleteAdmins($_POST["id"]));
    }else
    echo "unavailable";
}


public function gitAllAdmain(){
    echo $this->toJson ($this->model->getAdmins());
   
}

public function login(){
    if($_SERVER["REQUEST_METHOD"] == "POST"){
 if($data=$this->model->gitAdminByemailpassword($_POST["email"],$_POST["password"]))
 {var_dump($data);
$c=rand();
$admin_data=[
'name'=>$data['name'],
'email'=>$data['email'],
'password'=>$data['password'],
'card'=>$c];
$this->model->updateAdmins($data["id"],$admin_data);
 }
else{echo"failed";}

 }


}


}
?>