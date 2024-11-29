<?php
include('./connectionDb.php');

$query='select * from register';
$Query=mysqli_query($connection,$query);

$dbValues=mysqli_fetch_all($Query,MYSQLI_ASSOC);


$jsonData=json_encode($dbValues);

print_r($jsonData);

?>