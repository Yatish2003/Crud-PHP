<?php
include('./connectionDb.php');

$data = json_decode(file_get_contents('php://input'), true);
$id=$data['id'];

$query = "SELECT * FROM register WHERE id = $id";
$data=mysqli_query($connection,$query);
$dbData=mysqli_fetch_all($data,MYSQLI_ASSOC);
print_r(json_encode($dbData));

?>