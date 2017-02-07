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
list($title,$saved_file)=processNote($cid); 

if( (! is_null($title) ) && (! is_null($saved_file) ) ){
?>



<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-Frame-Options" content="sameorigin">
        <title></title>
        
        
        <script src='https://cdn.tinymce.com/4/tinymce.min.js'> </script>
  <script>
  tinymce.init({
    selector: '#mytextarea',
	plugins: 'code',
	height:'382'
  });
  </script>
  <script>

  </script>
    </head>
        
    <body style="background-color: #f57d2d;">
      
        <textarea id="mytextarea" name="noteContent">
              
   <?php $strin=file_get_contents("../../Uploads_7fd8yghg7e6ybn7/Anonymous/Notes/$saved_file");
   
   //Sanitize Output
   //</Textarea>
   $strin=str_replace("</te", "</te#", $strin);
   $strin=str_replace("</Te", "</Te#", $strin);
   $strin=str_replace("</tE", "</tE#", $strin);
   $strin=str_replace("</TE", "</TE#", $strin);
   
   
   //<Textarea>
   $strin=str_replace("<te", "<te#", $strin);
   $strin=str_replace("<Te", "<Te#", $strin);
   $strin=str_replace("<tE", "<tE#", $strin);
   $strin=str_replace("<TE", "<TE#", $strin);
      
   echo $strin; 

 //  echo filter_var($strin,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  
           ?>        
      
</textarea>  
          
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