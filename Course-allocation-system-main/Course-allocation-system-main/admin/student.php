<?php
include_once("../db-connect.php");
session_start();

if(isset($_POST['submit'])){
    $studentname = $_POST['student-name'];
    $studentemail = $_POST['student-email'];
    $studentcontact = $_POST['student-contact'];
    $studentaddress = $_POST['address'];
    $studentdate = $_POST['date'];
    $studentdept = $_POST['dept-name'];
    $studentRegNo = "TUK/".rand(000,999)."/".rand(000,999);


    $sql = "INSERT INTO students(student_name,email,contact_no,address,year,department_id,student_reg_no) VALUES('$studentname','$studentemail','$studentcontact','$studentaddress','$studentdate','$studentdept','$studentRegNo')";
    $result = mysqli_query($conn,$sql);
    if($result){
          $_SESSION['status'] = "Registration done successfully!!!";
         
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
        <h1 class="head">Student setup</h1>
        <?php
        if(isset($_SESSION['status'])){
            ?>
<div class="alert alert-warning alert-dismissible fade show" role="alert">
 <?php echo $_SESSION['status']; ?><br>
 <strong>Student Registration Number:</strong> <?php echo $studentRegNo;?><br>
 <strong>Student Name:</strong> <?php echo $studentname;?><br>
 <strong>Student Email:</strong> <?php echo $studentemail;?><br>
 <strong>Student Contact:</strong> <?php echo $studentcontact;?><br>
 <strong>Student Address:</strong> <?php echo $studentaddress;?><br>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
            <?php
            
            unset($_SESSION['status']);
        }
        
        ?>
    <form method="post" action="#">
        <label for="student-name">Student name</label><br>
       <input type="text" name="student-name" id="student-name" placeholder="Type Student name"><br>
        <label for="Email">Email</label><br>
        <input type="email" name="student-email" id="student-email" placeholder="Type Student email"><br>
        <label for="Contact No">Contact No</label><br>
        <input type="number" min="8"  name="student-contact" id="student-contact" placeholder="Type Student contact"><br>
        <label for="Address">Address</label><br>
        <textarea name="address" id="address" cols="40" rows="5"></textarea><br>
        <label for="date">Date</label><br>
        <input type="date" name="date" id="date"><br>
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
        <button name='submit' type='submit'>save</button>
    </form>
    </div>
</body>

</html>
