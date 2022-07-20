<?php
    include('../include/connection.php');
    $course = $_REQUEST['course_name'];
    $course_duration = $_REQUEST['course_duration'];
    $teacherid = $_REQUEST['teacher_id'];
    $date = date('Y-m-d');
    mysqli_query($con,"INSERT INTO course (course_name,teacher_id,course_duration,start_date) VALUES('$course','$teacherid','$course_duration','$date')");
    echo json_encode(array('ok'=>TRUE));
?>