<div class="col-md-9">
    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-1">
                <span class="glyphicon glyphicon-edit fa-3x icon" aria-hidden="true"></span>
            </div>
            <div class="col-sm-11">
                <h4 class="font-title"><b>แก้ไขข้อมูลสารเคมี</b></h4>
            </div>

            <hr width="100%">
            <br><br>
            <div class="form-group">
                <div class="col-sm-6">
                    <a class="btn btn-success"  href="<?php echo base_url(); ?>index.php/search_cemee/searchCemee_controller/detai_chem/<?php echo $chem_info[0]['chem_no']; ?>"  ><span class="glyphicon glyphicon-backward" aria-hidden="true"> ย้อนกลับ</span></a>
                </div>
            </div>
            <br>
            <div class="panel-body form-horizontal payment-form">
                
                <form id="update_cemee" method="post" action="<?php echo base_url(); ?>index.php/search_cemee/searchCemee_controller/update_chem">
                    <fieldset>  
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">รหัสสารเคมี :</label>
                            <div class="col-sm-4">
                                <input class="form-control" readonly="true" type="text" id="chem_no" name="chem_no"  maxlength="10" value="<?php echo $chem_info[0]['chem_no']; ?>" placeholder="รหัสสารเคมี">
                            </div>
                            <label  class="col-sm-2 control-label">Cas No. :</label>
                            <div class="col-sm-4">
                                <input class="form-control " type="text"  id="chem_cas_number" name="chem_cas_number" value="<?php echo $chem_info[0]['chem_cas_number']; ?>" maxlength="10" placeholder="Cas Number">
                            </div>

                        </div>
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">ลำดับในบัญชี :</label>
                            <div class="col-sm-4">
                                <input class="form-control " type="number"  id="chem_seq" name="chem_seq"  value="<?php echo $chem_info[0]['chem_seq']; ?>" placeholder="ลำดับในบัญชี">
                            </div>
                            <label  class="col-sm-2 control-label">ประเถทสารเคมี :</label>
                            <div class="col-sm-4">
                                <input class="form-control " type="text"  id="chem_type" name="chem_type"  value="<?php echo $chem_info[0]['chem_type']; ?>" placeholder="ประเถทสารเคมี">
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">ชื่อสารเคมีภาษาไทย :</label>
                            <div class="col-sm-4">
                                <input class="form-control " type="text"  id="chem_name_th" name="chem_name_th" value="<?php echo $chem_info[0]['chem_name_th']; ?>"   maxlength="250" placeholder="ชื่อสารเคมีภาษาไทย">
                            </div>
                            <label  class="col-sm-2 control-label">ชื่อสารเคมีภาษาอังกฤษ :</label>
                            <div class="col-sm-4">
                                <input class="form-control " type="text"  id="chem_name_en" name="chem_name_en" value="<?php echo $chem_info[0]['chem_name_en']; ?>"  maxlength="250" placeholder="ชื่อสารเคมีภาษาอังกฤษ">
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">จำนวนนำเข้า :</label>
                            <div class="col-sm-4">
                                <input class="form-control " type="number"  id="chem_qty_in" name="chem_qty_in" value="<?php echo $chem_info[0]['chem_qty_in']; ?>" placeholder="จำนวนนำเข้า">
                            </div>
                            <label  class="col-sm-2 control-label">หน่วยนำเข้า :</label>
                            <div class="col-sm-4">
                                <select class="form-control" id="chem_qty_in_msm" name="chem_qty_in_msm">
                                    <option value="<?php echo $chem_info[0]['chem_qty_in_msm']; ?>"><?php echo $chem_info[0]['chem_qty_in_msm']; ?></option>
                                    <?php foreach ($msm_master_in as $row) { ?>
                                        <option value="<?php echo $row['chem_msm_name']; ?>"><?php echo $row['chem_msm_name']; ?></option>
                                    <?php } ?>
                                </select>

                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">จำนวนคงเหลือ :</label>
                            <div class="col-sm-4">
                                <input class="form-control " type="number"  id="chem_qty_boh" name="chem_qty_boh" value="<?php echo $chem_info[0]['chem_qty_boh']; ?>"  placeholder="จำนวนคงเหลือ">
                            </div>
                            <label  class="col-sm-2 control-label">หน่วยคงเหลือ :</label>
                            <div class="col-sm-4">
                                <select class="form-control" id="chem_qty_boh_msm" name="chem_qty_boh_msm">
                                    <option value="<?php echo $chem_info[0]['chem_qty_boh_msm']; ?>"><?php echo $chem_info[0]['chem_qty_boh_msm']; ?></option>
                                    <?php foreach ($msm_master_out as $row) { ?>
                                        <option value="<?php echo $row['chem_msm_name']; ?>"><?php echo $row['chem_msm_name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">สถานที่จัดเก็บ :</label>
                            <div class="col-sm-4">
                                <input class="form-control " type="text"  id="chem_location" name="chem_location"  value="<?php echo $chem_info[0]['chem_location']; ?>" maxlength="50" placeholder="สถานที่จัดเก็บ">
                            </div>
                            <div class="col-sm-4">

                            </div>
                        </div>
                        <div class="form-group text-right">
                            <div class="col-sm-12">
                                <a class="btn btn-primary" id="update"><span class="glyphicon glyphicon-floppy-save fa-1x" aria-hidden="true"> บันทึกข้อมูล</span></a>
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
        $("#update").click(function () {

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
                $("#update_cemee").submit();
            }
        });
        
        /*
        $("#chem_no").autocomplete({
            source: function (request, response) {
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/add_cemee/addCemee_controller/getTb_chem_info",
                    type: 'POST',
                    cache: false,
                    data: {
                        chem_no: $("#chem_no").val()
                    },
                    success: function (data) {
                        if (data == '1') {
                            $('#message').html('ข้อมูลรหัสสารเคมี ' + $("#chem_no").val() + ' มีอยู่แล้วในระบบ');
                            $('#myModal').modal('show');
                            $('#chem_no').val('');

                        }
                    }
                });
            },
            minLength: 1
        });*/
    });

</script>

