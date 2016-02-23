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
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">ลำดับในบัญชี :</label>
                            <div class="col-sm-3">
                                <input class="form-control " type="number"  id="chem_seq" name="chem_seq"  placeholder="ลำดับในบัญชี">
                            </div>
                            <label  class="col-sm-2 control-label">ประเภทสารเคมี :</label>
                            <div class="col-sm-4">
                                <select class="form-control" id="chem_type" name="chem_type">
                                    <option value="">-- ประเภทสารเคมี --</option>
                                    <?php foreach ($chem_type as $row) { ?>
                                        <option value="<?php echo $row['chem_store_type']; ?>"><?php echo $row['chem_store_name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-sm-1">
                                    <a class="btn btn-primary" href="<?php base_url();?>index.php/chemstore_controller/chemStore_controller/show_chem_store"><span class="glyphicon glyphicon-plus fa-1x" aria-hidden="true"></span></a>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">ชื่อสารเคมีภาษาไทย :</label>
                            <div class="col-sm-4">
                                <input class="form-control " type="text"  id="chem_name_th" name="chem_name_th" maxlength="250" placeholder="ชื่อสารเคมีภาษาไทย">
                            </div>
                            <label  class="col-sm-2 control-label">ชื่อสารเคมีภาษาอังกฤษ :</label>
                            <div class="col-sm-4">
                                <input class="form-control " type="text"  id="chem_name_en" name="chem_name_en" maxlength="250" placeholder="ชื่อสารเคมีภาษาอังกฤษ">
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">จำนวนนำเข้า :</label>
                            <div class="col-sm-3">
                                <input class="form-control " type="number"  id="chem_qty_in" name="chem_qty_in" placeholder="จำนวนนำเข้า">
                            </div>
                            <label  class="col-sm-2 control-label">หน่วยนำเข้า :</label>
                            <div class="col-sm-4">
                                <select class="form-control" id="chem_qty_in_msm" name="chem_qty_in_msm">
                                    <option value="">-- หน่วยนำเข้า --</option>
                                    <?php foreach ($msm_master as $row) { ?>
                                        <option value="<?php echo $row['chem_msm_no']; ?>"><?php echo $row['chem_msm_name']; ?></option>
                                    <?php } ?>
                                </select>

                            </div>
                            <div class="col-sm-1">
                                    <a class="btn btn-primary" href="<?php base_url();?>index.php/msmmaster_controller/msmMaster_controller/chem_warehouse"><span class="glyphicon glyphicon-plus fa-1x" aria-hidden="true"></span></a>
                                </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">จำนวนคงเหลือ :</label>
                            <div class="col-sm-3">
                                <input class="form-control " type="number"  id="chem_qty_boh" name="chem_qty_boh" placeholder="จำนวนคงเหลือ">
                            </div>
                            <label  class="col-sm-2 control-label">หน่วยคงเหลือ :</label>
                            <div class="col-sm-4">
                                <select class="form-control" id="chem_qty_boh_msm" name="chem_qty_boh_msm">
                                    <option value="">-- หน่วยคงเหลือ --</option>
                                    <?php foreach ($msm_master as $row) { ?>
                                        <option value="<?php echo $row['chem_msm_no']; ?>"><?php echo $row['chem_msm_name']; ?></option>
                                    <?php } ?>
                                </select>
                           </div>
                            <div class="col-sm-1">
                                    <a class="btn btn-primary" href="<?php base_url();?>index.php/msmmaster_controller/msmMaster_controller/chem_warehouse"><span class="glyphicon glyphicon-plus fa-1x" aria-hidden="true"></span></a>
                                </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">สถานที่จัดเก็บ :</label>
                            <div class="col-sm-4">
                                <select class="form-control" id="chem_location" name="chem_location">
                                    <option value="">-- สถานที่จัดเก็บ --</option>
                                    <?php foreach ($chem_warehouse as $row) { ?>
                                        <option value="<?php echo $row['chem_warehouse_code']; ?>"><?php echo $row['chem_warehouse_name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-sm-4 text-left">
                                <a class="btn btn-primary" href="<?php base_url();?>index.php/chem_warehouse/chemwarehouse_controller/chem_warehouse"><span class="glyphicon glyphicon-plus fa-1x" aria-hidden="true"></span></a>
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

            var chem_no = $('#chem_no').val().trim();
            /*var chem_cas_number = $('#chem_cas_number').val().trim();
            var chem_seq = $('#chem_seq').val().trim();
            var chem_name_th = $('#chem_name_th').val().trim();
            var chem_name_en = $('#chem_name_en').val().trim();
            var chem_type = $('#chem_type').val().trim();
            var chem_location = $('#chem_location').val().trim();
            var chem_qty_in = $('#chem_qty_in').val().trim();
            var chem_qty_in_msm = $('#chem_qty_in_msm').val().trim();
            var chem_qty_boh = $('#chem_qty_boh').val().trim();
            var chem_qty_boh_msm = $('#chem_qty_boh_msm').val().trim();*/

            if (chem_no == "") {
                $('#message').html('กรุณาระบุ รหัสสารเคมี');
                $('#myModal').modal('show');
            } /*else if (chem_cas_number == "") {
                $('#message').html('กรุณาระบุ Cas Number');
                $('#myModal').modal('show');
            } else if (chem_seq == "") {
                $('#message').html('กรุณาระบุ ลำดับในบัญชี');
                $('#myModal').modal('show');
            } else if (chem_type == "") {
                $('#message').html('กรุณาระบุ ประเถทสารเคมี');
                $('#myModal').modal('show');
            } else if (chem_name_th == "") {
                $('#message').html('กรุณาระบุ ชื่อสารเคมีภาษาไทย');
                $('#myModal').modal('show');
            } else if (chem_name_en == "") {
                $('#message').html('กรุณาระบุ ชื่อสารเคมีภาษาอังกฤษ');
                $('#myModal').modal('show');
            } else if (chem_qty_in == "") {
                $('#message').html('กรุณาระบุ จำนวนนำเข้า');
                $('#myModal').modal('show');
            } else if (chem_qty_in_msm == "") {
                $('#message').html('กรุณาระบุ หน่วยนำเข้า');
                $('#myModal').modal('show');
            } else if (chem_qty_boh == "") {
                $('#message').html('กรุณาระบุ จำนวนคงเหลือ');
                $('#myModal').modal('show');
            } else if (chem_qty_boh_msm == "") {
                $('#message').html('กรุณาระบุ หน่วยคงเหลือ');
                $('#myModal').modal('show');
            } else if (chem_location == "") {
                $('#message').html('กรุณาระบุ สถานที่จัดเก็บ');
                $('#myModal').modal('show');
            }*/ else {
                $("#save_cemee").submit();
            }
        });
        window.setTimeout(function () {
          $("#alert-message").alert('close');
          <?php $this->session->unset_userdata('message_save');?>
         }, 2000);
         $("#chem_no").mouseout(function(){
             $.ajax({
                    url: "<?php echo base_url(); ?>index.php/add_cemee/addCemee_controller/getTb_chem_info",
                    type: 'POST',
                    cache: false,
                    data: {
                        chem_no: $("#chem_no").val()
                    },
                    success: function (data) {
                        if(data > 0){
                            $('#message').html('ข้อมูลรหัสสารเคมี '+$("#chem_no").val()+' มีอยู่แล้วในระบบ');
                            $('#myModal').modal('show');
                           $('#chem_no').val('');
                            
                       }
                    }
                });
         });
        
    });

</script>

