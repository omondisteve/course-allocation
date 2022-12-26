
<?php 
include ("./db-connect.php");
session_start();

if(isset($_SESSION['email'])){
  if($_SESSION['role'] == "student" ){
   header("location:student/index.php");
  } else if($_SESSION['role'] == "admin"){
    header("location:admin/index.php");
  } else if($_SESSION['role'] =="lecturer"){
    header("location:lecturer/index.php");
  } else if($_SESSION['role'] == "faculty"){
    header("location:faculty/index.php");
  }
}




?>



<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" 
          rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/login.css">
    <title>Login | Course Allocation</title>
</head>

<body>

    <div class="container">
    <form action="login-username.php" method="post">
    <?php
      if(isset($_SESSION['login'])){
        echo $_SESSION['login'];
      }?>
        <div class="mb-3">
          <label for="username" 
                 class="form-label">Username</label>
            <input type="text"
                   name="username" 
                   class="form-control" id="username">
          <div id="usernameHelp" 
               class="form-text">Your Username is your registration no. or Staff ID</div>
        </div>
       
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" 
                 name="password"
                 class="form-control" id="password">
        </div>
        <button name="submit" type="submit" class="btn btn-primary">Login</button>
      </form>
    </div>
  </div> 
</body>
</html>

