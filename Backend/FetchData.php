<?php
require_once 'OpenConnection.php';

function determineType($shortURL) {
    try {
       
        $con= openConnection();
        $stmnt=$con->prepare("SELECT main.cid,type,status FROM main,content_status WHERE main.cid=content_status.cid AND short_url='".$shortURL."'");
        $stmnt->execute();
        
        $rs=$stmnt->fetch(PDO::FETCH_ASSOC); 
        
        //If content removed then show Blocked page
        if($rs["status"]=="blocked"){ 
            header("Location: Removed.php"); die();
        }
        
        
        return array($rs["cid"],$rs["type"]);
        
    } catch (Exception $exc) {
    
    }
    
}

  function processURL($cid) {
    try {
        
        $con= openConnection();
        $stmnt=$con->prepare("SELECT url.cid,long_url,status FROM url,content_status where url.cid=content_status.cid AND url.cid='".$cid."'");
        $stmnt->execute();
        
        $rs=$stmnt->fetch(PDO::FETCH_ASSOC);
        
        // If content Blocked, then show removed page
        if($rs["status"]=="active"){          
          header("Location:".$rs["long_url"]);          die();
         }else{        
          header("Location: ../Removed.php");        die();
      
      }
                
    } catch (Exception $exc) {
       }
    }
       
  function processFile($cid) {
    try {
        
        $con= openConnection();
        $stmnt=$con->prepare("SELECT file.cid,title,saved_file,extension,status FROM file,content_status WHERE file.cid=content_status.cid AND file.cid='".$cid."'");
        $stmnt->execute();
        
        $rs=$stmnt->fetch(PDO::FETCH_ASSOC);
        
        // If content Blocked, then show removed page
       if($rs["status"]=="blocked"){ 
            header("Location: Removed.php"); die();
        }
        
        return array($rs["title"],$rs["saved_file"],$rs["extension"]);
               
    } catch (Exception $exc) {
        
    }
    }

  function processNote($cid) {
    try {
        
        $con= openConnection();
        $stmnt=$con->prepare("SELECT note.cid,title,saved_file,status FROM note,content_status WHERE note.cid=content_status.cid AND note.cid='".$cid."'");
        $stmnt->execute();
        
        $rs=$stmnt->fetch(PDO::FETCH_ASSOC);
        
        // If content Blocked, then show removed page
       if($rs["status"]=="blocked"){ 
            header("Location: Removed.php"); die();
        }
        
        return array($rs["title"],$rs["saved_file"]);
        
    } catch (Exception $exc) {
        
    }
   }
   
   function processContentDetails($cid) {
    try {
        
        $con= openConnection();
        $stmnt=$con->prepare("SELECT content_details.cid,author,views,file_size,ratings,status FROM content_details,content_status where content_details.cid='".$cid."'");
        $stmnt->execute();
        
        $rs=$stmnt->fetch(PDO::FETCH_ASSOC);
        
        // If content Blocked, then show removed page
       if($rs["status"]=="blocked"){ 
            header("Location: Removed.php"); die();
        }
        
        return array($rs["author"],$rs["views"],$rs["file_size"],$rs["ratings"]);
               
    } catch (Exception $exc) {
        
    }
    }
    
    
   
    

?>