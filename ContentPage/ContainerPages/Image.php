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
            
img {
  display: block;
  max-width:810px;
  max-height:490px;
  width: auto;
  height: auto;
  margin: auto;

}

 body{
      background-color: white;
                
            }
            
            #imageFrame{
                width:810px; 
                height:490px;
                align-content: center;
                
            }            
        </style>
    </head>
    <body>
        
   <!-- <center>-->
        <div id='imageFrame'>
           <img width="810" height="490" src="../../Uploads_7fd8yghg7e6ybn7/Anonymous/Files/<?php echo filter_var($saved_file,FILTER_SANITIZE_FULL_SPECIAL_CHARS);?>">
        </div>
  <!--  </center>-->
        
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
