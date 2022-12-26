<?php
include '../db-connect.php';
// Get the user id
 $user_id = $_REQUEST['id'];

// Database connection


if ($user_id !== "") {
	
	// Get corresponding first name and
	// last name for that user id	
	
    $sql = "SELECT lecturers.id,lecturers.lecturer_name,lecturers.department_id FROM lecturers INNER JOIN departments ON lecturers.department_id=departments.id WHERE lecturers.department_id='$user_id'";
    $result = mysqli_query($conn, $sql);

	while($row = mysqli_fetch_assoc($result)){
          // Get the first name
            $rows[] = $row;
    }   
}

// Store it in a array
 
    

     echo $myJSON = json_encode($rows);



 

// Send in JSON encoded form


?>