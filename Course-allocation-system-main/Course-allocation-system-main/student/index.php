<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/stude-lec.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script defer src="./scripts/script.js"></script>
    <script defer src="https://kit.fontawesome.com/522abbd9b9.js" crossorigin="anonymous"></script>
    <title>Course allocation system</title>
</head>

<body>
    <div class="header"> 
    <?php
        if(isset($_SESSION["login"])){
            echo $_SESSION['login'];
            unset($_SESSION["login"]);
        }
        ?>
    </div>
    <div class="side-bar">
        <div class="side-bar-header">
            <div>
                <img src="../assets/icons/icons8-dashboard-layout-48.png" alt="">
            </div>
            <div class="text">T.U.K Student</div>
        </div>
        <div class="side-bar-contents">
            <div>
                <img src="../assets/icons/dashboard-solid-48.png" alt="">
            </div>
            <a href="index.php"> <div class="text">Dashboard</div></a>
           

            <div>
                <img src="../assets/icons/form.svg" alt="">
            </div>
            <a href="form.php"><div class="text">Forms</div></a>
            <div>
                <img src="../assets/icons/stats.svg" alt="">
            </div>
            <a href="schedule.php"><div class="text">Schedule</div></a>
        </div>
    </div>

    </div>
    <div class="flex main-content">
        <div class="flex-box">
        <div class="box flex-content-1">
            <div>
                <img src="../assets/icons/home.svg" alt="">
            </div>
            <a href="index.php"> <div class="text">Dashboard</div></a>
        </div>
        <div class="box flex-content-3">
            <div>
                <img src="../assets/icons/stats.svg" alt="">
            </div>
            <a href="schedule.php"><div class="text">Schedule</div></a>
        </div>  
        </div>
    </div>
</body>

</html>