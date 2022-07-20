<?php session_start()?>
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
	<?php include('header.php')?>
<!-- header -->
<!-- co-ntact -->
<div class="co-ntact">
	<div class="container">
		 
		<h3 class="ghj">Teacher Registration</h3>


       
				<div class="col-md-4 abou-left" >
                </div>
				<form method="post" action="teacher_reg_cd.php" enctype="multipart/form-data">
			<div class="col-md-8 abou-right" >
				
                		<?php if(isset($_SESSION['success_msg'])){?>
							<div class="col-md-12 alert alert-success">
								<?php echo $_SESSION['success_msg']?>
							</div>
						<?php unset($_SESSION['success_msg']);}?>
						<?php if(isset($_SESSION['error_msg'])){?>
							<div class="col-md-12 alert alert-danger">
								<?php echo $_SESSION['error_msg']?>
							</div>
						<?php unset($_SESSION['error_msg']);}?>
						<div class="reg">
                           <input type="email" class="mytext" value="Email Id" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = 'Email Id';}" name="email">
							<input type="password" class="mytext" value="Password" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = 'Password';}" name="password">							
							<input type="text" class="mytext" value="First Name" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = 'First Name';}" name="f_name">
                            <input type="text" class="mytext" value="Last Name" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = 'Last Name';}" name="l_name">
                            <input type="text" class="mytext" value="Mobile no." onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = 'Mobile no.';}" name="mobile">
							<input type="file" name="teacher_img" class="mytext"/>

						</div>
                <div class="clearfix"></div>
                <br />
                <div class="form-submit">
						   <input type="submit" id="submit" value="Submit" name="reg"><br>
						   </div>
                    </div>
					</form>                       
			 
			<div class="clearfix"> </div>
	 
	</div>
</div>
<!-- co-ntact -->
<!-- footer -->
<?php include('footer.php')?>
<!-- footer -->
<a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 0;"></span> <span id="toTopHover" style="opacity: 0;"> </span></a>
</body>
</html>