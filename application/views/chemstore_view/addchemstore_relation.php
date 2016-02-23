<div class="col-md-9">
    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-1">
                <span class="glyphicon glyphicon-plus-sign fa-3x icon" aria-hidden="true"></span>
            </div>
            <div class="col-sm-11">
                <h4 class="font-title"><b>เงื่อนไขการจัดเก็บสารเคมี</b></h4>
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
                <form id="save_warehouse" method="post" action="<?php echo base_url(); ?>index.php/chemstore_controller/chemStore_controller/add_chem_store_relation">
                    <fieldset>  
                        <div class="form-group">
                            <label  class="col-sm-3 control-label">ประเภทสารเคมี :</label>
                            <div class="col-sm-6">
                               <select class="form-control" id="chem_type" name="chem_type">
                                    <option value="">-- ประเภทสารเคมี --</option>
                                    <?php foreach ($chem_type as $row) { ?>
                                        <option value="<?php echo $row['chem_store_type']; ?>"><?php echo $row['chem_store_name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-3 control-label">ประเภทสารเคมี :</label>
                            <div class="col-sm-6">
                               <select class="form-control" id="chem_type_1" name="chem_type_1">
                                    <option value="">-- ประเภทสารเคมี --</option>
                                    <?php foreach ($chem_type as $row) { ?>
                                        <option value="<?php echo $row['chem_store_type']; ?>"><?php echo $row['chem_store_name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-3 control-label">เงื่อนไข :</label>
                            <div class="col-sm-6">
                               <select class="form-control" id="chem_type_2" name="chem_type_2">
                                    <option value="">-- เงื่อนไข --</option>
                                    <?php foreach ($chem_relation as $row) { ?>
                                        <option value="<?php echo $row['chem_relation_code']; ?>"><?php echo $row['chem_relation_descr']; ?></option>
                                    <?php } ?>
                                </select>
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
            var chem_type_1 = $('#chem_type_1').val().trim();
            var chem_type_2 = $('#chem_type_2').val().trim();
            if (chem_type_1 == "") {
                $('#message').html('กรุณาระบุ ประเภทสารเคมี');
                $('#myModal').modal('show');
            }else if (chem_type_2 == "") {
                $('#message').html('กรุณาระบุ ประเภทสารเคมี');
                $('#myModal').modal('show');
            }else {
                $("#save_warehouse").submit();
            }
        });
        /*$("#chem_warehouse_code").mouseout(function(){
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
        */
    });

</script>

