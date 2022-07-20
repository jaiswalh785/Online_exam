<?php
session_start();
include_once("../include/connection.php");
$date = date('Y-m-d');
if(isset($_POST['reg'])){
	$course_id = $_POST['course_id'];
	$techer_id = $_POST['teacher_id_assi'];
	$question_text = $_POST['question_text'];
	$option_first = $_POST['option_first'];
	$option_second = $_POST['option_second'];
	$option_third = $_POST['option_third'];
	$option_fourth = $_POST['option_fourth'];
	$wright_answer = $_POST['wright_answer'];
	$query = "INSERT INTO assignment (course_id,teacher_id,question_text,option_first,option_second,option_third,option_fourth,wright_answer,assignment_date)
            VALUES('$course_id','$techer_id','$question_text','$option_first','$option_second','$option_third','$option_fourth','$wright_answer','$date')";
	mysqli_query($con,$query);
	mysqli_close($con);
	$_SESSION['success_msg'] = 'Question saved!';  
}
header('Location: dashboard.php');
?>