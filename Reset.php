<?php
include('./connectionDb.php');

if(isset($_POST['Reset'])){ 
    $pass = $_POST['pass'];
    $Cpass = $_POST['Cpass'];
    $Email = $_POST['email']; 

    if($pass === $Cpass){
        $Hash=password_hash($pass,PASSWORD_DEFAULT);
        $query = "UPDATE `register` SET pass = '$Hash' WHERE email = '$Email'";

       $Query=mysqli_query($connection,$query);
       
       if($Query){
            echo "Password updated";
            header("Location:./Login.php");
        }else{
           json_encode(["mess"=>"Updated Failed"]);
    
       }
    }
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Reset Pass</h1>
    <div class="reset-container">
        <form action="" method="post">
            <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter Email" required><br>
            <input type="Password" class="form-control" name="pass" aria-describedby="emailHelp" placeholder="Enter Password" required><br>
            <input type="Password" class="form-control" name="Cpass" aria-describedby="emailHelp" placeholder="Confirm PAssword " required>
            <div class="d-flex justify-content-center">
                <button type="submit" name="Reset" class="btn btn-primary">Reset</button>
            </div>
        </form>
    </div>
</body>
</html>