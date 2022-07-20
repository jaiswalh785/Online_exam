<?php
session_start();
include_once("../include/connection.php");
$date = date('Y-m-d');
$id = $_GET['id'];
$stId = $_GET['st_id'];
$query = "INSERT INTO topic_selection (topic_id,student_id,select_date) VALUES('$id','$stId','$date')";
mysqli_query($con,$query);
mysqli_close($con);
$_SESSION['success_msg'] = 'Topic has been selected!';
header('Location: dashboard.php');
?>