<div class="col-md-9">
    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-1">
                <span class="glyphicon glyphicon-plus-sign fa-3x icon" aria-hidden="true"></span>
            </div>
            <div class="col-sm-11">
                <h4 class="font-title"><b>เพิ่มสารเคมีใหม่เข้าสู่ระบบ</b></h4>
            </div>

            <hr width="100%">
            <br><br>
            <div class="panel-body form-horizontal payment-form">
                <?php if ($this->session->userdata('message_save') == 'true') { ?>
                    <div id="alert-message" class="alert alert-success alert-dismissible" role="alert">บันทึกข้อมูลเรียบร้อย</div>
                <?php }?>
                <form id="save_cemee" method="post" action="<?php echo base_url(); ?>index.php/add_cemee/addCemee_controller/save_cemee">
                    <fieldset>  
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">รหัสสารเคมี :</label>
                            <div class="col-sm-4">
                                <input class="form-control request" type="text" id="chem_no" name="chem_no"  maxlength="10" placeholder="รหัสสารเคมี">
                            </div>
                            <label  class="col-sm-2 control-label">Cas No. :</label>
                            <div class="col-sm-4">
                                <input class="form-control " type="text"  id="chem_cas_number" name="chem_cas_number" maxlength="10" placeholder="Cas Number">
                            </div>

                        </div>
                        <div class="form-group text-right">
                            <div class="col-sm-12">
                                <a class="btn btn-primary" href="<?php echo base_url(); ?>index.php/report_controller/msds_controller/chem_report"><span class="glyphicon glyphicon-floppy-save fa-1x" aria-hidden="true"> พิมพ์รายงาน</span></a>
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

            var chem_no = $('#chem_no').val().trim();
            if (chem_no == "") {
                $('#message').html('กรุณาระบุ รหัสสารเคมี');
                $('#myModal').modal('show');
            }  else {
                $("#save_cemee").submit();
            }
        });
        
        
        
    });

</script>

