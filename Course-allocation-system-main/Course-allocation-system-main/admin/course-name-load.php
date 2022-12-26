<?php
include '../db-connect.php';
// Get the user id
 $user_id = $_REQUEST['id'];

// Database connection


if ($user_id !== "") {
	
	// Get corresponding first name and
	// last name for that user id	
	
    $sql = "SELECT course_name,credit FROM courses  WHERE id='$user_id'";
    $result = mysqli_query($conn, $sql);

	while($row = mysqli_fetch_assoc($result)){
          // Get the first name
            $course_name = $row['course_name'];
            $credit = $row['credit'];
    }   
}

// Store it in a array
 
    $result = array("$course_name","$credit");

     echo $myJSON = json_encode($result);



 

// Send in JSON encoded form


?>