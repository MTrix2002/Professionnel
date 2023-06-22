<?php   
session_start();
if(!$_SESSION){

    echo "No User is Connected!";
}
else{
session_destroy(); //destroy the session
header("Location:../index.php"); //to redirect back to "index.php" after logging out
exit();
}
?>