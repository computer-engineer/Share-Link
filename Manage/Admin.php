
    <?php

$apikey=''.filter_input(INPUT_GET,'apikey',FILTER_SANITIZE_STRING);


if($apikey=='dolby(*)@8910'){
require '../Backend/OpenConnection.php';
require '../Backend/UpdateContentData.php';

echo '<!--';
if($_GET['update']=='yes'){
    changeStatus($_GET['cid'], $_GET['status']);
}
echo '-->';

echo '<center><h1>Super Admin Panel</h1>';
$con=  openConnection();

$stmnt=$con->prepare("SELECT * FROM content_details,content_status,main WHERE main.cid=content_details.cid AND main.cid=content_status.cid;");
$stmnt->execute();

echo "<table border='1'>"
     . "<tr>"
        . "<th>CID</th>"
        . "<th>VIEWS</th>"
        . "<th>FILE SIZE</th>"
        . "<th>TYPE</th>"
        . "<th>SHORT URL</th>"
        . "<th>STATUS</th>"
     . "</tr>";

 while($rs=$stmnt->fetch(PDO::FETCH_ASSOC))
 {   if($rs["status"]=="active"){
         $updatedStatus='blocked';
        }else{
     $updatedStatus='active';
 }
echo  "<tr>"
        . "<td>$rs[cid]</td>"
        . "<td>$rs[views]</td>"
        . "<td>".round($rs["file_size"]/(1024*1024),2)." MB</td>"
        . "<td>$rs[type]</td>"
        . "<td><a href='http://share.gy/$rs[short_url]'>$rs[short_url]</a></td>"
        . "<td><a href='http://localhost/ShareLink/Admin.php?apikey=dolby(*)@8910&cid=$rs[cid]&status=$updatedStatus&update=yes'>$rs[status]</a></td>"
     . "</tr>";
 
 }
 
 echo  "</table>";
 
 //File title
 echo '<h1>File title</h1>';
$file_stmnt=$con->prepare("SELECT * FROM file");
$file_stmnt->execute();

 echo "<table border='1'>"
     . "<tr>"
        . "<th>CID</th>"
        . "<th>TITLE</th>"
     . "</tr>";
 while($file_rs=$file_stmnt->fetch(PDO::FETCH_ASSOC))
 { 
    echo  "<tr>"
        . "<td>$file_rs[cid]</td>"
        . "<td>".filter_var($file_rs["title"],FILTER_SANITIZE_FULL_SPECIAL_CHARS)."</td></tr>";
 }
 echo '</table>';
 
 
 
 
 
 
 //Note title
 echo '<h1>Note title</h1>';
$note_stmnt=$con->prepare("SELECT * FROM note");
$note_stmnt->execute();

 echo "<table border='1'>"
     . "<tr>"
        . "<th>CID</th>"
        . "<th>TITLE</th>"
     . "</tr>";
 while($note_rs=$note_stmnt->fetch(PDO::FETCH_ASSOC))
 { 
    echo  "<tr>"
        . "<td>$note_rs[cid]</td>"
        . "<td>".filter_var($note_rs['title'],FILTER_SANITIZE_FULL_SPECIAL_CHARS)."</td></tr>";
 }
 echo '</table>';
 
 
 
 //Reported Content
 echo '<h1>Reported Content</h1>';
$report_stmnt=$con->prepare("SELECT * FROM reported_content");
$report_stmnt->execute();

 echo "<table border='1'>"
     . "<tr>"
        . "<th>URL</th>"
        . "<th>REASON</th>"
     . "</tr>";
 while($report_rs=$report_stmnt->fetch(PDO::FETCH_ASSOC))
 { 
    echo  "<tr>"
        . "<td>".filter_var($report_rs['url'],FILTER_SANITIZE_FULL_SPECIAL_CHARS)."</td>"
        . "<td>".filter_var($report_rs['reason'],FILTER_SANITIZE_FULL_SPECIAL_CHARS)."</td></tr>";
 }
 echo '</table></center>';
 
 
}else{
    
/*
<SCRIPT Language="Javascript">
    
   // var key=prompt
//('Enter API Key','');
//location.href=window.location+"?id="+key;

</SCRIPT>
  */
 
echo "<H1>This Page is under development</H1>";

}
?>


