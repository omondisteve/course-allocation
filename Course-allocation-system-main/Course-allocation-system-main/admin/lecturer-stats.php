
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
        <h1>Lecturer information</h1>
        <a href="lecturer.php" style="text-decoration:none"class="btn-link">Register Lecturer</a>

        <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Lecturer Name</th>
      <th scope="col">Faculty/Department</th>
      <th scope="col">Courses</th>
      <th scope="col">Lessons</th>
      <th>Action</th>
      
    </tr>
  </thead>
  <?php
  $sql = "SELECT lecturers.lecturer_name, courses.course_name,courses.credit,departments.department_name,course_assign_to_teachers.department_id,course_assign_to_teachers.teacher_id,course_assign_to_teachers.course_id FROM lecturers INNER JOIN course_assign_to_teachers ON lecturers.id=course_assign_to_teachers.teacher_id INNER JOIN courses ON course_assign_to_teachers.course_id = courses.id INNER JOIN departments ON courses.department_id = departments.id";
  $result = mysqli_query($conn, $sql);
  $count = mysqli_num_rows($result);

  if($count > 0){
    while($row = mysqli_fetch_assoc($result)){
         $lecturer = $row['lecturer_name'];
         $department = $row['department_name'];
         $coursename = $row['course_name'];
         $coursecredit = $row['credit'];
    
  
  
  ?>
  <tbody>
    <tr>
      <td><?php echo $lecturer;?></td>
      <td><?php echo $department;?></td>
      <td><?php echo $coursename;?></td>
      <td><?php echo $coursecredit;?></td>
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