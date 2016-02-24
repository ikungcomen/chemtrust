<div class="col-md-9">
    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-1">
                <span class="glyphicon glyphicon-user fa-3x icon" aria-hidden="true"></span>
            </div>
            <div class="col-sm-11">
                <h4 class="font-title"><b>สมัครสมาชิก(เพิ่ม)</b></h4>
            </div>

            <hr width="100%">
            <br><br>
            <div class="panel-body form-horizontal payment-form">
                <?php if ($this->session->userdata('message_save') == 'true') { ?>
                    <div id="alert-message" class="alert alert-success alert-dismissible" role="alert">บันทึกข้อมูลเรียบร้อย</div>
                <?php } ?>
                <form id="save_user" method="post" action="<?php base_url(); ?>index.php/management_controller/registerUser_controller/save_user" enctype="multipart/form-data">
                    <fieldset>  

                        <div class="form-group">
                            
                            <label  class="col-sm-2 control-label">คำนำหน้า :</label>
                            <div class="col-sm-10">
                                <select class="form-control request" id="user_prefix" name="user_prefix">
                                    <option value="">คำนำหน้า</option>
                                    <option value="นาย">นาย</option>
                                    <option value="นาง">นาง</option>
                                    <option value="นางสาว">นางสาว</option>

                                </select>
                            </div>
                            

                        </div>
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">ชื่อ :</label>
                            <div class="col-sm-4">
                                <input class="form-control request" type="text" id="user_name" name="user_name"  maxlength="50"  placeholder="ชื่อ">
                            </div>
                            <label  class="col-sm-2 control-label">นามสกุล:</label>
                            <div class="col-sm-4">
                                <input class="form-control request" type="text" id="user_last_name" name="user_last_name"   maxlength="50"  placeholder="นามสกุล">
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">อีเมลล์ :</label>
                            <div class="col-sm-4">
                                <input class="form-control " type="text"  id="user_email" name="user_email" maxlength="50" placeholder="อีเมลล์">
                                
                            </div>
                            <label  class="col-sm-2 control-label">เบอร์ที่ติดต่อได้ :</label>
                            <div class="col-sm-4">
                                <input class="form-control request" type="number"  id="user_tel" name="user_tel" placeholder="เบอร์ที่ติดต่อได้">
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">ที่อยู่ติดต่อได้ :</label>
                            <div class="col-sm-4">
                                <textarea class="form-control"  id="user_address" name="user_address" maxlength="255" placeholder="ที่อยู่ติดต่อได้"></textarea>
                            </div>
                            <label  class="col-sm-2 control-label">รูปประจำตัว :</label>
                            <div class="col-sm-4">
                                <label><font color="red">*** นามสกุลไฟล์ gif,jpg,png เท่านั้น</font></label>
                                <input id="picture" name="picture" type="file" placeholder="รูปประจำตัว " class="form-control request">
                            </div>

                        </div>

                        <div class="form-group">
                            <label  class="col-sm-2 control-label">เบอร์แฟกซ์ :</label>
                            <div class="col-sm-4">
                                <input class="form-control " type="number"  id="user_fax" name="user_fax" placeholder="เบอร์แฟกซ์">
                            </div>
                            <label  class="col-sm-2 control-label">สิทธิ์การใช้งาน :</label>
                            <div class="col-sm-4">
                                <select class="form-control request" id="user_role" name="user_role">
                                    <option value="">-- สิทธิ์การใช้งาน --</option>
                                    <option value="admin">admin</option>
                                    <option value="user">user</option>
                                </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <label  class="col-sm-2 control-label">ชื่อผู้ใช้ :</label>
                            <div class="col-sm-4">
                                <input class="form-control request" type="text"  id="user_id" name="user_id"  maxlength="10" placeholder="ชื่อผู้ใช้">
                            </div>
                            <label  class="col-sm-2 control-label">รหัสผ่าน :</label>
                            <div class="col-sm-4">
                                <input class="form-control request" type="text"  id="user_pass" name="user_pass"  maxlength="20"  placeholder="รหัสผ่าน">
                            </div>
                        </div>
                        <div class="form-group text-right">
                            <div class="col-sm-12">
                                <a class="btn btn-primary" id="save"><span class="glyphicon glyphicon-floppy-save fa-1x" aria-hidden="true"> สมัครสมาชิก</span></a>
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
    $(document).ready(function () {
        $('#save').click(function () {
            var user_prefix = $('#user_prefix').val();
            var user_name = $('#user_name').val().trim();
            var user_last_name = $('#user_last_name').val().trim();
            var user_tel = $('#user_tel').val().trim();
            var picture = $('#picture').val().trim();
            var user_role = $('#user_role').val().trim();
            var user_id = $('#user_id').val().trim();
            var user_pass = $('#user_pass').val().trim();
            
            
            
            
           
            
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
            } else if (picture == "") {
                $('#message').html('กรุณาระบุ รูปประจำตัว');
                $('#myModal').modal('show');
            }else if (user_role == "") {
                $('#message').html('กรุณาระบุ สิทธิ์การใช้งาน');
                $('#myModal').modal('show');
            } else if (user_id == "") {
                $('#message').html('กรุณาระบุ ชื่อผู้ใช้');
                $('#myModal').modal('show');
            } else if (user_pass == "") {
                $('#message').html('กรุณาระบุ รหัสผ่าน');
                $('#myModal').modal('show');
            }else{
                var num = picture.split(".").length;
                var pic_arr = picture.split(".");
                var file_name = pic_arr[num-1];
                if(file_name != "jpg" && file_name != "gif" && file_name != "png"){// 
                    $('#message').html('กรุณาเลือกไฟล์นามสกุล jpg หรือ png หรือ gif เท่านั้น');
                    $('#myModal').modal('show');
                }else{
                    $("#save_user").submit();
                }
            }
        });
        window.setTimeout(function () {
            $("#alert-message").alert('close');
<?php $this->session->unset_userdata('message_save'); ?>
        }, 2000);
        $('#user_id').mouseout(function () {
            var user_id = $('#user_id').val().trim();
            if (user_id.length > 0) {
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/management_controller/registerUser_controller/check_user",
                    type: 'POST',
                    cache: false,
                    dataType: "json",
                    data: {
                        user_id: $("#user_id").val()
                    },
                    success: function (data) {
                        $('#message').html(data);
                        $('#myModal').modal('show');
                        $("#user_id").focus();
                        $('#user_id').val('');

                    },
                    error: function (data) {
                        //alert("Error");
                    }
                });
            }

        });
        
    });
</script>

