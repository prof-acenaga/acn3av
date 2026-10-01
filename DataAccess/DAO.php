<?php

abstract class DAO{
    protected $con;
    protected $table;

    function __construct($con){
        $this->con = $con;
    }

    abstract public function getOne($id);
    abstract public function getAll($where = array());  

    public function save($data = array()){
        
        $column=array();
        $values = array();
        
        foreach($data as $key=>$value){
             if(!empty($value)){
                 $column[] = $key;
                 $values[] = $value;
             }
         }

         $sql = "INSERT INTO ".$this->table."(".implode(',',$column).") VALUES ('".implode("','",$values)."')";
         return $this->con->exec($sql);
    }

    public function modify($id, $data = array()){
        
        $set=array(); 
        
        foreach($data as $key=>$value){
             if(!empty($value)){
                 $set[] = $key."='".$value."'"; 
             }
         }

         $sql = "UPDATE ".$this->table." SET ".implode(',',$set).", updatedAt = now() WHERE id = ".$id;
         
         return $this->con->exec($sql);
    }

    public function delete($id){
        $sql = "DELETE FROM tags WHERE id = ".$id;
        return $this->con->exec($sql);
    }

}