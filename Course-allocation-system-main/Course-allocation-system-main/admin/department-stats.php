
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
    <title>Lecturer stats</title>
</head>
<body>
    <aside class="side-bar">
        <div class='side-container'>
        <div>
        <i class="fa-solid fa-house icon-house"></i>
        </div>
        <a href="index.php"><div class="text">Home</div></a>
        </div>
        <div class='side-container'>
        <div>
        <i class="fa-solid fa-chart-simple icon-house"></i>
        </div>
        <a href="student-stats.php"><div class="text">Lecturer stats</div></a>
        
        </div>
    
    
    </aside>
    <main class="main-content">
        <h1>Department information</h1>
        <a href="department-setup.php" style="text-decoration:none"class="btn-link">Add Faculty</a>

        <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Faculty Coordinator</th>
      <th scope="col">Faculty/Department</th>
      <th scope="col">No of Courses</th>
      <th scope="col">No of Lecturers</th>
      <th scope="col">No of students</th>
      
      
    </tr>
  </thead>
  <?php

    $sql= "SELECT departments.department_head,COUNT(DISTINCT lecturers.id) as lec_num,COUNT(DISTINCT courses.id) as course_num,COUNT(DISTINCT students.id) as stude_no,departments.department_name FROM departments LEFT JOIN courses on departments.id = courses.department_id LEFT JOIN lecturers ON courses.department_id=lecturers.department_id LEFT JOIN students on lecturers.department_id = students.department_id GROUP by departments.department_name";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
  
      $departments = $row['department_name'];
      $hod = $row['department_head'];
      $lec_count = $row['lec_num'];
      $course_count = $row['course_num'];
      $student_count = $row['stude_no'];

  
    
  ?>
  <tbody>
    <tr>
      <td><?php echo $hod;?></td>
      <td><?php echo $departments;?></td>
      <td><?php echo $course_count?></td>
      <td><?php echo $lec_count;?></td>
      <td><?php echo $student_count;?></td>
    </tr>
  </tbody>

  <?php }?>
    
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