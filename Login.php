
<?php
include('./connectionDb.php');

if(isset($_POST['login'])){
    $lemail=$_POST['Lemail'];

    $query="select * from register where email='$lemail'";

    $data=mysqli_query($connection,$query);
    $rowsEmail=mysqli_num_rows($data);
    
    if($rowsEmail>0){
        $lpassword=$_POST['Lpassword'];
        $query="select pass from register where email='$lemail'";
        $data=mysqli_query($connection,$query);
        print_r($data);
        if (mysqli_num_rows($data) > 0) {
           
            $row = mysqli_fetch_assoc($data);
            $Dbpass = $row['pass'];

        
        $PassResult=password_verify($lpassword,$Dbpass);
            if( $PassResult){
                header("Location:./Home.php");
            }else{
                echo "PassWord doesnt Match";
            }
        }else{
        echo "Enter valid email";
    }
}else{
    echo "Enter valid Creds";
}
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center ">
        <div class="col-md-4">
            <div class="card p-4">
                <h3 class="text-center mb-4">Login</h3>
                <form action="" method="post">
                    <div class="mb-3">
                        <input type="email" class="form-control" name="Lemail" placeholder="Enter email" required>
                    </div>

                    <div class="mb-3">
                        <input type="password" class="form-control" name="Lpassword" placeholder="Password" required>
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" name="login" class="btn btn-primary">Login</button>
                        <a href="./Reset.php" class="text-decoration-none">Reset Password?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


</body>
</html>



