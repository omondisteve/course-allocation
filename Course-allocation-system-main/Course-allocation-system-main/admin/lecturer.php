<?php
include_once("../db-connect.php");
session_start();

if(isset($_POST['submit'])){
    $lecname= $_POST['lec-name'];
    $lecaddress = $_POST['address'];
    $lecemail = $_POST['lec-email'];
    $leccontact = $_POST['lec-contact'];
    $lecdesg = $_POST['designation'];
    $lecdep = $_POST['dept-name'];
    $leccred = $_POST['lec-cred'];

    $sql = "INSERT INTO lecturers(department_id,lecturer_name,address,email,contact_no,designation,credit_to_be_taken) VALUES('$lecdep','$lecname','$lecaddress','$lecemail','$leccontact','$lecdesg','$leccred')";
    $result = mysqli_query($conn,$sql);
    if($result){
          $_SESSION['status'] = "Lecturer added successfully!!!";
         
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
    <script defer src="https://kit.fontawesome.com/522abbd9b9.js" crossorigin="anonymous"></script>
    <title>Course allocation system</title>
</head>

<body>
    <div class="header"></div>
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
            <div class="text">Application statistics</div>
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
        </div>
    </div>
    <div class="grid--department main-content-depart">
        <h1 class="head">Lecturer setup</h1>
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
        <label for="lecturer-name">Lecturer name</label><br>
        <input type="text" name="lec-name" id="lec-name" placeholder="Lecturer name"><br>
        <label for="address">Address</label><br>
        <textarea rows="5" cols="50" name="address"id="address"></textarea><br>
        <label for="Email">Email</label><br>
        <input type="email" name="lec-email" id="lec-email" placeholder="Type email"><br>
        <label for="Contact No">Contact No</label><br>
        <input type="text" name="lec-contact" id="lec-contact" placeholder="Type contact number"><br>
        <label for="lec-desg">Designation</label><br>
        <select name="designation" id="desgnation">
            <option value="desgnation">--Select Designation--</option>
            <option value="chairman">Chairman</option>
            <option value="professor">Professor</option>
            <option value="assistant-prof">Assistant Professor</option>
            <option value="assoc-professor">Associate Professor</option>
            <option value="lecturer">Lecturer</option>
        </select><br>
        <?php
       
        $sql = "SELECT * from departments";
        $result = mysqli_query($conn,$sql); 
        ?>
        <label for="department-name">Department name</label><br>
     <select name="dept-name">
        <?php while($row = mysqli_fetch_array($result)):;?>
        <option value="<?php echo $row['id'];?>"><?php echo $row['department_name'];?></option>
        <?php endwhile?>*/
     </select><br>
     <label for="credit">Credit to be taken</label><br>
        <input type="number" name="lec-cred" id="lec-cred" placeholder="Credit taken"><br>
        <button name='submit' type='submit'>save</button>
    </form>
    </div>
</body>

</html>
