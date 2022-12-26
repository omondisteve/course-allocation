
<?php  
include_once("../db-connect.php");



$sql = 
SELECT departments.department_head, count(*) as 'COUNT',COUNT(*)as count2,COUNT(*) as count3,departments.department_name FROM lecturers INNER JOIN departments on lecturers.department_id = departments.id INNER JOIN courses ON departments.id = courses.department_id INNER JOIN students on courses.department_id = students.department_id GROUP by (departments.department_name)";
$sql2 = "SELECT departments.department_head,COUNT(DISTINCT lecturers.id) as 'COUNT',COUNT(DISTINCT courses.id) as count,departments.department_name,courses.course_name FROM departments LEFT JOIN courses on departments.id = courses.department_id LEFT JOIN lecturers ON courses.id=lecturers.department_id GROUP by departments.department_name";
$result = $conn->query($sql);
if ($result) {
    if ($row = $result->fetch_assoc()) {
       // insert student here using $row['new_id']
      echo $row['student_reg_no'];
    }
}


?>
        
        

        