<?php

session_start();
include_once("../include/connection.php");
$date = date('Y-m-d');
if (isset($_POST['save'])) {
    $course_id = $_POST['course_id'];
    $file = $_FILES['topic_file']['name'];
    $teacher_id = $_POST['teacher_id'];
    $ext = pathinfo($file, PATHINFO_EXTENSION);
    $filename = time() . '.' . $ext;
    if (move_uploaded_file($_FILES["topic_file"]["tmp_name"], 'topic_file/' . $filename)) {
        $query = "INSERT INTO topic_file (course_id,teacher_id,file_name)
            VALUES('$course_id','$teacher_id','$filename')";
        mysql_query($query, $con);
        mysql_close($con);
        $_SESSION['success_msg'] = 'File uploaded successfully.';
    }
}
header('Location: dashboard.php');
?>