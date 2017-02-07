<head>
      <meta http-equiv="X-Frame-Options" content="deny">
</head>
<style>
    #FormBorder { 
   margin-left: 190px;
    border-radius: 40px;
    background: #f57d2d;
    width: 810px;
    height: 553px;
    padding: 40px;
    margin-top: 19px;
    box-shadow: 0px 0px 2px #f57d2d;
}
#input_20 {
	width: 100%;
	margin-top: 7px;
	border-color: transparent;
	box-shadow: 0px 0px 4px blue;
	font-size: 20px;
        color: #ffffff !important;
        background: #559bdb;
        padding: 9px 15px;

}
#frame{
    margin-left: -8px;
    margin-top: -9px;
    
}
    </style>


<div id="FormBorder">
    <center>
        <iframe src="http://localhost/ShareLink/ContentPage/ContainerPages/<?php echo $page;?>?cid=<?php echo $cid?>" id="frame" width="825px" frameborder='0' height="510px"></iframe>

        <input id="input_20" onclick="downloadFile()" type="button" value="Download"/>
    </center>
</div>
    
    <script>
        function downloadFile(){


window.location.href=('<?php echo "http://localhost/ShareLink/Download.php?cid=".$cid."&type=".$type."'"?>);
}
        </script>