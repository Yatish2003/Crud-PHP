<?php

include('./connectionDb.php');


$userID=json_decode(file_get_contents("php://input"),true);
$email=$userID['email'];
$query="DELETE FROM `register` WHERE email='{$email}'";

$Query=mysqli_query($connection,$query);
if($Query){
     echo json_encode(["mess"=>"Succces"]);
    }else{
    json_encode(["mess"=>"Fail"]);
   

}

?>