<?php
session_start();
include('../include/connection.php');
if (!isset($_SESSION['email'])) {
    header('Location: ../index.php');
}
$email = $_SESSION['email'];
$logqry = mysql_query("SELECT * FROM studentmaster WHERE email='$email'");
$loginData = mysql_fetch_assoc($logqry);
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Smart Learning</title>
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
                    <div class="col-sm-3"> <a href="#"  class="nav-tabs-dropdown btn btn-block btn-primary" style="color:#fff;font-weight:bolder;">Hello, <?php echo $loginData['first_name'] ?> !!!</a>
                        <ul id="nav-tabs-wrapper" class="nav nav-tabs nav-pills nav-stacked well">
                            <li><img src="student_img/<?php echo $loginData['student_image'] ?>" style="height:150px;width:170px; border-radius:120px;" /> </li>
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-9">
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="vtab2">
                                <div id="profile_div">
                                    <?php if (isset($_SESSION['success_msg'])) { ?>
                                        <div class="col-md-12 alert alert-success">
                                            <?php echo $_SESSION['success_msg'] ?>
                                        </div>
                                        <?php unset($_SESSION['success_msg']);
                                    } ?>
                                    <h3>Quiz Result</h3>
                                    <?php
                                    session_start();
                                    $totalQtn = $_POST['total_qtn'];
                                    $sum = 0;
                                    for ($i = 1; $i <= $totalQtn; $i++) {
                                        if (isset($_POST['opt_chosen_' . $i])) {
                                            $wright_ans = $_POST['wright_ans_' . $i];
                                            $opt = $_POST['opt_chosen_' . $i];
                                            if (strtolower($wright_ans) == strtolower($opt)) {
                                                $sum = $sum + 1;
                                            }
                                        }
                                    }
                                    ?>
                                    <h4>Your Quiz Score is <span class="alert alert-danger"><?php echo $sum;?>/<?php echo $totalQtn?></span></h4>
                                </div>
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