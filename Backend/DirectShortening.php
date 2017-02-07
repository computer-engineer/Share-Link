<?php
require_once 'InsertData.php';

function directUrlRedirect($long_url) {
    echo $long_url;
    $long_url=strtolower($long_url);
    if((substr($long_url,0,7)=="http://")||(substr($long_url,0,8)=="https://")){
       
        $link=  InsertValuesURL(NULL,$long_url); 
            
         header("Location: ../ShareUrl.php?link=".$link);        
         die();
            
        }  else {
            header("Location: ../404.php");        die();
        }
    
}
