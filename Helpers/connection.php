<?php
 require_once('./../Config/db.php');

 try{
    $dsn= $motor.':dbname='.$dbname.';host='.$host.';port='.$port;
    $con = new PDO($dsn,$username,$password);
 }catch(PDOException $e){
    echo $e->getMessage(); die();
 }

?>