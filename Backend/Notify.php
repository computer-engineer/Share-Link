<?php

require_once './OpenConnection.php';

if( ! ($_POST['notifyEmail']==NULL) ){
try{
  $con=  openConnection();
  $stmnt=$con->prepare("insert into notify(email) values=('".$_POST['notifyEmail']."');");
  $stmnt->execute();
  echo "<span style='color:green;'>Done</span>";
}catch(Exception $e){
    
}}
?>