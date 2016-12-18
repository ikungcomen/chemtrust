<div class="col-md-9">
    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-1">
                <span class="glyphicon glyphicon-cog fa-3x icon" aria-hidden="true"></span>
            </div>
            <div class="col-sm-11">
                <h4 class="font-title"><b>ตั้งค่า URL (ตั้งค่า)</b></h4>
            </div>

            <hr width="100%">
            <br><br>
            <div class="form-group">
                <div class="col-sm-12 text-left">
                    <a class="btn btn-success"  href="<?php echo base_url(); ?>index.php/main_law/main_law_controller/main_law"  ><span class="glyphicon glyphicon-backward" aria-hidden="true"> ย้อนกลับ</span></a>
                </div>
                
            </div>
            <br>
            <hr>
            <div class="panel-body form-horizontal payment-form">
                <?php if ($this->session->userdata('message_save') == 'true') { ?>
                    <div id="alert-message" class="alert alert-success alert-dismissible" role="alert">บันทึกข้อมูลเรียบร้อย</div>
                <?php }?>
                <form id="save_url" method="post" action="<?php echo base_url(); ?>index.php/chem_url/chem_url_controller/save_chem_url">
                    <fieldset>  
                        <div class="form-group">
                            <label  class="col-sm-3 control-label">ชื่อรายงาน :</label>
                            <div class="col-sm-5">
                                <select class="form-control request" id="report_name" name="report_name">
                                    <option value="">----------------- ชื่อรายงาน ------------------</option>
                                        <option value="1">รายงาน วอ.อก.6</option>
                                        <option value="2">รายงาน วอ.อก.7</option>
                                        <option value="3">รายงาน วอ.อก.4</option>
                                        <option value="4">รายงาน วอ.อก.20</option>
                                </select>
                            
                            </div>
                            

                        </div>
                        <div class="form-group">
                            <label  class="col-sm-3 control-label">URL :</label>
                            <div class="col-sm-5">
                                <input class="form-control request" type="text" id="url_name" name="url_name"  maxlength="100" placeholder="URL">
                            </div>
                            <label  class="col-sm-4  text-left"><font color="red">** ห้ามมี http:// ตัวอย่าง www.google.com </font></label>
                        </div>
                        
                        
                        <div class="form-group text-right">
                            <div class="col-sm-12">
                                <a class="btn btn-primary" id="save"><span class="glyphicon glyphicon-floppy-save fa-1x" aria-hidden="true"> บันทึกข้อมูล</span></a>
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
       
        $("#save").click(function () {
            var report_name = $('#report_name').val().trim();
            var url_name = $('#url_name').val().trim();
            if (report_name == "") {
                $('#message').html('กรุณาระบุชื่อรายงาน');
                $('#myModal').modal('show');
            }else if (url_name == "") {
                $('#message').html('กรุณาระบุ URL');
                $('#myModal').modal('show');
            }else {
                $("#save_url").submit();
            }
        });
         window.setTimeout(function () {
          $("#alert-message").alert('close');
          <?php $this->session->unset_userdata('message_save');?>
         }, 2000);
        
    });

</script>

