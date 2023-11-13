<?php
namespace app\controllers;

require __DIR__.'/../models/UserModel.php';
use app\models\UserModel;


class UserController {
    private $model;
  

    public function __construct($db) {
      
        $this->model = new UserModel($db);
    }
   

}
