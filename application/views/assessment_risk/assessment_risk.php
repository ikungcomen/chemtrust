<?php
//info
$chem_no = ""; 
$chem_name_th = "";
$chem_type = "";
$chem_cas_number = "";

$chem_con_lvl_no =0;
$chem_seq_lvl_no = 0;
$chem_haz_eff_hea_no = 0;
$chem_measure_ole_twa_value_cur ="";
$chem_std_ole_twa_value="";

$chem_con_lvl_name="";
$chem_seq_lvl_name="";
$chem_seq_lvl_desc="";
$chem_haz_eff_hea_name="";
$chem_haz_eff_hea_desc="";
$chem_touch_lvl_no=0;
$chem_touch_lvl_name="";
$chem_touch_lvl_desc="";


$chem_risk_lvl_no="";
$chem_risk_lvl_name="";
$chem_risk_lvl_desc="";
$risk_lvl="";

//message
$message_flag = "";
$message = "";
//
$create_userid="";
$create_date ="";
$update_date="";
$update_userid="";


                                     
if ($model[0]['method'] != 'main') {
    if ($model[0]['method'] == 'haveRow') {
        //print_r($model[0]['data']);
        $chem_no = $model[0]['data']['chem_classify'][0]['chem_no'];
        $chem_cas_number = $model[0]['data']['chem_classify'][0]['chem_cas_number'];
        $chem_name_th = $model[0]['data']['chem_classify'][0]['chem_name_th'];
        $chem_type = $model[0]['data']['chem_classify'][0]['chem_type'];
        $chem_measure_ole_twa_value_cur =$model[0]['data']['chem_classify'][0]['chem_measure_ole_twa_value_cur'];
        $chem_std_ole_twa_value=$model[0]['data']['chem_classify'][0]['chem_std_ole_twa_value'];
        $chem_con_lvl_no =$model[0]['data']['chem_classify'][0]['chem_con_lvl_no'];
        $chem_con_lvl_name=$model[0]['data']['chem_classify'][0]['chem_con_lvl_name'];
        $chem_seq_lvl_no =$model[0]['data']['chem_classify'][0]['chem_seq_lvl_no'];
        $chem_seq_lvl_name=$model[0]['data']['chem_classify'][0]['chem_seq_lvl_desc'];        
        $chem_touch_lvl_no =$model[0]['data']['chem_classify'][0]['chem_touch_lvl_desc'];
        $chem_touch_lvl_name=$model[0]['data']['chem_classify'][0]['chem_touch_lvl_name'];        
        $chem_haz_eff_hea_no =$model[0]['data']['chem_classify'][0]['chem_haz_eff_hea_no'];
        $chem_haz_eff_hea_name=$model[0]['data']['chem_classify'][0]['chem_haz_eff_hea_name'];        
        $chem_risk_lvl_no=$model[0]['data']['chem_classify'][0]['chem_risk_lvl_no'];
        $chem_risk_lvl_name=$model[0]['data']['chem_classify'][0]['chem_risk_lvl_name'];        
        $chem_risk_lvl_desc=$model[0]['data']['chem_classify'][0]['chem_risk_lvl_desc'];
        $risk_lvl=$model[0]['data']['chem_classify'][0]['risk_lvl'];      

        
        $create_userid=$model[0]['data']['chem_classify'][0]['create_userid'];;
        $create_date =$model[0]['data']['chem_classify'][0]['create_date'];;
        $update_date=$model[0]['data']['chem_classify'][0]['update_date'];;
        $update_userid=$model[0]['data']['chem_classify'][0]['update_userid'];;
        
       
        $message_flag = $model[0]['message_flag'];
        $message = $model[0]['message'];
    } else {
        $message_flag = $model[0]['message_flag'];
        $message = $model[0]['message'];
        
    }
}
?>

<div class="col-md-9">
    <div class=mo"row">
        <div class="col-sm-12">
            <div class="col-sm-1">
                <span class="glyphicon glyphicon-globe fa-3x icon" aria-hidden="true"></span>
            </div>
            <div class="col-sm-11">
                <h4 class="font-title"><b>ประเมินความเสี่ยง(ค้นหา)</b></h4>
            </div>
            <hr width="100%">            
            <div class="panel-body form-horizontal payment-form">
                <form id="search_classify_frm" method="post" action="<?php echo base_url(); ?>index.php/assessment_risk/assessment_risk_controller/search_frm">                
                    <input type ="hidden" id="cmd" name="cmd">
                    <fieldset>                        
                        <div class="form-group ">        
                               <div class="col-sm-6 text-left">
                                   <a id="print_classify_btn" class="btn btn-primary" href="<?php echo base_url();?>index.php/assessment_risk/assessment_risk_controller/export" target="_blank">
                                    <span class="glyphicon glyphicon-print fa-1x" aria-hidden="true"> พิมพ์แบบฟอร์ม</span>
                                </a>                                 
                            </div>
                            <div class="col-sm-6 text-right">
                                <a id="search_classify_btn" class="btn btn-primary" >
                                    <span class="glyphicon glyphicon-search fa-1x" aria-hidden="true"> ค้นหา</span>
                                </a>
                                 <a id="edit_classify_btn" class="btn btn-success"  href="<?php echo base_url(); ?>index.php/assessment_risk/assessment_risk_controller/add_forword/">
                                    <span class="glyphicon glyphicon-plus fa-1x" aria-hidden="true"> เพิ่ม</span>
                                </a>
                                <?php if($chem_no != ""){?>
                                <a id="edit_classify_btn" class="btn btn-warning"  href="<?php echo base_url(); ?>index.php/assessment_risk/assessment_risk_controller/edit_forword/<?php echo $chem_no?>">
                                    <span class="glyphicon glyphicon-edit fa-1x" aria-hidden="true"> แก้ไข</span>
                                </a>
                                <?php }?>
                                <button type="reset" class="btn btn-danger">
                                    <span class="glyphicon glyphicon-refresh fa-1x" aria-hidden="true"> ยกเลิก</span>
                                </button>
                            </div>
                        </div>
                        <?php if ($message_flag == 'W') { ?>   
                            <div class="form-group text-lefft">
                                <div class="col-sm-12">
                                    <div id="alert-message" class="alert alert-warning alert-dismissible" role="alert"><?php echo $message ?></div>
                                </div>
                            </div>
                        <?php } ?> 
                        <?php if ($message_flag == 'I') { ?>   
                            <div class="form-group text-lefft">
                                <div class="col-sm-12">
                                    <div id="alert-message" class="alert alert-success alert-dismissible" role="alert"><?php echo $message ?></div>
                                </div>
                            </div>
                        <?php } ?> 
                        <?php if ($message_flag == 'E') { ?>   
                            <div class="form-group text-lefft">
                                <div class="col-sm-12">
                                    <div id="alert-message" class="alert alert-danger alert-dismissible" role="alert"><?php echo $message ?></div>
                                </div>
                            </div>
                        <?php } ?> 
                           <div class="form-group text-center">
                            <label  class="col-sm-3 control-label"> รหัสสารเคมี:</label>
                            <div class="col-sm-3">
                                <input class="form-control request" type="text" id="chem_no" name="chem_no"    placeholder="รหัสสารเคมี" value="<?php echo $chem_no ?>">
                            </div>                          
                        </div> 
                         <hr>
                         <div class="form-group">                            
                            <label  class="col-sm-3 text-right"> รหัสสารเคมี :</label>                            
                            <label class="col-sm-3 text-left " ><font color="red"><?php echo $chem_no ?></font></label>                            
                            <label  class="col-sm-3 text-right">CAS No. :</label>                            
                            <label class="col-sm-3 text-left " ><font color="red"><?php echo $chem_cas_number ?></font></label>                     
                        </div>
                        <div class="form-group">                            
                            <label  class="col-sm-3 text-right">ประเภทสารเคมี :</label>                            
                            <label class="col-sm-3 text-left " ><font color="red"><?php echo $chem_type ?></font></label>                            
                            <label  class="col-sm-3 text-right">ชื่อสารเคมี. :</label>                            
                            <label class="col-sm-3 text-left " ><font color="red"><?php echo $chem_name_th ?></font></label>                        
                        </div>   
                          <div class="form-group">                            
                            <label  class="col-sm-3 text-right">ผลการตรวจวัดครั้งล่าสุด :</label>                            
                            <label class="col-sm-3 text-left " ><font color="red"><?php echo $chem_measure_ole_twa_value_cur ?></font></label>                            
                            <label  class="col-sm-3 text-right">ค่ามาตรฐาน OEL-TWA :</label>                            
                            <label class="col-sm-3 text-left " ><font color="red"><?php echo $chem_std_ole_twa_value ?></font></label>                        
                        </div> 
                         <div class="form-group">                            
                            <label  class="col-sm-3 text-right">ระดับดวามเข้มข้น :</label>                            
                            <label class="col-sm-9 text-left " ><font color="red"><?php echo $chem_con_lvl_no."=".$chem_con_lvl_name ?></font></label>                         
                          
                        </div>
                           <div class="form-group">                            
                            <label  class="col-sm-3 text-right">ระดับความถี่ในการรับสัมผัส :</label>                            
                            <label class="col-sm-9 text-left " ><font color="red"><?php echo $chem_seq_lvl_no."=".$chem_seq_lvl_name ?></font></label>                         
                          
                        </div>
                        <div class="form-group">                            
                            <label  class="col-sm-3 text-right">ระดับการรับสัมผัส :</label>                            
                            <label class="col-sm-9 text-left " ><font color="red"><?php echo $chem_touch_lvl_no."=".$chem_touch_lvl_name ?></font></label>                         
                          
                        </div>
                         <div class="form-group">                            
                            <label  class="col-sm-3 text-right">ระดับความรุนแรง :</label>                            
                            <label class="col-sm-9 text-left " ><font color="red"><?php echo $chem_haz_eff_hea_no."=".$chem_haz_eff_hea_name ?></font></label>                         
                          
                        </div> 
                         
                          <div class="form-group">                            
                            <label  class="col-sm-3 text-right">ระดับความเสี่ยง :</label>                            
                            <label class="col-sm-9 text-left " ><font color="red"><?php echo $risk_lvl."=".$chem_risk_lvl_name ?></font></label>                         
                          
                        </div> 
                         
                          <div class="form-group">                            
                            <label  class="col-sm-3 text-right">มาตรการควบคุมความเสี่ยง :</label>                            
                            <label class="col-sm-9 text-left " ><font color="red"><?php echo $chem_risk_lvl_no."=".$chem_risk_lvl_desc ?></font></label>                         
                          
                        </div> 
                         
                      </div>
                    
                        <hr>
                <div class="form-group">
                    <label class="col-sm-3"><font color="#0040FF">ผู้สร้าง : &nbsp;&nbsp;<?php echo $create_userid; ?></font></label>
                    <label class="col-sm-3"><font color="#0040FF">วันที่สร้าง : &nbsp;&nbsp;<?php echo $create_date; ?></font></label>
                    <label class="col-sm-3"><font color="#0040FF">ผู้แก้ไข : &nbsp;<?php echo $update_userid; ?></font></label>
                    <label class="col-sm-3"><font color="#0040FF">วันที่แก้ไข : &nbsp;<?php echo $update_date; ?></font></label>
                </div>

                        </div>


                    </fieldset>
                </form>

            </div>
        </div>
    

<?php $this->load->view('modal.html'); ?>
<script type="text/javascript">
    $(document).ready(function() {

        $("#search_classify_btn").click(function() {

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
             } else if (myModalchem_seq == "") {
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
                $("#cmd").val('search');
                $("#search_classify_frm").submit();
            }
        });
         $("#save_classify_btn").click(function() {

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
             } else if (myModalchem_seq == "") {
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
                $("#cmd").val('save');
                $("#search_classify_frm").submit();
            }
        });

        $("#chem_no").autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/utility/utility_controller/getTb_chem_info",
                    type: 'POST',
                    cache: false,
                    dataType: "json",
                    data: {
                        chem_no_param: $("#chem_no").val()
                    },
                    success: function(data) {
                        response($.map(data, function(list) {
                            return {
                                label: list.chem_no + "-" + list.chem_name_th,
                                value: list.chem_no

                            };
                        }));
                    },
                    error: function(data) {
                        alert("Error");
                    }
                });
            },
            minLength: 1,
            select: function(event, ui) {
                $("#chem_no").val(ui.item.value);
                return false;
            }
        });
        
        $("#mi_desc").autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/utility/utility_controller/get_tb_chem_list_ministry_industry",
                    type: 'POST',
                    cache: false,
                    dataType: "json",
                    data: {
                        mi_desc_param: $("#mi_desc").val()
                    },
                    success: function(data) {
                        response($.map(data, function(list) {
                            return {
                                label: list.chem_desc,
                                value: list.chem_list_acc_no+","+list.chem_seq
                            };
                        }));
                    },
                    error: function(data) {
                        alert("Error");
                    }
                });
            },
            minLength: 1,
            select: function(event, ui) {
                $("#mi_desc").val(ui.item.label);
                var arrTemp = ui.item.value.split(",");
                $("#mi_acc_no").val(arrTemp[0]);
                $("#mi_seq").val(arrTemp[1]);                
                return false;
            }
        });
        
        $("#ml_desc").autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/utility/utility_controller/get_tb_chem_list_ministry_labor",
                    type: 'POST',
                    cache: false,
                    dataType: "json",
                    data: {
                        ml_desc_param: $("#ml_desc").val()
                    },
                    success: function(data) {
                        response($.map(data, function(list) {
                            return {
                                label: list.chem_desc,
                                value: list.chem_seq
                            };
                        }));
                    },
                    error: function(data) {
                        alert("Error");
                    }
                });
            },
            minLength: 1,
            select: function(event, ui) {
                $("#ml_desc").val(ui.item.label);
                $("#ml_seq").val(ui.item.value);                
                return false;
            }
        });

        $("#chem_no").keypress(function(e) {
            if (e.keyCode == 13) {
                //alert($("#chem_cas_number").val());
                //chem_desc
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/utility/utility_controller/get_chem_mil_lbl",
                    type: 'POST',
                    cache: false,
                    dataType: "json",
                    data: {
                        chem_no_param: $("#chem_no").val()
                    },
                    success: function(data) {
                        $("#mi_desc").val(data.chem_desc_mi);
                        $("#mi_acc_no").val(data.chem_mi_acc_no);
                        $("#mi_seq").val(data.chem_mi_seq);

                        $("#ml_desc").val(data.chem_desc_ml);
                        $("#ml_seq").val(data.chem_ml_seq);
                        
                        $("#chem_cas_number").val(data.chem_cas_number);
                        $("#chem_name_th").val(data.chem_name_th);
                        $("#chem_store_name").val(data.chem_store_name);

                    },
                    error: function(data) {
                        alert("Error");
                    }
                });
                //$("#chem_no").val(value);  
            }
        });
    });

</script>