<?php
include('./connectionDb.php');

// Get the input data
$data = json_decode(file_get_contents('php://input'), true);


$email = $data['email'];
$updatePass = $data['pass'];

if (isset($email) && isset($updatePass)) {
   
    $hashedPass = password_hash($updatePass, PASSWORD_DEFAULT);
    $query = "UPDATE `register` SET `pass`='{$hashedPass}' WHERE email='{$email}'";

$data = mysqli_query($connection, $query);

    
    if ($data) {
        echo json_encode(["mess" => "Password updated successfully"]);
    } else {
        echo json_encode(["mess" => "Failed to update password"]);
    }
} else {
    echo json_encode(['mess' => "Invalid email or password"]);
}
?>
