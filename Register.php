<?php
 include('./connectionDb.php');

  if(isset($_POST['submit'])){
    $email = $_POST['email'];
    if(filter_var($email,FILTER_VALIDATE_EMAIL)){
      $query="Select * from register where email='$email'";
      $result=mysqli_query($connection,$query);
      $rows=mysqli_num_rows($result);
      if($rows>0){
        echo "Email ALready exist";
      }else{
        $password = $_POST['password'];
        $strLEngth=strlen($password);
        if($strLEngth>6){
          $hashPass=password_hash($password,PASSWORD_DEFAULT);
          $gender = $_POST['gender'];
          $file1=$_FILES['file1']['name'];
          $file2=$_FILES['file2']['name'];
          $file3=$_FILES['file3']['name'];
          $file4=$_FILES['file4']['name'];
          $education = $_POST['Education'];
          $institute = $_POST['institute'];
          $location = $_POST['location'];

  
         //------db insert
  
        $query="insert into register values('$email','$hashPass','$gender','$file1','$education','$institute','$location','$file2','$file3','$file4')";
        $Query=mysqli_query($connection,$query);
        
              if($Query){
                  echo "sucess";
                  $uploadFile='./img/'.$file1;
                  move_uploaded_file($_FILES['file1']['tmp_name'],$uploadFile);
                  $uploadFile='./img/'.$file2;
                  move_uploaded_file($_FILES['file2']['tmp_name'],$uploadFile);
                  $uploadFile='./img/'.$file3;
                  move_uploaded_file($_FILES['file3']['tmp_name'],$uploadFile);
                  $uploadFile='./img/'.$file4;
                  move_uploaded_file($_FILES['file4']['tmp_name'],$uploadFile);
              }else{
                  echo "Unsucess";
      
              } 
        }else{
          echo "password length should be more than 6 char";
          
        }
      }
     
           


    }else{
      
      echo "Invalid email";
    }


    


  }else{
    echo '';
  }
?>









<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Registration</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0;
        }
        .registration-container {
            padding: 30px;
            border-radius: 10px;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-control {
            border-radius: 5px;
        }
        .btn-primary {
            width: 100%;
            padding: 10px;
            font-size: 16px;
        }
        .gender-labels {
            display: flex;
            gap: 15px;
        }
        .gender-labels input {
            margin-right: 5px;
        }
        select, input[type="file"] {
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="registration-container">
            <h3 class="text-center mb-4">Registration</h3>

            <div class="form-group">
                <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email" required>
            </div>

            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>

            <div class="form-group">
                <label>Gender:</label><br>
                <div class="gender-labels">
                    <label><input type="radio" name="gender" value="male" id="male"> Male</label>
                    <label><input type="radio" name="gender" value="female" id="female"> Female</label>
                    <label><input type="radio" name="gender" value="other" id="other"> Other</label>
                </div>
            </div>

            <div class="form-group">
                <input type="file" name="file1" class="form-control">
                <input type="file" name="file2" class="form-control mt-2">
                <input type="file" name="file3" class="form-control mt-2">
                <input type="file" name="file4" class="form-control mt-2">
            </div>

            <div class="form-group">
                <label for="education">Education*</label><br>
                <select name="Education" class="form-control" required>
                    <option value="--">--</option>
                    <option value="Bsc">BSc</option>
                    <option value="Hsc">HSc</option>
                    <option value="SSC">SSC</option>
                </select>
                <input type="text" class="form-control mt-2" name="institute" placeholder="Name of institute" required>
            </div>

            <div class="form-group">
                <label for="location"> Current City*</label>
                <select name="location" class="form-control" required>
                    <option value="Mumbai">Mumbai</option>
                    <option value="Delhi">Delhi</option>
                    <option value="Kolkata">Kolkata</option>
                    <option value="Punjab">Punjab</option>
                </select>
            </div>

            <div class="d-flex justify-content-center">
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</body>
</html>

