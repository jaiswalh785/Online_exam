<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Online Exam</title>
        <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
        <!-- jQuery (necessary JavaScript plugins) -->
        <script type='text/javascript' src="js/jquery-1.11.1.min.js"></script>
        <!-- Custom Theme files -->
        <link href="css/style.css" rel='stylesheet' type='text/css' />
        <!-- Custom Theme files -->
        <!--//theme-style-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script type="text/javascript" src="js/move-top.js"></script>
        <script type="text/javascript" src="js/easing.js"></script>
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
    </head>
    <body>
        <!-- header -->
        <?php include('header.php') ?>
        <!-- header -->
        <!-- start banner -->
        <div class="banner">
            <div class="container">
                <div class="donate">
                    <h1>Student / Teacher LOGIN</h1>
                    <h2>Not Registered yet ? register now</h2>
                    <li><a href="student_reg.php" style="background-color:green;" >Join Student</a></li>
                    <li><a href="teacher_reg.php" style="background-color:#5595c3;">Join Teacher</a></li>

                    <div class="clearfix"> </div>
                    <form action="login_cd.php" method="post">
                        <div class="do-na">
                            <?php if (isset($_SESSION['error_msg'])) { ?>
                                <div class="col-md-12 alert alert-danger">
                                    <?php echo $_SESSION['error_msg'] ?>
                                </div>
                                <?php unset($_SESSION['error_msg']);
                            } ?>
                            <select class="arrival" style="width:80%;color:#333;" name="user_type">
                                <option>--- Select ---</option>
                                <option value="admin">Admin</option>
                                <option value="student">Student</option>
                                <option value="teacher">Teacher</option>

                            </select>
                            <input type="text" class="text" style="width:80%;color:#333;" required="required" placeholder="Email" name="username">						
                            <div class="clearfix"> </div>						
                            <input type="password" class="text" style="width:80%;color:#333;" required="required" value="" placeholder="Password" name="password">						
                            <div class="clearfix"> </div>

                        </div>
                        <div class="button-9">
                            <input type="submit" value="Login ">
                        </div>
                    </form>
                </div>
            </div>
			
        </div>
        <!-- end banner -->

        <!-- footer -->
<?php include('footer.php') ?>
        <!-- footer -->
        <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 0;"></span> <span id="toTopHover" style="opacity: 0;"> </span></a>
    </body>
</html>