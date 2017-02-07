<?php include 'Header.html'; ?>
<?php
require_once '/Backend/FetchData.php';   

$shortURL= filter_input(INPUT_GET,'url',FILTER_SANITIZE_STRING);
$shortURL=urlencode($shortURL);
$shortURL=strip_tags($shortURL);

list($cid,$type)=determineType($shortURL);

list($author,$views,$file_size,$ratings)=processContentDetails($cid);

?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-Frame-Options" content="deny">
        <title>Share.gy: Content analytics</title>
        
        <style>
           body{ 
                 color: #555;
           }
           
           #logoImage {
    width: 22%;
    height: auto!important;
}

@media (min-width : 304px) and (max-width: 415px){
    #mobileMenu{
    display: inline-block;
}
.members{
    display: none;
}
}

.members{
    margin-left: 57%!important;
}

            </style>
    </head><center>
    <h2>This page is under development</h2>
    <body>
        </br></br></br></br></br></br>
       <i> <p>but here are few basic details you may be looking for</p></i>
        <pre>
            <?php
        echo "<h1>Author : $author"
               . "     Views  : $views"
               . "     Ratings: N/A</h1>";
        ?>
</pre>
    </body></center>
</html>
