<div class="col-md-9">
    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-1">
                <span class="glyphicon glyphicon-user fa-3x icon" aria-hidden="true"></span>
            </div>
            <div class="col-sm-11">
                <h4 class="font-title"><b>แก้ไขข้อมูลสมาชิก</b></h4>
            </div>

            <hr width="100%">
            <br><br>
            
            <center>
                <div class="profile-userpic">
                <img src="picture/pic_user/<?php echo $user[0]['user_factory']; ?>">
            </div>
            </center>
            <hr width="20%">
            <div class="panel-body form-horizontal payment-form">
                <?php if ($this->session->userdata('message_save') == 'true') { ?>
                    <div id="alert-message" class="alert alert-success alert-dismissible" role="alert">แก้ไขข้อมูลเรียบร้อย</div>
                <?php } ?>


                <form id="edit_user" method="post" action="<?php echo base_url(); ?>index.php/management_controller/editPassword_controller/update_user/<?php echo $user[0]['user_id']; ?>"  enctype="multipart/form-data">
                    <fieldset>  

                        <div class="form-group">

                            <label  class="col-sm-2 control-label">คำนำหน้า :</label>
                            <div class="col-sm-2">
                                <select class="form-control request" id="user_prefix" name="user_prefix">
                                    <?php if ($user[0]['user_prefix'] == "นาย") { ?>
                                        <option value="<?php echo $user[0]['user_prefix']; ?>"><?php echo $user[0]['user_prefix']; ?></option>
                                        <option value="นาง">นาง</option>
                                        <option value="นางสาว">นางสาว</option>
                                    <?php } else if ($user[0]['user_prefix'] == "นาง") { ?>
                                        <option value="<?php echo $user[0]['user_prefix']; ?>"><?php echo $user[0]['user_prefix']; ?></option>
                                        <option value="นาย">นาย</option>
                                        <option value="นางสาว">นางสาว</option>
                                    <?php } else if ($user[0]['user_prefix'] == "นางสาว") { ?>
                                        <option value="<?php echo $user[0]['user_prefix']; ?>"><?php echo $user[0]['user_prefix']; ?></option>
                                        <option value="นาย">นาย</option>
                                        <option value="นาง">นาง</option>
                                    <?php } ?>



                                </select>
                            </div>
                            <label  class="col-sm-1 control-label">ชื่อ :</label>
                            <div class="col-sm-3">
                                <input class="form-control request" type="text" id="user_name" name="user_name"  maxlength="50" value="<?php echo $user[0]['user_name']; ?>"  placeholder="ชื่อ" >
                            </div>
                            <label  class="col-sm-1 control-label">นามสกุล:</label>
                            <div class="col-sm-3">
                                <input class="form-control request" type="text" id="user_last_name" name="user_last_name"   maxlength="50" value="<?php echo $user[0]['user_last_name']; ?>"  placeholder="นามสกุล">
                            </div>

                        </div>
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">อีเมลล์ :</label>
                            <div class="col-sm-4">
                                <input class="form-control " type="text"  id="user_email" name="user_email" maxlength="50" value="<?php echo $user[0]['user_email']; ?>" placeholder="อีเมลล์">
                            </div>
                            <label  class="col-sm-2 control-label">เบอร์ที่ติดต่อได้ :</label>
                            <div class="col-sm-4">
                                <input class="form-control request" type="number"  id="user_tel" name="user_tel" value="<?php echo $user[0]['user_tel']; ?>" placeholder="เบอร์ที่ติดต่อได้">
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">ที่อยู่ติดต่อได้ :</label>
                            <div class="col-sm-4">
                                <textarea class="form-control"  id="user_address" name="user_address" maxlength="255" value="<?php echo $user[0]['user_address']; ?>" placeholder="ที่อยู่ติดต่อได้"><?php echo $user[0]['user_address']; ?></textarea>
                            </div>
                            <label  class="col-sm-2 control-label">รูปประจำตัว :</label>
                            <div class="col-sm-4">
                                <label  class="col-sm-2 control-label"><?php echo $user[0]['user_factory']; ?></label>
                                <input id="picture" name="picture" type="file" placeholder="รูปประจำตัว " class="form-control">
                            </div>

                        </div>

                        <div class="form-group">
                            <label  class="col-sm-2 control-label">เบอร์แฟกซ์ :</label>
                            <div class="col-sm-4">
                                <input class="form-control " type="number"  id="user_fax" name="user_fax"  value="<?php echo $user[0]['user_fax']; ?>"  placeholder="เบอร์แฟกซ์">
                            </div>
                            <label  class="col-sm-2 control-label">สิทธิ์การใช้งาน :</label>
                            <div class="col-sm-4">
                                <select class="form-control request" id="user_role" name="user_role">
                                    <?php if ($user[0]['user_role'] == "admin") { ?>
                                        <option value="<?php echo $user[0]['user_role']; ?>"><?php echo $user[0]['user_role'] ; ?></option>
                                        <option value="user">user</option>
                                    <?php } else if ($user[0]['user_role'] == "user") { ?>
                                        <option value="<?php echo $user[0]['user_role']; ?>"><?php echo $user[0]['user_role']; ?></option>
                                        <option value="admin">admin</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group text-right">
                            <div class="col-sm-12">
                                <a class="btn btn-primary" id="save"><span class="glyphicon glyphicon-floppy-save fa-1x" aria-hidden="true"> แก้ไขข้อมูล</span></a>
                                <button type="reset" class="btn btn-danger"><span class="glyphicon glyphicon-refresh fa-1x" aria-hidden="true"> ยกเลิก</span></button>
                            </div>
                        </div>
                    </fieldset>
                </form>

            </div>
        </div>
    </div>
</div>
<?php $this->load->view('modal.html'); ?>
<script type="text/javascript">
    $(document).ready(function() {

        $('#save').click(function() {
            var user_prefix = $('#user_prefix').val();
            var user_name = $('#user_name').val().trim();
            var user_last_name = $('#user_last_name').val().trim();
            var user_tel = $('#user_tel').val().trim();
            var user_role = $('#user_role').val().trim();

            if (user_prefix == "") {
                $('#message').html('กรุณาระบุ คำนำหน้า');
                $('#myModal').modal('show');
            } else if (user_name == "") {
                $('#message').html('กรุณาระบุ ชื่อ');
                $('#myModal').modal('show');
            } else if (user_last_name == "") {
                $('#message').html('กรุณาระบุ นามสกุล');
                $('#myModal').modal('show');
            } else if (user_tel == "") {
                $('#message').html('กรุณาระบุ เบอร์ที่ติดต่อได้');
                $('#myModal').modal('show');
            } else if (user_role == "") {
                $('#message').html('กรุณาระบุ สิทธิ์การใช้งาน');
                $('#myModal').modal('show');
            } else {
                $("#edit_user").submit();
            }
        });
        window.setTimeout(function() {
            $("#alert-message").alert('close');
<?php $this->session->unset_userdata('message_save'); ?>
        }, 2000);


    });
</script>

