<?php
session_start();
include_once("include/connection.php");
$date = date('Y-m-d');
if(isset($_POST['reg'])){
	$img = $_FILES['student_img']['name'];
	$path = 'student/student_img/'.$img;
	$fname = $_POST['f_name'];
	$lname = $_POST['l_name'];
	$email = $_POST['email'];
	$mobile = $_POST['mobile'];
	$password = $_POST['password'];
	$chkqry = mysqli_query($con,"SELECT studentid FROM studentmaster WHERE email='$email'");
	if(mysqli_num_rows($chkqry)){
		$_SESSION['error_msg'] = 'Email already registered!';
		header('Location: student_reg.php');
		exit;		
	}
	
	if(move_uploaded_file($_FILES['student_img']['tmp_name'],$path)){
		$query = "insert into studentmaster (first_name,last_name,joining_date,student_image,mobile,email) values('$fname','$lname','$date','$img','$mobile','$email')";
	if(mysqli_query($con,$query)){
		mysqli_query($con,"INSERT INTO login_master (username,password,user_type) VALUES('$email','$password','student')");
		$_SESSION['success_msg'] =  "Registration Successful!";
	  }else{
		die("Could not registered, something wrong!".mysql_error());	
	  }
  }
	mysqli_close($con);
	  
}
header('Location: student_reg.php');
?>