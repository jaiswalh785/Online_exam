<?php
session_start();
include_once("include/connection.php");
$date = date('Y-m-d');
if(isset($_POST['reg'])){
	$img = $_FILES['teacher_img']['name'];
	$path = 'teacher/teacher_image/'.$img;
	$fname = $_POST['f_name'];
	$lname = $_POST['l_name'];
	$email = $_POST['email'];
	$mobile = $_POST['mobile'];
	$password = $_POST['password'];
	$chkqry = mysqli_query($con,"SELECT teacherid FROM teachermaster WHERE email='$email'");
	if(mysqli_num_rows($chkqry)){
		$_SESSION['error_msg'] = 'Email already registered!';
		header('Location: teacher_reg.php');
		exit;		
	}
	
	if(move_uploaded_file($_FILES['teacher_img']['tmp_name'],$path)){
		$query = "insert into teachermaster (first_name,last_name,joining_date,teacher_image,mobile,email) values('$fname','$lname','$date','$img','$mobile','$email')";
	if(mysqli_query($con,$query)){
		mysqli_query($con,"INSERT INTO login_master (username,password,user_type) VALUES('$email','$password','teacher')");
		$_SESSION['success_msg'] =  "Registration Successful!";
	  }else{
		die("Could not registered, something wrong!".mysqli_error());	
	  }
  }
	mysqli_close($con);
	  
}
header('Location: teacher_reg.php');
?>