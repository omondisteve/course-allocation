<?php
include '../db-connect.php';
// Get the user id
 $user_id = $_REQUEST['id'];

// Database connection


if ($user_id !== "") {
	
	// Get corresponding first name and
	// last name for that user id	
	
    $sql = "SELECT credit_to_be_taken FROM lecturers WHERE id='$user_id'";
    $result = mysqli_query($conn, $sql);

	while($row = mysqli_fetch_assoc($result)){
          // Get the first name
            $credit = $row['credit_to_be_taken'];
    }   
}

// Store it in a array
 
      $result = array("$credit");

     echo $myJSON = json_encode($result);



 

// Send in JSON encoded form


?>