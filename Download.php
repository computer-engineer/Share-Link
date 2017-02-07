<?php

try{
    
require_once './Backend/FetchData.php';

$cid=$_GET['cid'];
$type=$_GET['type'];
   if($type=='file'){
           list($title,$saved_file,$extension)=processFile($cid);
        }else{

             list($title,$saved_file)= processNote($cid); 
            }
            
 if( (! is_null($title) ) && (! is_null($saved_file) ) ){
        
          header('Content-type:text/javascript');
          header('Content-Disposition:attachment; filename="'.$title.'"');

    if($type=='file'){
          readfile('Uploads_7fd8yghg7e6ybn7/Anonymous/Files/'.$saved_file);
    }else{
    readfile('Uploads_7fd8yghg7e6ybn7/Anonymous/Notes/'.$saved_file);
        }
    }else{
     header("Location: 404.php");        die();
    }
    
   }  
   catch (Exception $e){
   header("Location: error.html");        die();
} 
?>

