<?php

require_once('BaseModel.php');

class TagModel extends BaseModel{

    protected $name;

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }

}


?>