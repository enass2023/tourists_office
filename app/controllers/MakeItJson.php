<?php
namespace app\controllers;
trait MakeItJson{
    public function toJson($data){
        return json_encode(["status"=>!!$data,"data"=>$data]);
    }
    public function fromJson($data){
        return json_decode($data);
    }
}