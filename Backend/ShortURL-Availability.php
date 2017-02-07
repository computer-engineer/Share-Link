<?php
  require_once 'OpenConnection.php';
  
  $dbcon = openConnection(); 
  
  if($_POST&&!(preg_match('/[\'^£$%&*()}{@#~?><>,\\\\|=_+¬-]/', $_POST['shortUrl']))) 
  {
      $name     = strip_tags($_POST['shortUrl']);
      
	  $stmt=$dbcon->prepare("SELECT cid FROM main WHERE short_url=:name");
	  $stmt->execute(array(':name'=>$name));
	  $count=$stmt->rowCount();
	  	  
	  if($count>0)
	  {
		  echo "<span style='color:brown;'>Not Available</span>";
	  }
	  else
	  {
		  echo "<span style='color:green;'>Available</span>";
	  }
  }else
	  {
		  echo "<span style='color:green;'>Special Character not allowed</span>";
	  }
  $dbcon=NULL;
?>