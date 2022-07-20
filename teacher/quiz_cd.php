<?php
session_start();
include_once("../include/connection.php");
$date = date('Y-m-d');
if(isset($_POST['reg'])){
	$techer_id = $_POST['teacher_id_assi'];
	$question_text = $_POST['question_text'];
	$option_first = $_POST['option_first'];
	$option_second = $_POST['option_second'];
	$option_third = $_POST['option_third'];
	$option_fourth = $_POST['option_fourth'];
	$wright_answer = $_POST['wright_answer'];
	$query = "INSERT INTO quiz (teacher_id,question_text,option_first,option_second,option_third,option_fourth,wright_answer,assignment_date)
            VALUES('$techer_id','$question_text','$option_first','$option_second','$option_third','$option_fourth','$wright_answer','$date')";
	mysql_query($query,$con);
	mysql_close($con);
	$_SESSION['success_msg'] = 'Quiz saved!';  
}
header('Location: dashboard.php');
?>