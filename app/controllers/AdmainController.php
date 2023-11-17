<?php
namespace app\controllers;

class AdmainController{
    use MakeItJson;
    use IdsToData;
    private $model;
    public function __construct(){
        $this->model=new app\models\AdmainController($db);
    }
    public function addAdmain(){
        if($_SERVER["REQUEST_METHOD"]=="post"){
            $date=
            ["name"=>$_POST["name"],"password"->$_POST["password"],"email"->$_POST["email"]];
           echo $this->tojson ($this->model->addAdmain($date));
        }else
        echo "no acount";
    }
    public function updateAdmain(){
        if($_SERVER["REQUEST_METHOD"]=="post"){
            $date=
            ["name"=>$_POST["name"],"password"->$_POST["password"]];
            echo $this->tojson ($this->model->updateAdmain($date));

    }else
    echo "not update";
    
}
public function deleteAdmain(){
    if($_SERVER["REQUEST_METHOD"]=="post"){
        echo $this->tojson ($this->model->deleteAdmain($_POST["id"]));
    }else
    echo "unavailable";
}

public function editAdmain($id){
echo $this->tojson($this->model->getById($id));
}


}

?>