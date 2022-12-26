<?php
include '../db-connect.php';
// Get the user id
 $user_id = $_REQUEST['id'];

// Database connection


if ($user_id !== "") {
	
	// Get corresponding first name and
	// last name for that user id	
	$query = mysqli_query($conn, "SELECT students.student_name, students.email, departments.department_name FROM students INNER JOIN departments ON students.department_id=departments.id WHERE students.id='$user_id'");

	$row = mysqli_fetch_array($query);

	// Get the first name
	$student_name = $row["student_name"];

	// Get the first name
	$student_email = $row["email"];

    $student_department = $row["department_name"];  

}

// Store it in a array
$result = array("$student_name", "$student_email", "$student_department");

// Send in JSON encoded form
echo $myJSON = json_encode($result);

?>