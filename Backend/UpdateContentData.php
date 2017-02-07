 <?php
 
//Do Validation Here
require_once 'OpenConnection.php';

function addView($cid) {
    
    try {
        $conn=openConnection();
        $sql_main = $conn->prepare("SELECT views from content_details where cid=$cid;");
        $sql_main->execute();
        
        $updatedViews=($sql_main->fetchColumn(0))+1;
        
        $last_id=$conn->lastInsertId();
        $sql_url = $conn->prepare("update content_details set views='$updatedViews' where cid=$cid");
        $sql_url->execute();
              
          }
    catch(PDOException $e)
       {
        echo  $e->getMessage();
       }

        $conn = null;
}

function changeStatus($cid,$status) {
    
    $conn=openConnection();
    $sql_url = $conn->prepare("update content_status set status='$status' where cid=$cid");
        $sql_url->execute();
}
?>