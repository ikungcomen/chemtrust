<?php
$chem_no = "";
$chem_cas_number = "";
$chem_name_th = "";
$chem_type = "";
$mi_desc = "";
$ml_desc = "";
$mi_acc_no = 0.0;
$mi_seq = 0;
$ml_seq = 0;
$chem_ghs_label = "";
$chem_ghs_desc = "";
$chem_ghs_haz_level = "";
$message_flag = "";
$message = "";
$chem_ghs_label_lst = "";
$create_userid="";
$create_date ="";
$update_date="";
$update_userid="";
$ghs_haz_desc= array("-","สารไวไฟ","สารออกซิไดส์","วัตถุระเบิด",
                     "สารกัดกร่อน","ก๊าซบรรจุภายใต้ความดัน","พิษเฉียบพัน",
                     "ระวัง","พิษต่อสิ่งแวดล้อม","พิษต่อสุขภาพ"
                     );
$ghs_haz_check= array("-","-","-","-",
                     "-","-","-",
                     "-","-","-"
                     );
                                      /*
                                      1.  สารไวไฟ
                                      2.  สารออกซิไดส์
                                      3.  วัตถุระเบิด
                                      4.  สารกัดกร่อน
                                      5.  ก๊าซบรรจุภายใต้ความดัน
                                      6.  พิษเฉียบพัน
                                      7.  ระวัง
                                      8.  พิษต่อสิ่งแวดล้อม
                                      9.  พิษต่อสุขภาพ

                                     */
                                     
if ($model[0]['method'] != 'main') {
    if ($model[0]['method'] == 'haveRow') {
        //print_r($model[0]['data']);
        $chem_no = $model[0]['data']['chem_classify'][0]['chem_no'];
        $chem_cas_number = $model[0]['data']['chem_classify'][0]['chem_cas_number'];
        $chem_name_th = $model[0]['data']['chem_classify'][0]['chem_name_th'];
        $chem_type = $model[0]['data']['chem_classify'][0]['chem_type'];
        $mi_desc = $model[0]['data']['chem_classify'][0]['mi_desc'];
        $ml_desc = $model[0]['data']['chem_classify'][0]['ml_desc'];
        $mi_acc_no = $model[0]['data']['chem_classify'][0]['chem_list_acc_no_mil'];
        $mi_seq = $model[0]['data']['chem_classify'][0]['chem_seq_mil'];
        $ml_seq = $model[0]['data']['chem_classify'][0]['chem_seq_lbl'];
        $chem_ghs_label = $model[0]['data']['chem_classify'][0]['chem_ghs_label']; //chem_ghs_label 
        $create_userid=$model[0]['data']['chem_classify'][0]['create_userid'];;
        $create_date =$model[0]['data']['chem_classify'][0]['create_date'];;
        $update_date=$model[0]['data']['chem_classify'][0]['update_date'];;
        $update_userid=$model[0]['data']['chem_classify'][0]['update_userid'];;
        
        if((!is_null($chem_ghs_label)) && ($chem_ghs_label != ""))
        {
           $chem_ghs_label_lst = explode(',', $chem_ghs_label); 
        }
        else
        {
           $chem_ghs_label_lst = "";
        }
        $chem_ghs_desc = $model[0]['data']['chem_classify'][0]['chem_ghs_des']; //chem_ghs_label
        $chem_ghs_haz_level = $model[0]['data']['chem_classify'][0]['chem_ghs_haz_level']; //chem_ghs_label
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
                <span class="glyphicon glyphicon-edit fa-3x icon" aria-hidden="true"></span>
            </div>
            <div class="col-sm-11">
                <h4 class="font-title"><b>การจำแนกประเภทสารเคมี(ค้นหา)</b></h4>
            </div>
            <hr width="100%">            
            <div class="panel-body form-horizontal payment-form">
                <form id="search_classify_frm" method="post" action="<?php echo base_url(); ?>index.php/classify_cemee/classifyCemee_controller/classify">                
                    <input type ="hidden" id="cmd" name="cmd">
                    <fieldset>  

                        <div class="form-group text-right">
                            <div class="col-sm-12">
                                <a id="search_classify_btn" class="btn btn-primary" >
                                    <span class="glyphicon glyphicon-search fa-1x" aria-hidden="true"> ค้นหา</span>
                                </a>
                                 <a id="edit_classify_btn" class="btn btn-success"  href="<?php echo base_url(); ?>index.php/classify_cemee/classifyCemee_controller/add_forword/">
                                    <span class="glyphicon glyphicon-plus fa-1x" aria-hidden="true"> เพิ่ม</span>
                                </a>
                                <?php if($chem_no != ""){?>
                                <a id="edit_classify_btn" class="btn btn-warning"  href="<?php echo base_url(); ?>index.php/classify_cemee/classifyCemee_controller/edit_forword/<?php echo $chem_no?>">
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
                            <label  class="col-sm-3 text-right">กฏหมายแรงงาน :</label>                            
                            <label class="col-sm-3 text-left " ><font color="red"><?php echo $ml_desc ?></font></label>                           
                        </div>
                       <div class="form-group">
                            <label  class="col-sm-3 text-right">กฏหมายอุตสาหกรรม :</label>                            
                            <label class="col-sm-3 text-left " ><font color="red"><?php echo $mi_desc ?></font></label>                           
                       </div>
                        <div class="form-group">
                            <label  class="col-sm-3 text-right">ระดับความเป็นอันตราย :</label>
                             <label class="col-sm-3 text-left " ><font color="red"><?php echo $chem_ghs_haz_level ?></font></label> 
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-3 text-right">ข้อความเป็นอันตราย :</label>
                            <label class="col-sm-3 text-left " ><font color="red"><?php echo $chem_ghs_desc ?></font></label> 
                        </div>
                        <div class="form-group text-left">
                            <div class="col-lg-12" >
                                <label  class="col-sm-3 control-label">ฉลากตามระบบGHS:</label>
                                <?php
                                //echo $chem_ghs_label;
                                //print_r($chem_ghs_label_lst);
                                if ($chem_ghs_label_lst != "") {
                                    $arr_size = count($chem_ghs_label_lst);
                                } else {
                                    $arr_size = 0;
                                }
                                if ($arr_size > 0) {                               
                                    
                                
                                    foreach ($chem_ghs_label_lst as $value) {                                  
                                        ?>
                                        <div class="col-lg-2" >
                                            <img id="imgmenu-hover" class="border-img-noradius" src="<?php echo base_url(); ?>/picture/pic_ghs/haz_<?php echo $value ?>.png" />                                        
                                            <br>                  
                                            <?php
                                             echo $ghs_haz_desc[$value];
                                             $ghs_haz_check[$value]=$value;
                                            ?>
                                        </div>
                                      <?php
                                      }
                                      }
                                      ?>
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