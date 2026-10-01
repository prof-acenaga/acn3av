<?php

require_once('../DataAccess/TagsDAO.php');

class TagBusiness{

    protected $TagsDAO;
    
    public function __construct($con){
        $this->TagsDAO = new TagsDAO($con);
    }

    public function getAll($where = array()){
        return $this->TagsDAO->getAll($where);
    }

    public function saveTag($data){
        return $this->TagsDAO->save($data);
    }

    public function editTag($id,$data){
        return $this->TagsDAO->modify($id,$data);
    }

    public function getOne($id){
        return $this->TagsDAO->getOne($id);
    }
    
    public function eliminar($id){
        return $this->TagsDAO->delete($id);
    }
}


?>