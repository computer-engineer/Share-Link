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
          
            
            </style>
    </head>
    
    <body style="background-color: #f57d2d;">
               
         <video width="795" height="490" controls>
             
             
<source src="../../Uploads_7fd8yghg7e6ybn7/Anonymous/Files/<?php echo filter_var($saved_file,FILTER_SANITIZE_FULL_SPECIAL_CHARS);?>" type=
    
    <?php  switch ($extension) {
             case ".webm":
                   echo '"video/webm"';
                  break;
              case ".ogg":
                   echo '"video/ogg"';
                  break;
             default:
                   echo '"video/mp4"';
             break;
             }
             
             ?> />
            
Your browser does not support the video tag.
</video> 
       
        
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
