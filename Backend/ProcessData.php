<?php

require_once 'InsertData.php';

$shortURL=$_POST['shortUrl'];

//Special chars not allowed
if(!(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['shortUrl']))){
    //header("Location: ../error.html");        die();
}


try{

switch( $_POST['q7_input7'] ){
   
    case "URL":      
        
       // $long_url=  filter_input($_POST['q9_input9'], FILTER_SANITIZE_URL);
        $long_url=$_POST['q9_input9'];
        if((substr(strtolower($long_url),0,10)!="javascript"&&$long_url!=NULL)){
            
            $link=  InsertValuesURL($shortURL,$long_url); //(shortURL,LongURL)
            redirect($link);
            
        }  else {
         //   header("Location: ../error.html");        die();
        }
          break;
   
    case "File": 
             
            $target_dir = "../Uploads_7fd8yghg7e6ybn7/Anonymous/Files/";
            $target_file = $target_dir . basename($_FILES["q8_input8"]["name"]);
            $file_size= basename($_FILES["q8_input8"]["size"]);
                    
            $filename = pathinfo($_FILES['q8_input8']['name'], PATHINFO_FILENAME);
            
            $extension = '.'.pathinfo( $target_file , PATHINFO_EXTENSION);
            $updated_name = $filename.'_'.time().'_'. rand(1000, 999999).$extension;
            
           if((is_uploaded_file($_FILES["q8_input8"]["tmp_name"]))){
           
             move_uploaded_file($_FILES["q8_input8"]["tmp_name"], $target_dir.$updated_name);
            
         
             
             //($shortURL,$title,$saved_file,$extension,$author,$file_size)
            $link= InsertValuesFile($shortURL,$_FILES["q8_input8"]["name"],$updated_name,$extension,'Anonymous',$file_size );
              redirect($link); 
           }
            else {
             //    header("Location: ../error.html");        
                 die();
            }
             
          break;
    case "Note":
        // filter_input()
        //Page Refferer is /CreateNote.php
        
        if($_POST['title']==NULL){
            //Allocating Default Title
            $title='Untitled Note';
        }  else {
            $title=$_POST['title'];
        }
        
        $file_name = $_POST['title'].'_'.time().'_'. rand(1000, 999999).'.txt';
       
        if((file_put_contents('../Uploads_7fd8yghg7e6ybn7/Anonymous/Notes/'.$file_name,$_POST['noteContent']))>0){
       
            $link=InsertValuesNote($shortURL,$title,$file_name,'Anonymous',"0");
            redirect($link);
        }
          break;
      
    case "noteRedirect": 
           header("Location: ../CreateNote.php?title=".$_POST['q10_input10']);        die();
          break;
    
    default : 
       //     header("Location: ../error.html");        die();
}

}  catch (Exception $e){
    
   // header("Location: ../error.html");        die();
}
function redirect($link){
     header("Location: ../ShareUrl.php?link=".$link);        
    die();
}
?>