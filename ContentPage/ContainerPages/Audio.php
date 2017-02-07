<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php

try{
require_once '../../Backend/FetchData.php';

$cid= filter_input(INPUT_GET,'cid',FILTER_SANITIZE_NUMBER_INT);
list($title,$saved_file,$extension)=processFile($cid);

if( (! is_null($title) ) && (! is_null($saved_file) ) ){
?>


<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-Frame-Options" content="sameorigin">
        <title></title>
        <style>
            audio{
              
            }
            body{
                margin-top: 240px;
                background-color: white;
            }
            </style>
    </head>
    <body>
        
    <center>
        <audio controls>
             <source src="../../Uploads_7fd8yghg7e6ybn7/Anonymous/Files/<?php echo filter_var($saved_file,FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?>" type=
                     
           <?php  switch ($extension) {
             case ".mpeg":
                   echo '"audio/mpeg"';
                  break;
             case ".wav":
                   echo '"audio/wav"';
                  break; 
             default:
                   echo '"audio/mp3"';
             break;
             }
             
             ?> />

Your browser does not support the audio element.
</audio> 
    </center>
            
    </body>
</html>
<?php
}else{
     header("Location: ../../404.php");        die();
     }

    } catch (Exception $e){
        header("Location: ../../error.html");        die();
        } 
?>