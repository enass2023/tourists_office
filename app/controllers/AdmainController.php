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
            $data = ["name"=>$_POST["name"],"email" => $_POST["email"],"password" => $_POST["password"]];
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
if(isset(getallheaders()['c']) && $this->model->gitAdminBycard(getallheaders()['c']))
     return;
if($_SERVER["REQUEST_METHOD"] == "POST"){
 $this->testPost(["email","password"]);
 if($data=$this->model->gitAdminByemailpassword($_POST["email"],$_POST["password"]))
 {
$c=rand();
$admin_data=[
'name'=>$data['name'],
'email'=>$data['email'],
'password'=>$data['password'],
'card'=>$c];
$this->model->updateAdmins($data["id"],$admin_data);
echo $this->toJson($c);
 }
else{die("failed");}

 }
else
 die("you need to loging enter the email and password");

}
public function logout(){
    $data = $this->model->gitAdminBycard(getallheaders()['c']);
    $admin_data=[
        'name'=>$data['name'],
        'email'=>$data['email'],
        'password'=>$data['password'],
        'card'=>null];
    $this->model->updateAdmins($data["id"],$admin_data);
    echo "loged out";
}
}
?>