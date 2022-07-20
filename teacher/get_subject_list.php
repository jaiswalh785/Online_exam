<?php
session_start();
include('../include/connection.php');
$email = $_SESSION['email'];
$logqry = mysqli_query($con,"SELECT * FROM teachermaster WHERE email='$email'");
$loginData = mysqli_fetch_assoc($logqry);
 $qry = mysqli_query($con,"SELECT * FROM course WHERE teacher_id='$loginData[teacherid]'");
 if(mysqli_num_rows($qry)){
?>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Course Name</th>
            <th>Start Date</th>
            <th>Duration</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $i = 1;
            while($data = mysqli_fetch_assoc($qry)){
        ?>
        <tr class="<?php echo $i%2==1?'info':''?>">
            <td><?php echo $i?></td>
            <td><?php echo $data['course_name']?></td>
            <td><?php echo $data['start_date']?></td>
            <td><?php echo $data['course_duration']?></td>
        </tr>
        <?php $i++;}?>
    </tbody>
</table>
<?php }?>