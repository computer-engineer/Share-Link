<html>
    <head>
         <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="title" content="Share.gy: Report Abuse" >
        <meta name="description" content="Report a share.gy url for abuse">
        <meta name="keywords" content="Share.gy,share content,anonymous file upload,url shortener, note sharing site" >
          <meta http-equiv="X-Frame-Options" content="deny">
        <title>Share.gy: Report Abuse</title>
    </head>
    
<style>
    
    *::-webkit-input-placeholder {
    color : rgb(211,211,211);
}
    
    #input1,#input2{
background-color:#559BDB;
border-color: transparent; 
color:white; 
margin-top: 3%;
margin-right: 7%;
font-size:20pt;
text-align: center;
box-shadow: 0px 0px 4px blue;
}
#input1,#input2:hover{
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
    </style>

<?php include 'Header.html'; ?>
<div id="FormBorder">
    <form method="post"><center>
<p>Report Abuse<br><br> 
  Provide the URL of the content you want to report<br>
</p>

   <input id="input1" name="reportURL" type="text" size="40" placeholder="URL to report"><br>
   <input id="input2" name="reportReason" type="text" size="40" placeholder="Reason for reporting"><br>
<button id="input1">Report</button>
</center>
</form>
</div>
    
  <!--  
    <?php
//Save into DB 
  
require_once 'Backend/OpenConnection.php';


if( ! ($_POST['reportURL']==NULL) ){
try{    
  $con=  openConnection();
  $stmnt=$con->prepare("insert into reported_content(url,reason) values('".$_POST['reportURL']."','".$_POST['reportReason']."');");
  $stmnt->execute();
  echo "--><script>alert('Your report has been received. Action will be taking ASAP')</script><!--";
}catch(Exception $e){
    
}}
?>
-->


</html>