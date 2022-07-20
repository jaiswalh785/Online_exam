<?php
session_start();
include_once("include/connection.php");
$username = $_POST['username'];
$password = $_POST['password'];
$user_type = $_POST['user_type'];
if($user_type == 'student'){
	$qry = mysqli_query($con,"SELECT * FROM login_master WHERE username='$username' AND password='$password'");
	if(mysqli_num_rows($qry)){
		$data = mysqli_fetch_assoc($qry);
		$_SESSION['email'] = $data['username'];
		header('Location: student/dashboard.php');
	}else{
		$_SESSION['error_msg'] = 'Wrong username or password!';
		header('Location: index.php');
	}
}else if($user_type == 'teacher'){

	$qry = mysqli_query($con,"SELECT * FROM login_master WHERE username='$username' AND password='$password'");
	if(mysqli_num_rows($qry)){
		$data = mysqli_fetch_assoc($qry);
		$_SESSION['email'] = $data['username'];
		header('Location: teacher/dashboard.php');
	}else{
		$_SESSION['error_msg'] = 'Wrong username or password!';
		header('Location: index.php');
	}

}else if($user_type == 'admin'){
	$qry = mysqli_query($con,"SELECT * FROM admin WHERE username='$username' AND password='$password'");
	if(mysqli_num_rows($qry)){
		$data = mysqli_fetch_assoc($qry);
		$_SESSION['email'] = $data['username'];
		header('Location: admin/dashboard.php');
	}else{
		$_SESSION['error_msg'] = 'Wrong username or password!';
		header('Location: index.php');
	}
}

?>