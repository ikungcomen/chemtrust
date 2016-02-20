<div class="col-md-9">
    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-1">
                <span class="glyphicon glyphicon-edit fa-3x icon" aria-hidden="true"></span>
            </div>
            <div class="col-sm-11">
                <h4 class="font-title"><b>การจำแนกประเภทสารเคมี</b></h4>
            </div>

            <hr width="100%">
            <br><br>
            <div class="panel-body form-horizontal payment-form">
                <form id="search_classify" method="post" action="<?php echo base_url(); ?>index.php/classify_cemee/classifyCemee_controller/search_classify">                
                    <fieldset>  
                        <div class="form-group text-right">
                            <div class="col-sm-12">
                                <a class="btn btn-primary"><span class="glyphicon glyphicon-search fa-1x" aria-hidden="true"> ค้นหา</span></a>
                                <button type="reset" class="btn btn-danger"><span class="glyphicon glyphicon-refresh fa-1x" aria-hidden="true"> ยกเลิก</span></button>
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group">
                            <label  class="col-sm-3 control-label">รหัสสารเคมี :</label>
                            <div class="col-sm-3">
                                <input class="form-control" type="text" id="chem_no" name="chem_no"    placeholder="รหัสสารเคมี">
                            </div>
                            <label  class="col-sm-3 control-label">CAS No. :</label>
                            <div class="col-sm-3">
                                <input class="form-control " type="text"  id="" name="" placeholder="CAS No.">
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-3  text-right">ประเภทสารเคมี</label>
                            <div class="col-sm-3">
                                <input class="form-control " type="text"  id="" name="" placeholder="ประเภทสารเคมี">
                            </div>
                            <label  class="col-sm-3 control-label">ชื่อสารเคมี :</label>
                            <div class="col-sm-3">
                                <input class="form-control " type="text"  id="" name="" placeholder="ชื่อสารเคมี">
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-3 control-label">กฏหมายแรงงาน :</label>
                            <div class="col-sm-3">
                                <input class="form-control " type="text"  id="" name="" placeholder="สารเคมีอันตรายที่ต้องรายงาน สอ.1">
                            </div>

                        </div>
                        <div class="form-group">
                            <label  class="col-sm-3 control-label">กฏหมายอุตสาหกรรม :</label>
                            <div class="col-sm-3">
                                <input class="form-control " type="text"  id="" name="" placeholder="วัตถุอันตรายชนิดที่ 2">
                            </div>
                        </div>
                        <br><br><br><br>

                        <div class="form-group">
                            <div class="col-lg-12" style="padding-left:120px">
                                <p>
                                    <a  class="btn btn-sq-lg btn-warning">
                                        <br/>
                                        <span class="glyphicon glyphicon-fire fa-4x" aria-hidden="true"></span>
                                        <br/>
                                        ของเหลวไวไฟ <br>
                                    </a>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a  class="btn btn-sq-lg btn-danger">
                                        <br/>
                                        <span class="glyphicon glyphicon-user fa-4x" aria-hidden="true"></span>
                                        <br/>
                                        อันตรายต่อสุขภาพ <br>
                                    </a>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a class="btn btn-sq-lg btn-success">
                                        <br/> 
                                        <span class="glyphicon glyphicon-tree-deciduous fa-4x" aria-hidden="true"></span>
                                        <br/>
                                        เป็นอันตรายต่อ<br>สิ่งแวดล้อม 
                                    </a>
                                </p>
                            </div>


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
        
          $("#search").click(function () {

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
                $("#search_classify").submit();
            }
        });
        
        $("#chem_no").autocomplete({
            source: function (request, response) {
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/utility/utility_controller/getTb_chem_info",
                    type: 'POST',
                    cache: false,
                    dataType: "json",
                    data: {
                        cemee_code: $("#cemee_code").val()
                    },
                    success: function (data) {
                        response($.map(data, function (list) {
                            return {   
                                label: list.chem_no +"-"+ list.chem_name_th,
                                value: list.chem_no 
                                
                            };
                        }));
                    },
                    error: function (data) {
                        alert("Error");
                    }
                });
            },
            minLength: 1,
            select: function (event, ui) {
                $("#chem_no").val(ui.item.value);
                return false;
            }
        });
    });

</script>