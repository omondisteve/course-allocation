<?php
include_once("../db-connect.php");
session_start();

if(isset($_POST['submit'])){
     $studentRegNo = $_POST['student-reg'];
     $courseID = $_POST['course-name'];

    $sql = "INSERT INTO enroll_in_courses(student_id,course_id,unassigned_course_id) VALUES('$studentRegNo','$courseID',0)";
    $result = mysqli_query($conn,$sql);
    if($result){
          $_SESSION['status'] = "Course enrolled successfully!!!";
         
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
    <script defer src="../scripts/load.js"></script>
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
        <h1 class="head">Enroll in course</h1>
        <?php
        if(isset($_SESSION['status'])){
            ?>
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Hey!</strong><?php echo $_SESSION['status']; ?><br>
 
 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
            <?php
            
            unset($_SESSION['status']);
        }
        
        ?>
    <form method="post" action="#">
    <?php
       
       $sql = "SELECT * from students";
       $result = mysqli_query($conn,$sql); 
       ?>
       <label for="student-reg">Student Reg. No</label><br>
    <select name="student-reg" id="student-reg" onchange="GetDetail(this.value)">
       <option value="select-student-id">--Select Student ID--</option>
       <?php while($row = mysqli_fetch_array($result)):;?>
       <option value="<?php echo $row['id'];?>"><?php echo $row['student_reg_no'];?></option>
       <?php endwhile?>
    </select><br>
    <label for="name">Name</label><br>
        <input type="text" name="student-name" id="student-name" placeholder="Type Student name"><br>
        <label for="Email">Email</label><br>
        <input type="email" name="student-email" id="student-email" placeholder="Type Student email"><br>
        <label for="department">Department</label><br>
        <input type="text" name="student-department" id="student-department" placeholder="Type Student department"><br>
        <?php
       
        $sql = "SELECT * from courses";
        $result = mysqli_query($conn,$sql); 
        ?>
        <label for="course-name">Select course</label><br>
     <select name="course-name">
        <option value="select-course">--Select course--</option>
        <?php while($row = mysqli_fetch_array($result)):;?>
        <option value="<?php echo $row['id'];?>"><?php echo $row['course_name'];?></option>
        <?php endwhile?>
     </select><br>
        <button name='submit' type='submit'>save</button>
    </form>
    </div>



    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</body>

</html>
