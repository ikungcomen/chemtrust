<div class="col-md-9">
    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-1">
                <span class="glyphicon glyphicon-plus-sign fa-3x icon" aria-hidden="true"></span>
            </div>
            <div class="col-sm-11">
                <h4 class="font-title"><b>เพิ่มหน่วยจัดเก็บเข้าสู่ระบบ</b></h4>
            </div>

            <hr width="100%">
            <br><br>
            <div class="form-group">
                <div class="col-sm-12 text-left">
                    <a class="btn btn-success"  href="<?php echo base_url(); ?>index.php/add_cemee/addCemee_controller/add_cemee"  ><span class="glyphicon glyphicon-backward" aria-hidden="true"> ย้อนกลับ</span></a>
                </div>
                
            </div>
            <br>
            <hr>
            <div class="panel-body form-horizontal payment-form">
                <form id="save_msmmaster" method="post" action="<?php echo base_url(); ?>index.php/msmmaster_controller/msmMaster_controller/add_msmmaster">
                    <fieldset>  
                        <div class="form-group">
                            <label  class="col-sm-3 control-label">ชื่อหน่วยจัดเก็บ :</label>
                            <div class="col-sm-3">
                                <input class="form-control request" type="text" id="chem_msm_name" name="chem_msm_name"  maxlength="10" placeholder="ชื่อหน่วยจัดเก็บ">
                            </div>
                            <div class="col-sm-6 text-right">
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
            var chem_msm_name = $('#chem_msm_name').val().trim();
            if (chem_msm_name == "") {
                $('#message').html('กรุณาระบุ หน่วยจัดเก็บ');
                $('#myModal').modal('show');
            }else {
                $("#save_msmmaster").submit();
            }
        });
        $("#chem_msm_name").mouseout(function(){
             $.ajax({
                    url: "<?php echo base_url(); ?>index.php/msmmaster_controller/msmMaster_controller/check_msmmaster",
                    type: 'POST',
                    cache: false,
                    data: {
                        chem_msm_name: $("#chem_msm_name").val()
                    },
                    success: function (data) {
                        if(data > 0){
                            $('#message').html('ข้อมูลหน่วยจัดเก็บ '+$("#chem_msm_name").val()+' มีอยู่แล้วในระบบ');
                            $('#myModal').modal('show');
                            $('#chem_msm_name').val('');
                            
                        }
                    }
                });
         });
        
    });

</script>

