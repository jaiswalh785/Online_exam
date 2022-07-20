<?php include('include/connection.php')?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Smart Learning</title>
        <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
        <!-- jQuery (necessary JavaScript plugins) -->
        <script type='text/javascript' src="js/jquery-1.11.1.min.js"></script>
        <!-- Custom Theme files -->
        <link href="css/style.css" rel='stylesheet' type='text/css' />
        <!-- Custom Theme files -->
        <!--//theme-style-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Hope Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
              Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
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
                /*
                        var defaults = {
                        containerID: 'toTop', // fading element id
                        containerHoverID: 'toTopHover', // fading element hover id
                        scrollSpeed: 1200,
                        easingType: 'linear' 
                        };
                 */
                $().UItoTop({ easingType: 'easeOutQuart' });
            });
        </script>
    </head>
    <body>
        <!-- header -->
        <?php include('header.php') ?>
        <!-- header -->
        <!-- our -->
        <div class="minist">
            <div class="container">
                <h3>Topics</h3>
                <?php 
                    if(isset($_REQUEST['q'])){
                      $q = $_REQUEST['q'];  
                    }else{
                        $q = '';
                    }
                    $sql = mysql_query("SELECT * FROM course WHERE course_name LIKE '%$q%'");
                    while($data = mysql_fetch_assoc($sql)){
                        $sql1 = mysql_query("SELECT * FROM teachermaster WHERE teacherid=$data[teacher_id]");
                        $teacher = mysql_fetch_assoc($sql1);
                ?>
                <div class="col-md-3 minist-left">
                    <h4>Topic <?php echo $data['course_name']?></h4>
                    <p>Teacher <?php echo $teacher['first_name'].' '.$teacher['last_name']?></p>
                    <p>Start Date <?php echo date('F m,Y',strtotime($data['start_date']))?></p>
                    <p>Duration <?php echo $data['course_duration']?></p>
                    <a class="hvr-shutter-in-horizontal" href="index.php" onclick="return confirm('Please login to join?');">Join</a>
                </div>
                <?php }?>
                <div class="clearfix"> </div>
                
            </div>
        </div>
        <!-- our -->
        <!-- footer -->
        <?php include('footer.php') ?>
        <!-- footer -->
        <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 0;"></span> <span id="toTopHover" style="opacity: 0;"> </span></a>
    </body>
</html>