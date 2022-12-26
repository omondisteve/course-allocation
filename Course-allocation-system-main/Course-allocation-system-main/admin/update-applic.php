<?php
include_once("../db-connect.php");
session_start();

if (isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT student_applications.id,student_applications.first_name,student_applications.last_name,student_applications.course_category,student_applications.status,courses.course_name FROM student_applications INNER JOIN courses on student_applications.course_id =courses.id WHERE student_applications.id =$id";
    $result = mysqli_query($conn,$sql);
    $count = mysqli_num_rows($result);

    if($count == 1){
        $row = mysqli_fetch_assoc($result);

         $firstname = $row['first_name'];
         $lastname = $row['last_name'];
         $coursecategory = $row['course_category'];
         $coursename = $row['course_name'];
         $status = $row['status'];

    } else {
        header("Location:".SITEURL."admin/application-stats.php");
    }
} else {
    header("Location:".SITEURL."admin/application-stats.php");
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
        <h1 class="head">Update applications</h1>
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
       <input type="text" name="student-name" id="student-name"  placeholder="Type Student name" value="<?php echo $firstname.' '.$lastname;?>" readonly><br>
        <label for="course-category">Course Category</label><br>
        <input type="text" name="course-category" id="course-category" placeholder="course category" value="<?php echo $coursecategory;?>" readonly><br>
        <label for="course name">Course Applied</label><br>
        <input type="text"  name="course-name" id="course-name" placeholder="Type Student contact" value="<?php echo $coursename;?>" readonly><br>
        <label for="status">Status</label><br>
     <select name="status">
        <option <?php if($status=="pending"){echo "selected";}?> value="pending">Pending</option>
        <option <?php if($status=="view"){echo "selected";}?> value="view">View</option>
        <option <?php if($status=="approved"){echo "selected";}?> value="approved">Approved</option>
        <option <?php if($status=="cancelled"){echo "selected";}?> value="cancelled">Cancelled</option>
     </select><br>
        <button name='submit' type='submit'>save</button>
    </form>
    </div>
</body>

</html>
<?php
if(isset($_POST['submit'])){
    echo $status = $_POST['status'];
    $sql2 = "UPDATE student_applications SET status = '$status' WHERE id ='$id'";
    $result2 = mysqli_query($conn,$sql2);

    if($result2){
        $_SESSION['update'] = "<div class='success'>Application updated successfully!!!</div>";
        header('location:'.SITEURL.'admin/application-stats.php');
    } else {
        $_SESSION['update'] = "<div class='error'>Application not updated,something wrong happened!!!</div>";
        header('location:'.SITEURL.'application-stats.php');
    }
}


?>