<?php
namespace app\controllers;
trait IdsToData{
    public function getData($arr){
        $keys = array_keys($arr[0]);
        $replaces = [];
        foreach($keys as $k){
           $d = explode('_',$k);
           if(isset($d[1]) && $d[1] == "id")
            $replaces[$k] = $d[0] . "_model";
        }
        $res = [];
        foreach($arr as $ar){
            foreach($replaces as $id => $model){
                  $d = explode("_",$id);
                  $obj = $this->{$model}->getById($ar[$id]);
                  if($id == "ticket_id")
                    $ar["ticket"] = $this->getData([$obj]);
                  else 
                  $ar[$d[0] . "_name"] = ($id == "company_id")? $obj["title"] : $obj["name"];
                  unset($ar[$id]);
            }
            array_push($res,$ar);
        }
      return $res;
    }
}