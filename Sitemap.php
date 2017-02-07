<?php

header("Content-type: text/xml");
echo '<?xml version="1.0" encoding="UTF-8" ?>';
include_once './Backend/OpenConnection.php';
$con=  openConnection();

$stmt=$con->prepare('SELECT short_url FROM main');
$stmt->execute();


echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

while($rs=$stmt->fetch(PDO::FETCH_ASSOC)){


//Generate Link info
echo '<url>'
        .'<loc>http://share.gy/'.$rs['short_url'].' /</loc>'
        .'<lastmod>YYYY-MM-DD</lastmod>'
        .'<changefreq>always</changefreq>'
        .'<priority>0.8</priority>'
    .'</url>';
}
   echo '</urlset>';
?>