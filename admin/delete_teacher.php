<?php
session_start();
include('../include/connection.php');
if(!isset($_SESSION['email'])){
    header('Location: ../index.php');
}
$email = $_REQUEST['email'];
mysqli_query($con,"DELETE FROM teachermaster WHERE email='$email'");
mysqli_query($con,"DELETE FROM login_master WHERE username='$email'");
$_SESSION['success_msg'] = 'Teacher has been deleted.';
header('Location: dashboard.php');
?>