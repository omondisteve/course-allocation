<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/fontawesome.min.css" integrity="sha512-giQeaPns4lQTBMRpOOHsYnGw1tGVzbAIHUyHRgn7+6FmiEgGGjaG0T2LZJmAPMzRCl+Cug0ItQ2xDZpTmEc+CQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script defer src="../scripts/script.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
    <script defer src="https://kit.fontawesome.com/522abbd9b9.js" crossorigin="anonymous"></script>
    
    <title>Course allocation system</title>
</head>

<body>
    <div class="header">
        <?php if(isset($_SESSION['login'])){
            echo $_SESSION['login'];
            
        }
    ?></div>
    <div class="side-bar">
        <div class="side-bar-header">
            <div>
                <img src="../assets/icons/icons8-dashboard-layout-48.png" alt="">
            </div>
            <div class="text">T.U.K admin</div>
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
            <a href="application-stats.php"><div class="text">Application statistics</div></a>
            <div>
                <img src="../assets/icons/stats.svg" alt="">
            </div>
            <a href="student-stats.php"><div class="text">Student statistics</div></a>
            <div>
                <img src="../assets/icons/stats.svg" alt="">
            </div>
            <a href="lecturer-stats.php"><div class="text">Lecturer statistics</div></a>
            <div>
                <img src="../assets/icons/stats.svg" alt="">
            </div>
            <a href="department-stats.php"><div class="text">Department statistics</div></a>
            <div>
            <i class="fa-solid fa-pen-to-square" style="color:white; font-size:50px;"></i>
            </div>
            <a href="enroll.php"><div class="text">Enroll in course</div></a>
            <div>
            <i class="fa-solid fa-pen-to-square" style="color:white; font-size:50px;"></i>
            </div>
            <a href="class.php"><div class="text">Allocate classroom</div></a>

        </div>
    </div>

    </div>
    <div class="grid main-content">
        <div class="box content-1">
            <div>
                <img src="../assets/icons/home.svg" alt="">
            </div>
            <a href="dashboard.php">
            <div class="text">
                Dashboard
            </div>
            </a>
            
        </div>
        <div class="box content-2">
            <div>
                <img src="../assets/icons/Vector.svg" alt="">
            </div>
            <a class="a-tag" href="lecturer.php">
            <div class="text">
                Lecturers
            </div>
            </a>
        </div>
        <div class="box content-3">
            <div>
                <img src="../assets/icons/applic.png" alt="">
            </div>
            <a href="course-assign-to-teacher.php">
            <div class="text">
                Assign course to lecturer
            </div>
            </a>
        </div>
        <div class="box content-4">
            <div>
                <img src="../assets/icons/depart.svg" alt="">
            </div>
            <a href="department-setup.php">
            <div class="text">
                Department/Faculties
            </div>
            </a>
           
        </div>
        <div class="box content-5">
            <div>
                <img src="../assets/icons/Vector.svg" alt="">
            </div>
            <a href="student.php">
            <div class="text">
                Students
            </div>
            </a>
           
        </div>
        <div class="box content-6">
            <div>
                <img src="../assets/icons/stats.svg" alt="">
            </div>
            <a href="course-stats.php">
            <div class="text">
                View course Statistics
            </div>
            </a>
        </div>
        <div class="box content-7">
            <div>
                <img src="../assets/icons/form.svg" alt="">
            </div>
            <a href="course-setup.php">
            <div class="text">
                Courses
            </div>
            </a>
            
        </div>
        <div class="box content-8">
            <div>
                <img src="../assets/icons/applic.png" alt="">
            </div>
            <a href="application-stats.php">
            <div class="text">
                Applications Statistics
            </div>
            </a>
           
        </div>
    </div>
</body>

</html>