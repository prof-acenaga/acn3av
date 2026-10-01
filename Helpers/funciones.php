<?php

function redirect($url){
    if(strlen($url)>0){
        if(headers_sent()){
            echo "<script>document.location.href='".$url."';</script>";
        }else{
            header("Location:".$url);
        }
        exit();
    }

}

?>