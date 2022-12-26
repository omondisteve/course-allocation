<?php
include_once("../db-connect.php");
session_start();

if(isset($_POST['submit'])){
    $deptname = $_POST['dept-name'];
    $lecturer = $_POST['lec-name'];
    $credittaken = $_POST['credit-taken'];
    $courseid = $_POST['course-code'];
    $coursecredit = $_POST['course-credit'];

    $sql = "INSERT INTO course_assign_to_teachers(department_id,teacher_id,course_id,credit_took,unassigned_course_id) VALUES('$deptname','$lecturer','$courseid','$credittaken',0)";
    $result = mysqli_query($conn,$sql);
    if($result){
           $_SESSION['status'] = "Course assigned successfully!!!";
         
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
    <script src="../scripts/course-assign.js"></script>
    <script src="../scripts/credit.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="../scripts/get-course.js"></script>
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
        <h1 class="head">Assign course to teacher</h1>
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
    <form method="post" id="myForm">
    <?php
       
       $sql = "SELECT * from departments";
       $result = mysqli_query($conn,$sql); 
       ?>
       <label for="department-name">Department name</label><br>
    <select name="dept-name" id="dept-name" onchange="GetDetail(this.value)">
    <option value="select department">---Select department---</option>   
    <?php while($row = mysqli_fetch_array($result)):;?>
       <option value="<?php echo $row['id'];?>"><?php echo $row['department_name'];?></option>
       <?php endwhile?>*/
    </select><br>
   
       <label for="lecturer-name">Lecturer</label><br>
    <select name="lec-name" id="lec-name" onchange="GetCredit(this.value)">
        <option value="select lecturer">---Select lecturer---</option>
    </select><br>
        <label for="credit-taken">Credit to be taken</label><br>
        <input type="number" name="credit-taken" id="credit-taken"><br>
         <?php
       
       $sql = "SELECT * from courses";
       $result = mysqli_query($conn,$sql); 
       ?>
       <label for="course-code">Course code</label><br>
    <select name="course-code" onchange="getCourse(this.value)">
    <option value="select-credit">--Select course credit--</option>
       <?php while($row = mysqli_fetch_array($result)):;?>
       <option value="<?php echo $row['id'];?>"><?php echo $row['course_code'];?></option>
       <?php endwhile?>
    </select><br>
    <?php
       
       $sql = "SELECT * from courses";
       $result = mysqli_query($conn,$sql); 
       ?>
       <label for="course-name">Course Name</label><br>
        <input type="text" name="course-name" id="course-name"><br>
    <label for="course-credit">Course credit</label><br>
        <input type="number" name="course-credit" id="course-credit"><br>
        <button name='submit' type='submit'>save</button>
    </form>
    </div>
</body>

</html>
