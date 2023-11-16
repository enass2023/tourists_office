<?php
namespace app\controllers;
trait MakeItJson{
    public function toJson($data){
        return json_encode(["status"=>isset($data)? 1 : 0,"data"=>$data]);
    }
    public function fromJson($data){
        return json_decode($data);
    }
}