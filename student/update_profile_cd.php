<?php
session_start();
include_once("../include/connection.php");
$date = date('Y-m-d');
if(isset($_POST['reg'])){
	$img = $_FILES['student_img']['name'];
	$path = 'student_img/'.$img;
	$fname = $_POST['f_name'];
	$lname = $_POST['l_name'];
	$mobile = $_POST['mobile'];
	$id = $_POST['id'];
	
	if(!empty($img)){
		move_uploaded_file($_FILES['student_img']['tmp_name'],$path);
	}else{
		$img = $_POST['img_name'];
	}
	$query = "UPDATE studentmaster SET first_name='$fname',last_name='$lname',student_image='$img',mobile='$mobile' WHERE studentid='$id'";
	mysql_query($query,$con);
	mysql_close($con);
	$_SESSION['success_msg'] = 'Profile has been updated!';  
}
header('Location: dashboard.php');
?>