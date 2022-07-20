<?php
session_start();
include('../include/connection.php');
if (!isset($_SESSION['email'])) {
    header('Location: ../index.php');
}
$email = $_SESSION['email'];
$logqry = mysqli_query($con,"SELECT * FROM teachermaster WHERE email='$email'");
$loginData = mysqli_fetch_assoc($logqry);
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Online Exam- Teacher Panel</title>
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
			
                $('#update-btn').click(function(){
                    $('#profile_div').hide();
                    $('#profile_form').fadeIn('slow');
                });
			
                $('#cancel_profile').click(function(){
                    $('#profile_form').hide();
                    $('#profile_div').fadeIn('slow');
                });
                getAllSubjectList();	
                $('#subject_form').submit(function(e){
                    e.preventDefault();
                    $.ajax({
                        url:'subject_cd.php',
                        data:$('#subject_form').serialize(),
                        dataType:'json',
                        type:'post',
                        success:function(response){
                            if(response.ok){
                                $('input[type="text"]','#subject_form').val('');
                                getAllSubjectList();
                                getAllSubjectDropDown();
                            }
                        }
                    });
                });
                
            });
            function getAllSubjectList(){
                $.ajax({
                    url:'get_subject_list.php',
                    success:function(response){
                        $('#subject_list_div').html(response);
                    }
                });
            }
            function getAllSubjectDropDown(){
                $.ajax({
                    url:'get_subject_dropdown.php',
                    success:function(response){
                        $('#topic_id').html(response);
                    }
                });
            }
        </script>
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
                            <li><img src="teacher_image/<?php echo $loginData['teacher_image'] ?>" style="height:150px;width:170px; border-radius:120px;" /> </li>
                            <li><a href="#vtab2" data-toggle="tab">Profile</a></li>
                            <li><a href="#vtab3" data-toggle="tab">Topic</a></li>
                            <li><a href="#vtab4" data-toggle="tab">Exam Questions</a></li>
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-9">
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="vtab2">
                                <div id="profile_div">
                                    <h3>Profile Management</h3>
                                    <?php if (isset($_SESSION['success_msg'])) { ?>
                                        <div class="col-md-12 alert alert-success">
                                            <?php echo $_SESSION['success_msg'] ?>
                                        </div>
                                        <?php unset($_SESSION['success_msg']);
                                    } ?>
                                    <table class="table table-bordered">
                                        <tr class="info">
                                            <th>First Name</th>
                                            <td><?php echo $loginData['first_name'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Last Name</th>
                                            <td><?php echo $loginData['last_name'] ?></td>
                                        </tr>
                                        <tr class="info">
                                            <th>Email</th>
                                            <td><?php echo $loginData['email'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>mobile</th>
                                            <td><?php echo $loginData['mobile'] ?></td>
                                        </tr>
                                        <tr class="info">
                                            <th>Joining Date</th>
                                            <td><?php echo date('F j,Y', strtotime($loginData['joining_date'])); ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><input id="update-btn" type="button" title="Update Profile" class="btn btn-info" value="Update"/>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <form id="profile_form" method="post" action="update_profile_cd.php" enctype="multipart/form-data" style="display:none;">
                                    <h3>Profile Management</h3>
                                    <div class="col-md-8 abou-right" >
                                        <div class="reg">
                                            <input type="text" class="mytext"  name="f_name" value="<?php echo $loginData['first_name'] ?>">
                                            <input type="text" class="mytext" name="l_name" value="<?php echo $loginData['last_name'] ?>">
                                            <input type="text" class="mytext"  name="mobile" value="<?php echo $loginData['mobile'] ?>">
                                            <input type="file" name="teacher_img" class="mytext"/>
                                        </div>
                                        <div class="clearfix"></div>
                                        <br />
                                        <div class="form-submit">
                                            <input type="hidden" name="id" value="<?php echo $loginData['teacherid'] ?>"/>
                                            <input type="hidden" name="img_name" value="<?php echo $loginData['teacher_image'] ?>"/>
                                            <input type="submit" id="submit" value="Update" name="reg">
                                            <input type="button" id="cancel_profile" value="Cancel" class="btn btn-danger"/>
                                            <br>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div role="tabpanel" class="tab-pane fade in" id="vtab3">
                                <form id="subject_form" method="post" action="update_profile_cd.php" enctype="multipart/form-data">
                                    <h3>Add Topic Name</h3>
                                    <div class="col-md-8 abou-right" >
                                        <div class="reg">
                                            <input type="text" class="mytext" value="Topic name" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = 'Topic Name';}" name="course_name"/>
                                            <input type="text" class="mytext" value="Exam Duration" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = 'Exam Duration';}" name="course_duration"/>
                                        </div>
                                        <div class="clearfix"></div>
                                        <br />
                                        <div class="form-submit">
                                            <input type="hidden" name="teacher_id" value="<?php echo $loginData['teacherid'] ?>"/>
                                            <input type="submit" id="submit" value="Submit" name="reg">
                                            <br>
                                        </div>
                                    </div>
                                </form>
                                <div class="col-md-12">&nbsp;</div>
                                <div id="subject_list_div">
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade in" id="vtab4">
                                <form method="post" action="assignment_cd.php" enctype="multipart/form-data">
                                    <h3>Add Exam Questions</h3>
                                    <div class="col-md-12 abou-right" >
                                        <div class="reg" style="width:100%;">
                                            <div class="col-md-12">
                                                <label class="col-md-12">Select Course</label>
                                                <select id="topic_id" name="course_id" style="width:20%;padding:7px;">
                                                    <option value="">--select--</option>
                                                    <?php
                                                    $getCQ = mysqli_query($con,"SELECT * FROM course WHERE teacher_id='$loginData[teacherid]'");
                                                    while ($courseData = mysqli_fetch_assoc($getCQ)) {
                                                        ?>
                                                        <option value="<?php echo $courseData['id'] ?>"><?php echo $courseData['course_name'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="col-md-12">Question</label>
                                                <input type="text" name="question_text" class="mytext"/>
                                                <div class="col-md-6">
                                                    <label class="col-md-6">Option 1</label>
                                                    <input type="text" name="option_first" class="mytext col-md-6"/>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="col-md-12">Option 2</label>
                                                    <input type="text" name="option_second" class="mytext"/>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="col-md-12">Option 3</label>
                                                    <input type="text" name="option_third" class="mytext"/>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="col-md-12">Option 4</label>
                                                    <input type="text" name="option_fourth" class="mytext"/>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="col-md-12">Right Answer</label>
                                                    <input type="text" name="wright_answer" class="mytext"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <br />
                                        <div class="form-submit">
                                            <input type="hidden" name="teacher_id_assi" value="<?php echo $loginData['teacherid'] ?>"/>
                                            <input type="submit" id="submit" value="Submit" name="reg">
                                            <br>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div role="tabpanel" class="tab-pane fade in" id="vtab5">
                                <form method="post" action="quiz_cd.php" enctype="multipart/form-data">
                                    <h3>Add Quiz</h3>
                                    <div class="col-md-12 abou-right" >
                                        <div class="reg" style="width:100%;">
                                            
                                            <div class="col-md-12">
                                                <label class="col-md-12">Question</label>
                                                <input type="text" name="question_text" class="mytext"/>
                                                <div class="col-md-6">
                                                    <label class="col-md-6">Option 1</label>
                                                    <input type="text" name="option_first" class="mytext col-md-6"/>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="col-md-12">Option 2</label>
                                                    <input type="text" name="option_second" class="mytext"/>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="col-md-12">Option 3</label>
                                                    <input type="text" name="option_third" class="mytext"/>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="col-md-12">Option 4</label>
                                                    <input type="text" name="option_fourth" class="mytext"/>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="col-md-12">Right Answer</label>
                                                    <input type="text" name="wright_answer" class="mytext"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <br />
                                        <div class="form-submit">
                                            <input type="hidden" name="teacher_id_assi" value="<?php echo $loginData['teacherid'] ?>"/>
                                            <input type="submit" id="submit" value="Submit" name="reg">
                                            <br>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div role="tabpanel" class="tab-pane fade in" id="vtab6">
                                <h3>Add Files & Videos</h3>
                                <form method="post" action="files_cd.php" enctype="multipart/form-data">
                                    <div class="col-md-12">
                                        <label class="col-md-12">Select Course</label>
                                        <select name="course_id" style="width:20%;padding:7px;">
                                            <option value="">--select--</option>
                                            <?php
                                            $getCQ1 = mysqli_query($con,"SELECT * FROM course  WHERE teacher_id='$loginData[teacherid]'");
                                            while ($course = mysqli_fetch_assoc($getCQ1)) {
                                                ?>
                                                <option value="<?php echo $course['id'] ?>"><?php echo $course['course_name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-12">&nbsp;</div>
                                    <div class="col-md-12">
                                        <label class="col-md-12">Select File</label>
                                        <input type="file" name="topic_file"/>
                                    </div>
                                    <div class="col-md-12">&nbsp;</div>
                                    <div class="col-md-12">
                                        <input type="hidden" name="teacher_id" value="<?php echo $loginData['teacherid'] ?>"/>
                                        <input type="submit" name="save" class="btn btn-danger" value="Upload"/>
                                    </div>
                                </form>    
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
