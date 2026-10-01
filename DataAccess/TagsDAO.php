<?php

require_once('DAO.php');
require_once('../Entity/TagModel.php');

class TagsDAO extends DAO{

    
    public function __construct($con){
        $this->table = 'tags';
        parent::__construct($con);
    }

    public function getOne($id){
        $sql = "SELECT name, active FROM tags WHERE id = ".$id;
        $resultado = $this->con->query($sql,PDO::FETCH_CLASS,'TagModel')->fetch();
        return $resultado;
    }

    public function getAll($where = array()){
        $sql = "SELECT id, name, createdAt, updatedAt, active FROM tags";
        $resultado = $this->con->query($sql,PDO::FETCH_CLASS,'TagModel');
        return $resultado;

    }

    

}


?>