<?php
session_start();
include('../include/connection.php');
if(!isset($_SESSION['email'])){
    header('Location: ../index.php');
}
$email = $_SESSION['email'];
$logqry = mysqli_query($con,"SELECT * FROM admin WHERE email='$email'");
$loginData = mysqli_fetch_assoc($logqry);
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Online Exam</title>
        <link href="../css/bootstrap.css" rel='stylesheet' type='text/css' />
        <!-- jQuery (necessary JavaScript plugins) -->
        <script type='text/javascript' src="../js/jquery-1.11.1.min.js"></script>
        <!-- Custom Theme files -->
        <link href="../css/style.css" rel='stylesheet' type='text/css' />
        <!-- Custom Theme files -->
        <!--//theme-style-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <script type="text/javascript" src="../js/bootstrap.js"></script>
        <script type="text/javascript" src="../js/move-top.js"></script>
        <script type="text/javascript" src="../js/easing.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $(".scroll").click(function(event){		
                    event.preventDefault();
                    $('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
                });
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                $().UItoTop({ easingType: 'easeOutQuart' });
            });
        </script>
        <style>
            .ques_text{padding:5px;color:#000;}
            .ques_text input[type="radio"]{margin-right: 10px;margin-left:5px;}
        </style>
    </head>
    <body>
        <!-- header -->
        <?php include('header.php') ?>
        <!-- header -->
        <!-- start banner -->
        <div class="about">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3"> <a href="#"  class="nav-tabs-dropdown btn btn-block btn-primary" style="color:#fff;font-weight:bolder;">Hello, Admin !!!</a>
                        <ul id="nav-tabs-wrapper" class="nav nav-tabs nav-pills nav-stacked well">
                            <li><img src="img/admin.jpg" style="height:150px;width:170px; border-radius:120px;" /> </li>
                            <li><a href="#vtab2" data-toggle="tab">Teacher</a></li>
                            <li><a href="#vtab3" data-toggle="tab">Student</a></li>
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-9">
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="vtab2">
                                <div id="profile_div">
                                    <h3>Teachers List</h3>
                                    <?php if (isset($_SESSION['success_msg'])) { ?>
                                        <div class="col-md-12 alert alert-success">
                                            <?php echo $_SESSION['success_msg'] ?>
                                        </div>
                                        <?php unset($_SESSION['success_msg']);
                                    } ?>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr class="success">
                                                <td>Name</td>
                                                <td>Email</td>
                                                <td>Mobile</td>
                                                <td>Joining Date</td>
                                                <td>Action</td>
                                            </tr>
                                        </thead>
                                        <?php 
                                            $qry = mysqli_query($con,"SELECT * FROM teachermaster");
                                            while($data = mysqli_fetch_assoc($qry)){
                                        ?>
                                        <tr>
                                            <td><?php echo $data['first_name'].' '.$data['last_name'];?></td>
                                            <td><?php echo $data['email'];?></td>
                                            <td><?php echo $data['mobile'];?></td>
                                            <td><?php echo $data['joining_date'];?></td>
                                            <td><a href="delete_teacher.php?email=<?php echo $data['email']?>" onclick="return confirm('Are you sure')">Delete</a></td>
                                        </tr>
                                        <?php }?>
                                    </table>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade in" id="vtab3">
                                <h3>Student List</h3>
                                <table class="table table-bordered">
                                        <thead>
                                            <tr class="success">
                                                <td>Name</td>
                                                <td>Email</td>
                                                <td>Mobile</td>
                                                <td>Joining Date</td>
                                                <td>Action</td>
                                            </tr>
                                        </thead>
                                        <?php 
                                            $qry = mysqli_query($con,"SELECT * FROM studentmaster");
                                            while($data = mysqli_fetch_assoc($qry)){
                                        ?>
                                        <tr>
                                            <td><?php echo $data['first_name'].' '.$data['last_name'];?></td>
                                            <td><?php echo $data['email'];?></td>
                                            <td><?php echo $data['mobile'];?></td>
                                            <td><?php echo $data['joining_date'];?></td>
                                            <td><a href="delete_student.php?email=<?php echo $data['email']?>" onclick="return confirm('Are you sure')">Delete</a></td>
                                        </tr>
                                        <?php }?>
                                    </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <!-- end banner -->
        <!-- footer -->
<?php include('footer.php') ?>
        <!-- footer -->
        <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 0;"></span> <span id="toTopHover" style="opacity: 0;"> </span></a>
    </body>
</html>
