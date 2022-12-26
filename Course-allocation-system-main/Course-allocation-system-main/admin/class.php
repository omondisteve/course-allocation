<?php
include_once("../db-connect.php");
session_start();

if(isset($_POST['submit'])){
    $department = $_POST['dept-name'];
    $course = $_POST['course-name'];
    $room = $_POST['room'];
    $day = $_POST['day'];
    $from = $_POST['from'];
    $to = $_POST['to'];
    $status = 1;

    $sql = "INSERT INTO `allocate_classrooms` ( `department_id`, `course_id`, `room_id`, `day`, `from`, `to`, `status`) VALUES ( '$department', '$course', '$room', '$day', '$from', '$to', '$status' )";
    $result = mysqli_query($conn,$sql);

    if($result){
        $_SESSION['status'] = "Classroom allocated successfully!!!";
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
    <script defer src="../scripts/script.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
    <title>Course allocation system</title>
</head>

<body>
    <div class="header"></div>
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
            
        </div>
    </div>

    </div>
    <div class="grid--department main-content-depart">
        <h1 class="head">Allocate classroom</h1>
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
    <form method="post" action="#">
        <?php
       
        $sql = "SELECT * from departments";
        $result = mysqli_query($conn,$sql); 
        ?>
        <label for="department-name">Department name</label><br>
     <select name="dept-name">
        <option value="select-department">--Select department--</option>
        <?php while($row = mysqli_fetch_array($result)):;?>
        <option value="<?php echo $row['id'];?>"><?php echo $row['department_name'];?></option>
        <?php endwhile?>
     </select><br>
     <?php
       
        $sql = "SELECT * from courses";
        $result = mysqli_query($conn,$sql); 
        ?>
        <label for="course-name">Course name</label><br>
     <select name="course-name">
        <option value="select-department">--Select course--</option>
        <?php while($row = mysqli_fetch_array($result)):;?>
        <option value="<?php echo $row['id'];?>"><?php echo $row['course_name'];?></option>
        <?php endwhile?>
     </select><br>
     <label for="room-no">Room No</label><br>
     <select name="room" id="room">
        <option value="select-room">--- Select room ---</option>
        <option value="1">101</option>
        <option value="2">102</option>
        <option value="3">103</option>
        <option value="4">104</option>
        <option value="5">105</option>
     </select><br>
     <label for="day">Day</label><br>
     <select name="day" id="day">
        <option value="select-room">--- Select room ---</option>
        <option value="monday">Monday</option>
        <option value="tuesday">Tuesday</option>
        <option value="wednesday">Wednesday</option>
        <option value="thursday">Thursday</option>
        <option value="friday">Friday</option>
        <option value="saturday">Saturday</option>
        <option value="sunday">Sunday</option>
     </select><br>
     <label for="from">From</label><br>
     <input type="time" name="from" id="from"><br>
     <label for="to">To</label><br>
     <input type="time" name="to" id="to"><br>
        <button name='submit' type='submit'>save</button>
    </form>
    </div>
</body>

</html>
