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
        <!-- style font -->
        <link rel="stylesheet" href="css/stylefont.css">

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- mainmenu -->
        <link rel="stylesheet" href="css/mainmenu.css">
        <!-- templete -->
        <link rel="stylesheet" href="css/templete.css">
        <!-- modal -->
        <link rel="stylesheet" href="css/modal.min.css">
        <script src="js/modal_jquery.min.js"></script>
        <script src="js/modal_bootstrap.min.js"></script>
    </head>

    <body>
        <br><br><br><br><br><br>
        <div class = "container ">
            <table border="0" width = "100%">
                <tr>
                    <!--<td width = "10%">
                        <a id="social" class="fa fa-3x social-fb"><img class="border-img" src="image/logo/logo1.png" alt="" width = "150px" height="150px;"></a>
                    </td>-->
                    <td valign="top" style="padding-left:20px;" align="center">
                        <h3>โครงการวิศวกรรมความปลอดภัย มหาวิทยาลัยเกษตรศาสตร์</h3>
                        <h1 class="font-header">CHEM&nbsp;<font color="#088A08">Trust&nbsp;</font><span class="glyphicon glyphicon-home fa-2x icon" aria-hidden="true"></span></h1>
                        <h4><font color="#088A08">Proteching humans and wildlife</font></h4>
                        <h4><font color="#088A08">form harmful chemicals</font></h4>
                    </td>
                    
                </tr>
            </table>
            <hr>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-sm-4">
                    </div>
                    <div class="col-sm-4">
                        
                               
                                    <div class="form-wrap">
                                        <?php if($this->session->userdata('message_register') == 'N'){ ?>
                                            <div id="alert-message" class="alert alert-warning alert-dismissible" role="alert">คุณยังไม่ได้เป็นสมาชิก กรุณาสมัครสมาชิกก่อน</div>
                                        <?php }?>
                                        <form id="form_login" role="form" action="<?php echo base_url(); ?>index.php/login/login" method="post" id="login-form" autocomplete="off">
                                            <div class="form-group">
                                                <input type="text" name="username" id="username" class="form-control" placeholder="ชื่อผู้ใช้งาน">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="password" id="password" class="form-control" placeholder="รหัสผ่าน">
                                            </div>
                                            <div class="form-group text-center">
                                                <a class="btn btn-success"  id="btn_login"><span class="glyphicon glyphicon-log-in fa-1x" aria-hidden="true"> เข้าสู่ระบบ</span></a>
                                                <a class="btn btn-primary" href="<?php echo base_url(); ?>index.php/management_controller/registerUser_controller/register_user"><span class="glyphicon glyphicon-user fa-1x" aria-hidden="true"> สมัครสมาชิก</span></a>
                                            </div>

                                        </form>
                                        
                                    </div>
                                
                            
                    </div>
                     <div class="col-sm-4">
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container -->
        <?php $this->load->view('modal.html');?>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#btn_login").click(function() {
                    var username = $('#username').val();
                    var password = $('#password').val();
                    if(username == ""){
                        $('#message').html('กรุณาระบุ ชื่อผู้ใช้งาน');
                        $('#myModal').modal('show');
                     }else if (password == "") {
                        $('#message').html('กรุณาระบุ รหัสผ่าน');
                        $('#myModal').modal('show');
                     }else{
                        $("#form_login").submit();
                     }
                });
                window.setTimeout(function() { 
                    $("#alert-message").alert('close');
                    <?php $this->session->unset_userdata('message_register');?>
                }, 2000);
            });

        </script>
    </body>
</html>
