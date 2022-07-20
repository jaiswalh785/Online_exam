<?php include('include/connection.php')?>
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
        <div class="about">
	<div class="container">
		<h2>About Us</h2>
		<div class="abou-top">
			<div class="col-md-4 abou-left">
				<img height="500px" src="images/i.jpg" class="img-responsive" alt=""/>
			</div>
			<div class="col-md-8 abou-right">
				<h5><h5>Online Exam</h5>
				<p>Online Exam is based on PHP and MySQL. The main objective for developing this project is provide a user friendly environment to provide knowledge and give everyone a chance to learn. Online Exam provides innovative courses directly to you. Take any class, any time you want, anywhere you want, with no additional software to download—all you need is an internet connection. Study at your own pace and access your course when it is convenient for you. This project Smart Learning can be helpful to all students to improve their knowledge. In this Smart Learning system you will able to add student in a class, upload file. This project provides a lot of features to manage in very well manner. This project contains a lot of advance modules which makes the back end system very powerful. We have developed many modules in this projects.                      
The website maintains the profile of both leaner and trainer together because the profile consists of information similar to both the communities. Both the parties are maintained separately because the advance profiles of learner and trainer consists of separate fields. The trainer will mention his area of expertise, number of years’ experience in the particular expertise area. Additionally he will mention the projects handled by him in the corresponding subject along with certain remarks. On the other hand, the advance profile of learner consists of his learning area and his personal grading on the particular subject along with remarks. On the basis of the personal grading and remarks the trainer will assess the learner’s capability and on this basis the trainer is going to decide what type of study material to provide to the learner.
</p>
			</div>
			<div class="clearfix"> </div>
		</div>
		<div class="abt-btm">
			<h3>Our Advantages</h3>
			<div class="col-md-4">
				<h4>Scope of smart learning</h4>
				<p> This project has great scope in future because in today’s world scenario people are moving towards internet for fulfilling their small needs. And we all know that “learning is the process” which never ends. So this application gives users a very good opportunity to share information and knowledge in a systematic way by using this website.
The scope of the Smart Learning focuses on information sharing between the information seekers and information providers. It will act as a meeting point for the two parties or it can be viewed as a community for the two groups of users.  It will enable the users to query on specific subjects.  Apart from the known requirements, the application will be built to adapt the new requirements.</p>
			</div>
			<div class="col-md-4">
				<h4>Existing System</h4>
				<p> 	Retrieving of records is difficult.</br>

	No option for giving suggestions by both trainers and learners.</br>

	Cost barriers.</br>

	Not collecting any personal information of user and visitors.</br>

	Users are free to navigate all the pages, without any registration.</br>

</p>
			</div>
			<div class="col-md-4">
				<h4>Proposed of System</h4>
				<p>	Covered various technologies contents.</br>

	Codified system.</br>

	Various security checks by administrator.</br>

	Easy explanation.</br>

	User friendly.</br>

	Quick and easy search.</br>
 </p>
			</div>
				<div class="clearfix"> </div>
		</div>
		
		
				<div class="clearfix"> </div>
		</div>
	</div>
</div>
        <!-- our -->
        <!-- footer -->
        <?php include('footer.php') ?>
        <!-- footer -->
        <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 0;"></span> <span id="toTopHover" style="opacity: 0;"> </span></a>
    </body>
</html>