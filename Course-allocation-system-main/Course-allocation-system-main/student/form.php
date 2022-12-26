<?php
include_once("../db-connect.php");
session_start();

if(isset($_POST['submit'])){
      $firstname = $_POST['f-name'];
      $lastname = $_POST['l-name'];
      $date = $_POST['birth-date'];
      $contact = $_POST['contact'];
      $email = $_POST['email'];
      $city = $_POST['city'];
      $county = $_POST['county'];
      $pbox = $_POST['p-box'];
      $location = $_POST['location'];
      $gender = $_POST['gender'];
      $coursecateg = $_POST['course-category'];
      $courseid = $_POST['course-id'];
      $status = "pending";

    $sql = "INSERT INTO student_applications(first_name,last_name,date,phone_no,email,city,county,p_box,location,gender,course_category,course_id,status) VALUES('$firstname','$lastname','$date','$contact','$email','$city','$county','$pbox','$location','$gender','$coursecateg','$courseid','$status')";
    $result = mysqli_query($conn,$sql);

    if($result){
        $_SESSION['status'] = "Personal details inserted successfully!!!!";
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/form.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
    <title>Coures Allocation system</title>
</head>
<body class="body-form">
       <p class="heading">Student form 32a</p>
       <div class="wrapper">
       <?php
        if(isset($_SESSION['status'])){
            ?>
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Hey!</strong><?php echo $_SESSION['status']; ?><br>
 
 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
            <?php
            
            unset($_SESSION['status']);
        }
        
        ?>
            <h1 class="person-dets">Person details</h1>
            <div class="form">
                <form method="post" action="#">
                <label for="full name">Full Name</label><br>
                <span><input class="form-box" type="text" name="f-name" id="f-name" placeholder="First"></span> 
                <span><input class="form-box" type="text" name="l-name" id="l-name" placeholder="Last"></span> <br>
                <label for="birth-date">Birth Date</label> <br>
                <input class="b-date" type="date" name="birth-date" id="birth-date"><br>
                <div class="flex-form">
                     <div>
                         <label for="contact">Phone Number</label> <br>
                         <input class="form-box" type="tel" name="contact" id="contact"  pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="Format: 123-456-7890">
                     </div>
                     <div>
                         <label for="email">Email</label> <br>
                         <input class="form-box"  type="email" name="email" id="email" placeholder="Email">  
                     </div>
                </div>
                <label for="address">Physical Address</label><br>
                <div class="grid-form box">
                  <input class="form-box" type="text" name="city" id="city" placeholder="City">
                  <input class="form-box" type="text" name="county" id="county" placeholder="County">
                  <input class="form-box" type="text" name="p-box" id="p-box" placeholder="P.O.Box">
                  <input class="form-box" type="text" name="location" id="location" placeholder="Location">
                </div>
                <div class="flex-form">
                    <label>Male<input type="radio" name="gender" value="male" /></label>
                    <label>Female<input  type="radio" name="gender" value="female" /></label>
                </div>
                <label for="course details">Course details</label>
                <div class="flex-form">
                    <select class="form-box form-letter" name="course-category" id="course-category">
                        <option value="course-category">--Choose course category--</option>
                         <option value="medicine">Medicine</option>
                         <option value="Science and Technology">Science and Technology</option>
                         <option value="Humanitarians">Humanitarians</option>
                         <option value="chemistry">Chemistry</option>
                         <option value="architecture">Architecture</option>
                         <option value="languages">Languages</option>
                         <option value="Electrical and Electronics">Electrical and Electronics</option>
                    </select>
                    <?php
                    $sql = "SELECT * FROM courses";
                    $result = mysqli_query($conn,$sql); 
                    ?>
                    <select class="form-box form-letter" name="course-id" id="course-id">
                        <option value="select course">--Select course--</option>
                    <?php while($row = mysqli_fetch_assoc($result)):;?>
                    <option value="<?php echo $row['id'];?>"><?php echo $row['course_name'];?></option>
                    <?php endwhile;?>
                    </select>
                </div>
                <button type"submit" name="submit" id="submit">Upload qualifications</button>
                </div>
                </form>
            </div>
    </div>
   
</body>
</html>