<?php
require_once "Connexion.php";
$db=ConnectDB();
if(isset($_REQUEST['btn_Envoyer']))
{
 try
 {
  $name = $_REQUEST['txt_name']; //textbox name "txt_name"
  $image_file = $_FILES["txt_file"]["name"];
  $type  = $_FILES["txt_file"]["type"]; //file name "txt_file"
  $size  = $_FILES["txt_file"]["size"];
  $temp  = $_FILES["txt_file"]["tmp_name"];
  $path="upload/".$image_file; //set upload folder path
  if(empty($name)){
   $errorMsg="Please Enter Name";
  }
  else if(empty($image_file)){
   $errorMsg="Please Select Image";
  }
  else if($type=="image/jpg" || $type=='image/jpeg' || $type=='image/png' || $type=='image/gif') //check file extension
  {
   if(!file_exists($path)) //check file not exist in your upload folder path
   {
    if($size < 5000000) //check file size 5MB
    {
     move_uploaded_file($temp, "upload/" .$image_file); //move upload file temperory directory to your upload folder
    }
    else
    {
     $errorMsg="Your File To large Please Upload 5MB Size"; //error message file size not large than 5MB
    }
   }
   else
   {
    $errorMsg="File Already Exists...Check Upload Folder"; //error message file not exists your upload folder path
   }
  }
  else
  {
   $errorMsg="Upload JPG , JPEG , PNG & GIF File Formate.....CHECK FILE EXTENSION"; //error message file extension
  }
  if(!isset($errorMsg))
  {
   $Envoyer_stmt=$db->prepare('Envoyer INTO tbl_file(name,image) VALUES(:fname,:fimage)'); //sql Envoyer query    
   $Envoyer_stmt->bindParam(':fname',$name);
   $Envoyer_stmt->bindParam(':fimage',$image_file);   //bind all parameter
   if($Envoyer_stmt->execute())
   {
    $EnvoyerMsg="Photo enregistrée"; //execute query success message
    
    echo "<script type='text/javascript'>window.alert('$EnvoyerMsg');</script>";
   }
  }
 }
 catch(PDOException $e)
 {
  echo $e->getMessage();
 }
}
?>








