<?php
include_once("../db-connect.php");
session_start();
if(isset($_POST['submit'])){
    $depart_code = $_POST['depart-code'];
    $depart_name = $_POST['depart-name'];
    $depart_head = $_POST['depart-head'];

    $sql = "INSERT INTO departments SET department_code='$depart_code',department_name='$depart_name',department_head='$depart_head'";
     $res = mysqli_query($conn,$sql);
     if($res){
        $_SESSION['status'] = "Department added successfully!!!";
     } 
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
    <script defer src="../scripts/script.js"></script>
    <title>Course allocation system</title>
</head>

<body>
    <div class="header">
        <?php if(isset($_SESSION['success'])){
    echo $_SESSION['success'];
   unset($_SESSION['success']);
}
    ?></div>
    <div class="side-bar">
        <div class="side-bar-header">
            <div>
                <img src="../assets/icons/icons8-dashboard-layout-48.png" alt="">
            </div>
            <a href="./index.php"><div class="text">T.U.K admin</div></a>
            
        </div>
        <div class="side-bar-contents">
            <div>
                <img src="../assets/icons/dashboard-solid-48.png" alt="">
            </div>
            <div class="text">Dashboard</div>
            <div>
                <img src="../assets/icons/form.svg" alt="">
            </div>
            <div class="text">Forms</div>
            <div>
                <img src="../assets/icons/pin.svg" alt="">
            </div>
            <div class="text">Application statistics</div>
            <div>
                <img src="../assets/icons/stats.svg" alt="">
            </div>
            <div class="text">Student statistics</div>
            <div>
                <img src="../assets/icons/stats.svg" alt="">
            </div>
            <div class="text">Lecturer statistics</div>
        </div>
    </div>

    </div>
    <div class="grid--department main-content-depart">
        <h1 class="head">Department setup</h1>
        <?php
        if(isset($_SESSION['status'])){
            ?>
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Hey!</strong> <?php echo $_SESSION['status']; ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
            <?php
            
            unset($_SESSION['status']);
        }
        
        ?>
    <form method="post">
        <label for="department-code">Department code</label><br>
        <input type="text" name="depart-code" id="department-code" placeholder="Type department code"><br>
        <label for="department-name">Department name</label><br>
        <input type="text" name="depart-name" id="department-name" placeholder="Type department name"><br>
        <label for="department-head">Department Head</label><br>
        <input type="text" name="depart-head" id="department-head" placeholder="Type department name"><br>
        <button name='submit' type='submit'>save</button>
    </form>
    </div>
</body>

</html>
<?php

   


?>