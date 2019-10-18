<?php
    include('connDB.php');
?>

<?php session_start(); ?>

<?php

if(isset($_POST['submit'])){

$email = $_POST['email'];
$password = $_POST['password'];

$email = mysqli_real_escape_string($dbCon, $email);
$password = mysqli_real_escape_string($dbCon, $password);

$query = "SELECT * FROM users WHERE Email = '{$email}' ";
$result = mysqli_query($dbCon, $query);  

if(!$result){
    die("failed" . mysqli_error($dbCon));
}

    while($row = mysqli_fetch_array($result)) {
        
    $db_email = $row['Email'];
    $db_password = $row['password'];
    $db_user_id = $row['User_ID'];
    $db_username = $row['username'];
    $db_user_role = $row['Role'];
}

 if($email !== $db_email && $password !==  $db_password){
    header("Location: systemLogin.php");

}else if($email == $db_email && $password ==  $db_password){

$_SESSION['username'] = $db_username;
$_SESSION['email'] = $db_email;
$_SESSION['user_role'] = $db_user_role;

    header("Location: ../index.php");
}else{
    header("Location: systemLogin.php");
}

   }
?>
<!-- connection = $dbCon -->

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>User Control Panel</title>
  </head>
  <body>
    

        <div class="container" style="width:50%">
        <br>
        <h2>SYSTEM LOGIN</h2>
        <hr>
        <br>
        <!-- name is essential -->
            <form action="systemLogin.php" method="POST">
                 <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> 
                
                <!-- <input type="text" class="form-control" name="username" id="validationCustomUsername" placeholder="Username" aria-describedby="inputGroupPrepend" required>
                    <div class="invalid-feedback">
                        Please choose a username.
                    </div> -->
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>





        


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>