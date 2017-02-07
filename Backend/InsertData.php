 <?php
 
//Do Validation Here
require_once 'OpenConnection.php';
require_once '../Libraries/Base58.php';
require_once 'GetShortURL.php';
 
  function InsertValuesURL($shortURL,$longURL) {
       
    try { 
        
        $conn=openConnection();
        
        //Insert Into Main
        if($shortURL==NULL){
            $sql_main =$conn->prepare( "INSERT into main (type)values('url')");
            $sql_main->execute();
        }else{
            $sql_main = $conn->prepare("INSERT into main (type,short_url)values('url','$shortURL')");
            $sql_main->execute();
        }
        
        
        //Insert Into url
        $last_id=$conn->lastInsertId();
        $sql_url =$conn->prepare( "INSERT into url (cid,long_url)values('$last_id','$longURL')");
        $sql_url->execute();
              
        InsertContentDetails($last_id,'Anonymous',NULL);
        
        //Insert Random ShortURL
        if($shortURL==NULL){    
            $randomShortURL=getShortURL($last_id);
            
         $sql_update = $conn->prepare("UPDATE main set short_url ='".$randomShortURL."' where cid=$last_id;");
         $sql_update->execute();
         
              }
              
          }
    catch(PDOException $e)
       {
        echo  $e->getMessage();
       }

        $conn = null;
         if($shortURL==NULL){ 
             return $randomShortURL;
         }  else {
             return $shortURL;
         }
    }
    
    
    //Files
   
    function InsertValuesFile($shortURL,$title,$saved_file,$extension,$author,$file_size) {
         try {
        $conn=openConnection();
        
        if($shortURL==NULL){
            $sql_main =$conn->prepare( "INSERT into main (type)values('file')");
            $sql_main->execute();
        }
        else{
            $sql_main = $conn->prepare("INSERT into main (type,short_url)values('file','$shortURL')");
            $sql_main->execute();
        }
        
                
        $last_id=$conn->lastInsertId();
        $sql_url =$conn->prepare( "INSERT into file (cid,title,saved_file,extension)values('$last_id','$title','$saved_file','$extension')");
        $sql_url->execute();
        
        InsertContentDetails($last_id,$author,$file_size);
        
        //Insert Random ShortURL
        if($shortURL==NULL){    
            $randomShortURL=getShortURL($last_id);
            
         $sql_update =$conn->prepare( "UPDATE main set short_url ='".$randomShortURL."' where cid=$last_id");
         $sql_update->execute();
         
              }
        
        
         }
    catch(PDOException $e)
       {
        echo  $e->getMessage();
       }

        $conn = null;  
        
         if($shortURL==NULL){ 
             return $randomShortURL;
         }  else {
             return $shortURL;
         }
    }
     
    
    //Notes
    
    
    function InsertValuesNote($shortURL,$title,$saved_file,$author,$file_size) {
       try {
        $conn=openConnection();
        
        if($shortURL==NULL){
            $sql_main = $conn->prepare("INSERT into main (type)values('note')");
            $sql_main->execute();
        }else{
            $sql_main =$conn->prepare( "INSERT into main (type,short_url)values('note','$shortURL')");
            $sql_main->execute();
        }
                
                
        $last_id=$conn->lastInsertId();
        $sql_url = $conn->prepare("INSERT into note (cid,title,saved_file)values('$last_id','$title','$saved_file')");
        $sql_url->execute();
             
        InsertContentDetails($last_id,$author,$file_size);
        
         //Insert Random ShortURL
        if($shortURL==NULL){    
            $randomShortURL=getShortURL($last_id);
            
         $sql_update = $conn->prepare("UPDATE main set short_url ='".$randomShortURL."' where cid=$last_id");
         $sql_update->execute();
         
              }
          }
    catch(PDOException $e)
       {
       // echo $sql . "<br>" . $e->getMessage();
       }

        $conn = null; 
        
         if($shortURL==NULL){ 
             return $randomShortURL;
         }  else {
             return $shortURL;
         }
    }
    
    
    //Content Details
    
     function InsertContentDetails($cid,$author,$file_size) {
         try {
        $conn=openConnection(); 
        $ip_address=$_SERVER['REMOTE_ADDR'];
        $sql_main = $conn->prepare("INSERT into content_details (cid,author,file_size,ip_address)values('$cid','$author','$file_size','$ip_address')");
        $sql_main->execute();
                      
        insertStatus();
          }
    catch(PDOException $e)
       {
        echo  $e->getMessage();
       }

        $conn = null;  
    }
    
        
      // Add Status
      function insertStatus() {
          $conn=  openConnection();
          
            $sql_main =$conn->prepare( "INSERT into content_status (status)values('active')");
            $sql_main->execute();
}
  

?> 
