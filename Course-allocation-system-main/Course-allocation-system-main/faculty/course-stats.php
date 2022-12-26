<?php
session_start();
include_once("../db-connect.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/display.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/fontawesome.min.css" integrity="sha512-giQeaPns4lQTBMRpOOHsYnGw1tGVzbAIHUyHRgn7+6FmiEgGGjaG0T2LZJmAPMzRCl+Cug0ItQ2xDZpTmEc+CQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script defer src="../scripts/script.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
    <script defer src="https://kit.fontawesome.com/522abbd9b9.js" crossorigin="anonymous"></script>
    <title>Course stats</title>
</head>
<body>
    <aside class="side-bar">
        <div class='side-container'>
        <div>
        <i class="fa-solid fa-house icon-house"></i>
        </div>
        <a href="index.php"><div class="text">Home</div></a>
        </div-side-container>
        <div class='side-container'>
        <div>
        <i class="fa-solid fa-chart-simple icon-house"></i>
        </div>
        <a href="course-stats.php"><div class="text">Course stats</div></a>
        </div-side-container>
    
    
    </aside>
    <main class="main-content">
        <h1>Courses</h1>
       

        <table class="table table-bordered faculty-table">
  <thead>
    <tr>
      <th scope="col">Student Name</th>
      <th scope="col">Course Name</th>
      <th scope="col">Course Cost</th>
      <th scope="col">Duration</th>
      <th>Action</th>
      
    </tr>
  </thead>
  <?php
  $sql = "SELECT students.student_name, courses.course_name, courses.course_duration,courses.course_fee
  FROM students
  INNER JOIN courses ON students.id=courses.id";
  $result = mysqli_query($conn, $sql);
  $count = mysqli_num_rows($result);

  if($count > 0){
    while($row = mysqli_fetch_assoc($result)){
         $studentname = $row['student_name'];
         $coursename = $row['course_name'];
         $coursecost = $row['course_fee'];
         $courseduration = $row['course_duration'];
    
  
  
  ?>
  <tbody>
    <tr>
      <td><?php echo $studentname;?></td>
      <td><?php echo $coursename;?></td>
      <td>Ksh. <?php echo $coursecost;?></td>
      <td><?php echo $courseduration;?></td>
    </tr>
  </tbody>
    <?php
        }
    } ?>
</table>

 <!-- Semester page links -->
 <nav class="my-4">
              <ul class="pagination pagination-circle pg-blue mb-0">
                <li class="page-item disabled">
                  <a class="page-link">Previous</a>
                </li>
                <li class="page-item disabled">
                  <a class="page-link" aria-label="Next">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                  </a>
                </li>
                <!-- Semester numbers -->
                <li class="page-item active">
                  <a class="page-link">1</a>
                </li>
                <li class="page-item">
                  <a class="page-link">2</a>
                </li>
                <li class="page-item">
                  <a class="page-link">3</a>
                </li>
                <li class="page-item">
                  <a class="page-link">4</a>
                </li>
                <!-- Right Arrow -->
                <li class="page-item">
                  <a class="page-link" aria-label="Previous">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                  </a>
                </li>
                <li class="page-item">
                  <a class="page-link">Next</a>
                </li>
              </ul>
            </nav>
    </main>
    
</body>
</html>