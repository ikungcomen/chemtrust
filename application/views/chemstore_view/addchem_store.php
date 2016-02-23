<div class="col-md-9">
    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-1">
                <span class="glyphicon glyphicon-plus-sign fa-3x icon" aria-hidden="true"></span>
            </div>
            <div class="col-sm-11">
                <h4 class="font-title"><b>เพิ่มประเภทสารเคมีเข้าสู่ระบบ</b></h4>
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
                <form id="save_warehouse" method="post" action="<?php echo base_url(); ?>index.php/chemstore_controller/chemStore_controller/add_chem_store">
                    <fieldset>  
                        <div class="form-group">
                            <label  class="col-sm-3 control-label">รหัสประเภทสารเคมี :</label>
                            <div class="col-sm-3">
                                <input class="form-control request" type="text" id="chem_store_type" name="chem_store_type"  maxlength="10" placeholder="รหัสประเภทสารเคมี">
                            </div>
                            <label  class="col-sm-3 control-label">ชื่อประเภทสารเคมี :</label>
                            <div class="col-sm-3">
                                <input class="form-control request" type="text" id="chem_store_name" name="chem_store_name"  maxlength="100" placeholder="ชื่อประเภทสารเคมี">
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
            var chem_store_type = $('#chem_store_type').val().trim();
            var chem_store_name = $('#chem_store_name').val().trim();
            if (chem_store_type == "") {
                $('#message').html('กรุณาระบุ รหัสประเภทสารเคมี');
                $('#myModal').modal('show');
            }else if (chem_store_name == "") {
                $('#message').html('กรุณาระบุ ชื่อประเภทสารเคมี');
                $('#myModal').modal('show');
            }else {
                $("#save_warehouse").submit();
            }
        });
         $("#chem_store_type").mouseout(function(){
             $.ajax({
                    url: "<?php echo base_url(); ?>index.php/chemstore_controller/chemStore_controller/check_store",
                    type: 'POST',
                    cache: false,
                    data: {
                        chem_store_type: $("#chem_store_type").val()
                    },
                    success: function (data) {
                        if(data > 0){
                            $('#message').html('ข้อมูลรหัสประเภทสารเคมี '+$("#chem_store_type").val()+' มีอยู่แล้วในระบบ');
                            $('#myModal').modal('show');
                            $('#chem_store_type').val('');
                            
                        }
                    }
                });
         });
        
    });

</script>

