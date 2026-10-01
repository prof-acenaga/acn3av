<?php

abstract class BaseModel{
    protected $id;
    protected $createdAt;
    protected $updatedAt;
    protected $active;

    public function getId(){
        return $this->id;
    }

    public function getCreatedAt(){
        return $this->createdAt;
    }

    public function getUpdatedAt(){
        return $this->updatedAt;
    }

    public function getActive(){
        return $this->active?'SI':'NO';
    }


    public function setId($id){
        $this->id = $id;
    }

    public function setCreatedAt($createdAt){
        $this->createdAt = $createdAt;
    }

    public function setUpdatedAt($updatedAt){
        $this->updatedAt = $updatedAt;
    }

    public function setActive($active){
        $this->avtive = $active;
    }

}