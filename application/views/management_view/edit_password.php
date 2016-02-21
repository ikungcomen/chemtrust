<div class="col-md-9">
    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-1">
                <span class="glyphicon glyphicon-user fa-3x icon" aria-hidden="true"></span>
            </div>
            <div class="col-sm-11">
                <h4 class="font-title"><b>แก้ไขรหัสผ่าน</b></h4>
            </div>
            <hr width="100%">
            <br>
            <div class="panel-body form-horizontal payment-form">
                <a class="btn btn-info" href="<?php base_url(); ?>index.php/management_controller/editPassword_controller/select_user/<?php echo $this->session->userdata('user_id'); ?>"><span class="glyphicon glyphicon-floppy-save fa-1x" aria-hidden="true"> แก้ไขข้อมูลส่วนตัว</span></a><br><hr><br>
                <?php if ($this->session->userdata('message_save') == 'true') { ?>
                    <div id="alert-message" class="alert alert-success alert-dismissible" role="alert">แก้ไขรหัสผ่านเรียบร้อย</div>
                <?php }?>
                <div class="form-group">
                    <label  class="col-sm-2 text-right">ชื่อ - นามสกุล : </label>
                    <label  class="col-sm-4"><?php echo $user[0]['user_prefix'] . " " . $user[0]['user_name'] . " " . $user[0]['user_last_name']; ?></label>
                    <label  class="col-sm-2 text-right">สิทธิ์การใช้งาน : </label>
                    <label  class="col-sm-4"><?php echo $user[0]['user_role']; ?></label>

                </div>
                <div class="form-group">
                    <label  class="col-sm-2 text-right">อีเมล์ : </label>
                    <label  class="col-sm-4"><?php echo $user[0]['user_email']; ?></label>
                    <label  class="col-sm-2 text-right">เบอร์ที่ติดต่อได้ : </label>
                    <label  class="col-sm-4"><?php echo $user[0]['user_tel']; ?></label>

                </div>
                <br><br>
                <form id="save_password" method="post" action="<?php base_url(); ?>index.php/management_controller/editPassword_controller/update_passsword" >
                    <div class="form-group">
                        <div class="col-sm-2">

                        </div>
                        <label  class="col-sm-2 control-label">รหัสผ่านเดิม :</label>
                        <div class="col-sm-4">
                            <input class="form-control request" type="text"  id="default_user_pass" name="default_user_pass" maxlength="50" placeholder="รหัสผ่านเดิม">
                        </div>
                        <div class="col-sm-4">

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2">

                        </div>
                        <label  class="col-sm-2 control-label">รหัสผ่านใหม่ :</label>
                        <div class="col-sm-4">
                            <input class="form-control request" type="text"  id="new_user_pass" name="new_user_pass" maxlength="50" placeholder="รหัสผ่านใหม่">
                        </div>
                        <div class="col-sm-2">

                        </div>
                    </div><br><br>
                    <div class="form-group text-right">
                        <div class="col-sm-12">
                            <a class="btn btn-primary" id="save"><span class="glyphicon glyphicon-floppy-save fa-1x" aria-hidden="true"> แก้ไขรหัสผ่าน</span></a>
                            <button type="reset" class="btn btn-danger"><span class="glyphicon glyphicon-refresh fa-1x" aria-hidden="true"> ยกเลิก</span></button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<?php $this->load->view('modal.html'); ?>
<script type="text/javascript">
    $(document).ready(function () {
        $('#save').click(function () {
            var default_user_pass = $('#default_user_pass').val().trim();
            var new_user_pass = $('#new_user_pass').val().trim();
            if(default_user_pass == ""){
                $('#message').html("กรุณาระบุ รหัสผ่านเดิม");
                $('#myModal').modal('show');
            }else if(new_user_pass == ""){
                $('#message').html("กรุณาระบุ รหัสผ่านใหม่");
                $('#myModal').modal('show');
            }else{
                $("#save_password").submit();
            }
        });
        $('#default_user_pass').mouseout(function () {
            var default_user_pass = $('#default_user_pass').val().trim();
            if (default_user_pass.length > 0) {
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/management_controller/editPassword_controller/check_passsword",
                    type: 'POST',
                    cache: false,
                    dataType: "json",
                    data: {
                        default_user_pass: $("#default_user_pass").val()
                    },
                    success: function (data) {
                        $('#message').html(data);
                        $('#myModal').modal('show');
                        $('#default_user_pass').val('');

                    },
                    error: function (data) {
                        //alert("Error");
                    }
                });
            }

        });
        window.setTimeout(function () {
            $("#alert-message").alert('close');
<?php $this->session->unset_userdata('message_save'); ?>
        }, 2000);
    });
</script>



