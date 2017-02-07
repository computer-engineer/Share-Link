<?php
require_once 'FetchData.php';
require_once '../Libraries/base58.php';


 function getShortURL($cid) {

        $checkURL=base58::encode ($cid);
        
        //SQL query to check if shorturl already exists
        list($existingCid,$type)=determineType($checkURL) ; 

           if($existingCid==NULL){    //If shorturl doesn't already exist then return
                return $checkURL;
           }else{      
                return calculateShortURL( $cid.rand(1,999) );  //If already exists then generate random
                    }
  
      }
  

 



