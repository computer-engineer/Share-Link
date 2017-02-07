<!DOCTYPE html>
<?php include 'Header.html'; ?>
<html>
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="title" content="Share.gy: Create a note" >
        <meta name="description" content="Create & Share a note instantly">
        <meta name="keywords" content="Share.gy,share content,anonymous file upload,url shortener, note sharing site" >
        <meta http-equiv="X-Frame-Options" content="deny">
        <title>Share.gy: Create a note</title>
    
    
  <script src='https://cdn.tinymce.com/4/tinymce.min.js'></script>
  <script>
  tinymce.init({
    selector: '#mytextarea',
	plugins: 'code',
	height:'500'

  });
  </script>
  

<style>
/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    -webkit-animation-name: fadeIn; /* Fade in the background */
    -webkit-animation-duration: 0.4s;
    animation-name: fadeIn;
    animation-duration: 0.4s
}

/* Modal Content */
.modal-content {
    position: fixed;
    bottom: 0;
    background-color: #fefefe;
    width: 100%;
    -webkit-animation-name: slideIn;
    -webkit-animation-duration: 0.4s;
    animation-name: slideIn;
    animation-duration: 0.4s
}

/* The Close Button */
.close {
    color: white;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}

.modal-header {
    padding: 2px 16px;
    background-color: #559BDB;
    color: white;
    box-shadow: 0px 0px 4px blue;
}

.modal-body {
      /* background-color: #f57d2d;*/
     
    padding: 40px 16px;
border-color: transparent;
box-shadow: 0px 0px 4px blue;
font-size: 22px !important;
text-align: center;

color: #ffffff !important;
background: #f57d2d;
margin: 20px;
padding: 15px;
padding-left: 0px;
padding-right: 0px;
width: 500px;

}

.modal-footer {
    padding: 2px 16px;
    background-color: #559BDB;
    color: white;
    box-shadow: 0px 0px 4px blue;
}

/* Add Animation */
@-webkit-keyframes slideIn {
    from {bottom: -300px; opacity: 0} 
    to {bottom: 0; opacity: 1}
}

@keyframes slideIn {
    from {bottom: -300px; opacity: 0}
    to {bottom: 0; opacity: 1}
}

@-webkit-keyframes fadeIn {
    from {opacity: 0} 
    to {opacity: 1}
}

@keyframes fadeIn {
    from {opacity: 0} 
    to {opacity: 1}
}

/*Custom*/

.id_10{
  border-color: transparent;
  box-shadow: 0px 0px 4px blue;
  font-size: 20px;
  text-align: center;
  
  alignment-adjust: central;
  color: #ffffff !important;
background: #559bdb;
margin:  20px;
padding: 5px;
margin-top: 40px;
padding-left: 20px;
padding-right: 20px;
width: 70%;
}

/*Modal button*/

#modal-button{
    border-color: transparent;
box-shadow: 0px 0px 4px blue;
font-size: 20px;
text-align: center;

color: #ffffff !important;
background: #f57d2d;
margin: 5px;
padding: 5px;
padding-left: 40px;
padding-right: 40px;
}


#shortURL{
   background: #f57d2d; 
    border-color: transparent;
    color: #ffffff !important;
    font-size: 22px;
    
}*::-webkit-input-placeholder {
    color : rgb(211,211,211);
</style>
</head>

<body>
    <form method="post" action="Backend/ProcessData.php"><center>
            <input type="text" class="id_10"  placeholder="Enter your post title" value="<?php echo filter_input(INPUT_GET,'title',FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?>" name="title"/>
  
    <textarea id="mytextarea" name="noteContent">Start writing your note here. . .</textarea>
  
<input type="button" id="post" class="id_10" value="Submit"/>

<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times</span>
      <h2>Choose a Link</h2>
    </div>
    <div class="modal-body">
        <label>http://Share.gy/</label> <input type="text" id="shortURL"  placeholder="<Randomly Generate>" name="shortUrl"/>
    </div>
      <label style="text-size:3pt!important;" id="shortUrlAvailability"></label>
    <div class="modal-footer">
        <input type="hidden" value="Note" id="q7_input7" name="q7_input7"/>
        <input type="submit" id="modal-button" value="Create & Start sharing"/>
    </div>
  </div>

</div>
</center>
</form>

<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("post");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
</body>




<!--ShortURL availability check-->

<script type="text/javascript" src="Libraries/jquery-1.11.3-jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{    
	$("#shortURL").keyup(function()
	{		
		var name = $(this).val();	
		
		if(name.length > 3)
		{		
			$("#shortUrlAvailability").html('checking...');
			
			/*$.post("username-check.php", $("#reg-form").serialize())
				.done(function(data){
				$("#result").html(data);
			});*/
			
			$.ajax({
				
				type : 'POST',
				url  : 'Backend/ShortURL-Availability.php',
				data : $(this).serialize(),
				success : function(data)
						  {
					         $("#shortUrlAvailability").html(data);
					      }
				});
				return false;
			
		}
		else
		{
			$("#shortUrlAvailability").html('');
		}
	});
	
});
</script>
</html>
