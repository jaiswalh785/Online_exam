<?php
session_start();
include('../include/connection.php');
$email = $_SESSION['email'];
$logqry = mysqli_query($con,"SELECT * FROM teachermaster WHERE email='$email'");
$loginData = mysqli_fetch_assoc($logqry);
 $qry = mysqli_query($con,"SELECT * FROM course WHERE teacher_id='$loginData[teacherid]'");
 if(mysqli_num_rows($qry)){
?>
        <option value="">--select--</option>
        <?php 
            while($data = mysqli_fetch_assoc($qry)){
        ?>
            <option value="<?php echo $data['id'];?>"><?php echo $data['course_name'];?></option>
        </tr>
        <?php }?>
<?php }?>