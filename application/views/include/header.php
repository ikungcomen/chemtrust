<!DOCTYPE html>
<html lang="en">
    <base href = "<?= base_url(); ?>"/>
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <base href = "<?= base_url(); ?>"/>

        <title>CHEMTRUST</title>
        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- mainmenu -->
        <link rel="stylesheet" href="css/mainmenu.css">
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet" type="text/css" />


        <!-- stylefont -->
        <link rel="stylesheet" href="css/stylefont.css">

        <!-- templete -->
        <link rel="stylesheet" href="css/templete.css">

        <!-- modal -->
        <!--<link rel="stylesheet" href="css/modal.min.css">-->
        <script src="js/modal_jquery.min.js"></script>
        <script src="js/modal_bootstrap.min.js"></script>

        <!-- autocomplete -->
        <link rel="stylesheet" href="css/jquery-ui.min.css">
       <!-- <script src="js/jquery.min.js"></script>-->
        <script src="js/jquery-ui.min.js"></script> 

        <!-- Paging -->
        <script src="<?php echo base_url(); ?>js/tablepagegin.js"></script>






    </head>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#logo").css('opacity', '0');
            $("#select_logo").click(function(e) {
                e.preventDefault();
                $("#logo").trigger('click');

                /*$.ajax({
                 url: "<?php echo base_url(); ?>index.php/register/register/change_picture",
                 type: 'POST',
                 cache: false,
                 dataType: "json",
                 data: {
                 //user_id: $("#user_id").val()
                 },
                 success: function (data) {
                 $('#message').html(data);
                 $('#myModal').modal('show');
                 //$("#user_id").focus();
                 //$('#user_id').val('');
                 
                 },
                 error: function (data) {
                 //alert("Error");
                 }
                 });*/
            });
        });
    </script>
    <body>
        <br>
        <div class = "container" >
            <table border="0" width = "100%">
                <tr>
                   <!-- <td width = "10%">
                        <a id="social" class="fa fa-3x social-fb"><img class="border-img" src="image/logo/logo1.png" alt="" width = "250px" height="250px;"></a>
                    </td>-->
                    <td valign="top">
                        <h1 class="font-header">CHEM&nbsp;<font color="#088A08">Trust&nbsp;</font><a href="<?php echo base_url(); ?>index.php/main_cemee/main_controller/main_cemee"><span class="glyphicon glyphicon-home fa-1x icon" aria-hidden="true"></span></a></h1>
                        <h5><font color="#088A08">Proteching humans and wildlife</font></h5>
                        <h5><font color="#088A08">form harmful chemicals</font></h5>
                    </td>
                    <td valign="top" align="right">
                        <h3>โครงการวิศวกรรมความปลอดภัย มหาวิทยาลัยเกษตรศาสตร์</h3>
                        <!-- <div class="form-group">
                             <label  class="col-sm-5"></label>
                             <div class="col-sm-5">
                                 <input class="form-control " type="text"  id="" name="" placeholder="ค้นหา">
                             </div>
                             <div class="col-sm-2 ">
                                 <a class="btn btn-primary"><span class="glyphicon glyphicon-search fa-1x" aria-hidden="true"> ค้นหา</span></a>
                             </div>
                         </div>-->
                    </td>
                </tr>
            </table>
            <!--</div>-->
            <!-- Navigation -->
            <!--<div class = "container">-->
            <!-- <nav class="navbar navbar-inverse" role="navigation"> -->
            <!--<div class="container">-->
            <!-- Brand and toggle get grouped for better mobile display -->
            <!--<div class="navbar-header">
                <a class="navbar-brand">CHEMTRUST</a>
                <a class="navbar-brand" href = "<?php echo base_url(); ?>index.php/main_cemee/main_controller/main_cemee"><i class = "glyphicon glyphicon-home"></i></a><a class="navbar-brand"  href = "#"><i class = "glyphicon glyphicon-envelope"></i></a><a class="navbar-brand"  href = "#"><i class = "glyphicon glyphicon-map-marker"></i></a>
            </div>-->
            <!-- Collect the nav links, forms, and other content for toggling -->
            <!--
             <div class="col-sm-3 col-md-3">
                <form class="navbar-form" role="search" onsubmit = "return false">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search" name="q">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                    </div>
                </div>
                </form>
            </div>
            -->


            <!-- MAIN BAR -->
            <!--<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1 right ">
                <ul class="nav navbar-nav navbar-right">

                    <li>
                        <a  href="<?php echo base_url(); ?>index.php/main_cemee/main_controller/main_cemee"><span class="glyphicon glyphicon-home fa-1x" aria-hidden="true"> หน้าแรก</span></a>
                    </li>-->

            <!--
             <li class="dropdown">
                 <a class="dropdown-toggle" href="#" data-toggle="dropdown">Login<strong class="caret"></strong></a>
                 <div class="dropdown-menu" style="padding: 15px; padding-bottom: 0px;">
                     <form method="post" action="index.php/login/doLogin" name="form1" id="form1" accept-charset="UTF-8">
                         <input style="margin-bottom: 15px;" type="text" placeholder="Username" id="username" class = "form-control" name="username">
                         <input style="margin-bottom: 15px;" type="password" placeholder="Password"  class = "form-control" id="password" name="password">
                         <input class="btn btn-primary btn-block" type="submit" id="sign-in" value="ลงชื่อเข้าใช้">
                     </form>
                     <br/>
                 </div>
             </li>-->
            <!-- <li>
                 <a href="#">&nbsp;</a>
             </li>
         </ul>
     </div>-->

            <!-- /.navbar-collapse -->
            <!--</div>-->
            <!-- /.container -->
            <!--</nav> -->
            <!--</div>
            <div class="container">-->
            <hr>
            <div class="row">
                <div class="col-md-3">
                    <ul class="nav nav-pills nav-stacked">
                        <li class="active"><a  href="<?php echo base_url(); ?>index.php/main_cemee/main_controller/main_cemee"><span class="glyphicon glyphicon-home fa-1x" aria-hidden="true"> หน้าแรก </span></a></li>

                        <li>
                        <center>
                            <div class = "manager">
                                <?php if ($this->session->userdata('user_factory') == "admin") { ?>
                                    <img id="imgmenu-hover" class="border-img" width="150px" height="150px" src="picture/pic_user/<?php echo $this->session->userdata('picture_user'); ?>"alt=""><br>
                                <?php } else { ?>
                                    <img id="imgmenu-hover" class="border-img" width="150px" height="150px" src="picture/pic_user/<?php echo $this->session->userdata('picture_user'); ?>"alt=""><br>
                                <?php } ?>

                                <center>
                                    <h4><?php echo $this->session->userdata('name'); ?></h4>
                                    <font color="red"><h5>สถานะ :&nbsp;<?php echo $this->session->userdata('user_role'); ?>&nbsp;&nbsp;<!--<a href="" id="select_logo">แก้ไขรูปภาพ</a> <input type="file"  id="logo">--></h5></font>

                                </center>
                            </div>
                            <div>

                            </div>

                        </center>
                        </li>
                    </ul>

                    <ul class="nav nav-pills nav-stacked">
                        <li class="active "><a ><span class="glyphicon glyphicon-th-large fa-1x"></span> เมนู</a></li>
                        <?php if ($this->session->userdata('user_role') == 'admin') { ?>
                            <li><a  href="<?php echo base_url(); ?>index.php/management_controller/registerUser_controller/register_user"><span class="glyphicon glyphicon-chevron-right"></span> สมัครสมาชิก</a></li>
                            <li><a id = "link1" class = "menu" href="<?php base_url(); ?>index.php/management_controller/editUser_controller"><span class="glyphicon glyphicon-chevron-right"></span> จัดการข้อมูลสมาชิก</a></li>
                        <?php } ?>
                        <li><a id = "link2" class = "menu" href="<?php base_url(); ?>index.php/management_controller/editPassword_controller"><span class="glyphicon glyphicon-chevron-right"></span> เปลี่ยนรหัสผ่าน</a></li>
                    </ul>

                    <ul class="nav nav-pills nav-stacked">
                        <li class="active"><a ><span class="glyphicon glyphicon-book fa-1x"></span> คู่มือ</a></li>
                        <li><a href=""><span class="glyphicon glyphicon-chevron-right"></span> คู่มือการใช้งาน</a></li>
                        <li><a href=""><span class="glyphicon glyphicon-chevron-right"></span> กฎหมาย</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/login/logout"><span class="glyphicon glyphicon-chevron-right"></span> ออกจากระบบ</a></li>
                    </ul>

                    <!--<ul class="nav nav-pills nav-stacked">
                        <li class="active"><a href="#"><span class="glyphicon glyphicon-chevron-right"></span> คอมพิวเตอร์</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/computer/computer/register_computer"><span class="glyphicon glyphicon-chevron-right"></span> จองที่นั่งคอมพิวเตอร์</a></li>
                        
                    </ul>-->
                    <!--<br/>
                    <ul class="nav nav-pills nav-stacked">
                        <li class="active"><a ><span class="glyphicon glyphicon-phone fa-1x"></span> ติดต่อเรา</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/contact/contact_admin/contact"><span class="glyphicon glyphicon-chevron-right"></span> ติดต่อผู้ดูแลระบบ</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/login/logout"><span class="glyphicon glyphicon-chevron-right"></span> ออกจากระบบ</a></li>
                    </ul>-->

                </div>
