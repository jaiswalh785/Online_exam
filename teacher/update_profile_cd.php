<?php
session_start();
include_once("../include/connection.php");
$date = date('Y-m-d');
if(isset($_POST['reg'])){
	$img = $_FILES['teacher_img']['name'];
	$path = 'teacher_image/'.$img;
	$fname = $_POST['f_name'];
	$lname = $_POST['l_name'];
	$mobile = $_POST['mobile'];
	$id = $_POST['id'];
	
	if(!empty($img)){
		move_uploaded_file($_FILES['teacher_img']['tmp_name'],$path);
	}else{
		$img = $_POST['img_name'];
	}
	$query = "UPDATE teachermaster SET first_name='$fname',last_name='$lname',teacher_image='$img',mobile='$mobile' WHERE teacherid='$id'";
	mysqli_query($con,$query);
	mysqli_close($con);
	$_SESSION['success_msg'] = 'Profile has been updated!';  
}
header('Location: dashboard.php');
?>