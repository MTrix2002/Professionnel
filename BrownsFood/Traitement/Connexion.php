<?php
function connectDB(){
try{
 $bdd = new PDO('mysql:host=localhost;dbname=kallen;charset=utf8', 'Os', '');
 $bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
 $bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
return $bdd;
}
catch (PDOException $e){
   
    var_dump($e);
    return null;
}}
?>