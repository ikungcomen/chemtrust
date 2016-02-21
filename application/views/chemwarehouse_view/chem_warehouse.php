<div class="col-md-9">
    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-1">
                <span class="glyphicon glyphicon-plus-sign fa-3x icon" aria-hidden="true"></span>
            </div>
            <div class="col-sm-11">
                <h4 class="font-title"><b>เพิ่มสถานที่จัดเก็บสารเคมีเข้าสู่ระบบ</b></h4>
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
                <form id="save_warehouse" method="post" action="<?php echo base_url(); ?>index.php/chem_warehouse/chemwarehouse_controller/add_chemwarehouse">
                    <fieldset>  
                        <div class="form-group">
                            <label  class="col-sm-3 control-label">รหัสสถานที่จัดเก็บ :</label>
                            <div class="col-sm-3">
                                <input class="form-control request" type="text" id="chem_warehouse_code" name="chem_warehouse_code"  maxlength="10" placeholder="รหัสสถานที่จัดเก็บ">
                            </div>
                            <label  class="col-sm-3 control-label">สถานที่จัดเก็บ :</label>
                            <div class="col-sm-3">
                                <input class="form-control request" type="text" id="chem_warehouse_name" name="chem_warehouse_name"  maxlength="100" placeholder="สถานที่จัดเก็บ">
                            </div>

                        </div>
                        <div class="form-group">
                            <label  class="col-sm-3 control-label">ข้อกำหนดคลัง :</label>
                            <div class="col-sm-9">
                                <textarea class="form-control " id="chem_warehoue_rule" name="chem_warehoue_rule" placeholder="ข้อกำหนดคลัง"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-3 control-label">ผู้ดูแลคลัง :</label>
                            <div class="col-sm-3">
                                <input class="form-control " type="text" id="chem_warehouse_user_control" name="chem_warehouse_user_control"  maxlength="50" placeholder="ผู้ดูแลคลัง">
                            </div>
                            
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
            var chem_warehouse_code = $('#chem_warehouse_code').val().trim();
            var chem_warehouse_name = $('#chem_warehouse_name').val().trim();
            if (chem_warehouse_code == "") {
                $('#message').html('กรุณาระบุ รหัสสถานที่จัดเก็บ');
                $('#myModal').modal('show');
            }else if (chem_warehouse_name == "") {
                $('#message').html('กรุณาระบุ สถานที่จัดเก็บ');
                $('#myModal').modal('show');
            }else {
                $("#save_warehouse").submit();
            }
        });
        $("#chem_warehouse_code").mouseout(function(){
             $.ajax({
                    url: "<?php echo base_url(); ?>index.php/chem_warehouse/chemwarehouse_controller/check_chemwarehouse",
                    type: 'POST',
                    cache: false,
                    data: {
                        chem_warehouse_code: $("#chem_warehouse_code").val()
                    },
                    success: function (data) {
                        if(data > 0){
                            $('#message').html('ข้อมูลสถานที่จัดเก็บ '+$("#chem_warehouse_code").val()+' มีอยู่แล้วในระบบ');
                            $('#myModal').modal('show');
                            $('#chem_warehouse_code').val('');
                            
                        }
                    }
                });
         });
        
    });

</script>

