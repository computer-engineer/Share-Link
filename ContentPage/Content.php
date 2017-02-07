<html>
<head>
    
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=20000px, target-densitydpi=high-dpi" />
    <!--   <meta name="title" content="Share.gy: About us" >
        <meta name="description" content="Share your digital content conveniently using short url's">
        <meta name="keywords" content="Share.gy,share content,anonymous file upload,url shortener, note sharing site" >
-->
      <meta http-equiv="X-Frame-Options" content="deny">
      <style>
          #makeNonResponsive{
              width: 1349px
          }
          </style>
</head>
<?php include '../Header.html'; 
 require_once '../Backend/FetchData.php';     
require_once '../Backend/UpdateContentData.php'; 
require_once '../Backend/DirectShortening.php';
        
$shortURL= filter_input(INPUT_GET,'shortURL',FILTER_SANITIZE_STRING);
$shortURL=urlencode($shortURL);
$shortURL=strip_tags($shortURL);

//This is Direct URL Shortening feature
//directUrlRedirect($shortURL);


 //Send To analytics page
      
      if( endsWith( $shortURL,"+")!=FALSE)    {
          
          //Remove + sign from URL
          $filteredURL=substr($shortURL, 0,  strlen($shortURL)-1);
              header("Location: Analytics.php?url=$filteredURL"); die();
          } 
          //Find if '+' at end of shortURL
          function endsWith( $str, $sub ) {
   return ( substr( $str, strlen( $str ) - strlen( $sub ) ) === $sub );
}
    //Ends here    
        
list($cid,$type)=determineType($shortURL);

   addView($cid); // Add +1 View

        if($type=="url"){
              processURL($cid);
        
        }else if($type=="file"){
             list($title,$saved_file,$extension)= processFile($cid); 
             
             //Image
             if ($extension==".jpg"||$extension==".png"||$extension==".gif"||$extension==".svg"){
                $page="Image.php";
             }
             
             //Audio
             else  if ($extension==".mp3"||$extension==".png"||$extension==".gif"||$extension==".svg"){
                $page="Audio.php";
             }
             //Video
             else  if ($extension==".mp4"||$extension==".png"||$extension==".gif"||$extension==".svg"){
                $page="Video.php";
             }
             
             //Pdf
             else  if ($extension==".pdf"){
                $page="Pdf.php";
             }
             
             //No Preview
             else {
                 $page="NoPreview.php";
             }
                    
        }else if($type=="note"){
              list($title,$saved_file)= processNote($cid); 
               $page="Note.php";          
        
        } else {
            header("Location: 404.php");        die();            
} 
      
echo "<title>Share.gy: ". filter_var($title,FILTER_SANITIZE_FULL_SPECIAL_CHARS)." </title>";
?>

<?php include 'Sections/Title.php'; ?>
<?php include 'Sections/Container.php'; ?>
<?php include 'Sections/FileDetails.php'; ?>
<div id="makeNonResponsive">
<?php include 'Sections/Comments.html'; ?>
</div>
</html>