<html>
    <head>
         <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="title" content="Share.gy: Create an Account" >
        <meta name="description" content="Become a member on share.gy">
        <meta name="keywords" content="Share.gy,share content,anonymous file upload,url shortener, note sharing site" >
          <meta http-equiv="X-Frame-Options" content="deny">
        <title>Share.gy: Create an Account</title>
    </head>
<style>
    
    *::-webkit-input-placeholder {
    color : rgb(211,211,211);
}
    
    #input1{
background-color:#559BDB;
border-color: transparent; 
color:white; 
margin-top: 6%;
margin-right: 7%;
font-size:20pt;
text-align: center;
box-shadow: 0px 0px 4px blue;
}
#input1:hover{
	box-shadow: 0px 0px 6px blue;
}
    
    
    #FormBorder { 
   
    border-radius: 40px;
    background: #f57d2d;
    width: 710px;
    height: 345px;
    padding: 40px;
    margin-left: auto;
    margin-right: auto;
    margin-top: 34px;
    
   
}

form{
    background-color: white;
     color: #555;
    font-size: 15pt;
    font-family: "Lucida Grande", sans-serif;
    height: 320px;
    margin-top: -2px;
    padding: 15px;
}
/**/
    #logoImage {
    width: 22%;
    height: auto!important;
}
    </style>

<?php include 'Header.html'; ?>
<div id="FormBorder">
    <form method="post">
<p>Hello there, thanks for showing interest in our website.<br><br> 
  We are currently in beta, provide us your email we will let you know whenever we launch.<br>
</p>
<center>
    <!--<label>Email: </label>--><input id="input1" name="notifyEmail" type="text" size="40" placeholder="your@email.com"><br>
<button id="input1">Notify Me</button>
</center>
</form>
</div>
    
  <!--  
    <?php
//Save into DB 
  
require_once 'Backend/OpenConnection.php';


if( ! ($_POST['notifyEmail']==NULL) ){
try{    
  $con=  openConnection();
  $stmnt=$con->prepare("insert into notify(email) values('".$_POST['notifyEmail']."');");
  $stmnt->execute();
  echo "--><script>alert('Added your email to our priority list')</script><!--";
}catch(Exception $e){
    
}}
?>
-->


