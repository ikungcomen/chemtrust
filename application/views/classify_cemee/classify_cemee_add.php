<?php
$chem_no = " ";
$chem_cas_number = " ";
$chem_name_th = " ";
$chem_type = "";
$mi_desc = "";
$ml_desc = "";
$mi_acc_no = 0.0;
$mi_seq = 0;
$ml_seq = 0;
$chem_ghs_label = " ";
$chem_ghs_desc = " ";
$chem_ghs_haz_level = " ";
$message_flag = "";
$message = "";
$chem_ghs_label_lst = "";
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
                <h4 class="font-title"><b>การจำแนกประเภทสารเคมี(เพิ่ม)</b></h4>
            </div>
            <hr width="100%">            
            <div class="panel-body form-horizontal payment-form">
                <form id="search_classify_frm" method="post" action="<?php echo base_url(); ?>index.php/classify_cemee/classifyCemee_controller/add_classify">                
                    <input type ="hidden" id="cmd" name="cmd">
                    <fieldset>  

                        <div class="form-group">
                             <div class="col-sm-6 text-left">
                                <a id="back_classify_btn" class="btn btn-success" href="<?php echo base_url(); ?>index.php/classify_cemee/classifyCemee_controller/classify_cemee/">
                                    <span class="glyphicon glyphicon-backward fa-1x" aria-hidden="true"> ย้อนกลับ</span>
                                </a>                               
                            </div>
                            <div class="col-sm-6 text-right">                               
                                <a id="save_classify_btn" class="btn btn-primary">
                                    <span class="glyphicon glyphicon-save fa-1x" aria-hidden="true"> บันทึกข้อมูล</span>
                                </a>
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
                        <div class="form-group">                            
                            <label  class="col-sm-3 control-label"> รหัสสารเคมี :</label>
                            <div class="col-sm-3 text-left">
                              <input class="form-control request" type="text" id="chem_no" name="chem_no"  value="<?php echo $chem_no ?>"/>
                            </div> 
                             <label  class="col-sm-6 text-left "> (Enter จะหาค้นหากฏหมายตาม CAS No.)</label>
                        </div>
                       <hr>  
                        
                        <div class="form-group">
                            <label  class="col-sm-3 control-label">กฏหมายแรงงาน :</label>
                            <div class="col-sm-7">
                                <input class="form-control " type="text"  id="ml_desc" name="ml_desc" placeholder="สารเคมีอันตรายที่ต้องรายงาน สอ.1" value="<?php echo $ml_desc ?>">
                                <input type ="hidden" id="ml_seq" name="ml_seq"  value="<?php echo $ml_seq ?>">
                            </div>                         

                        </div>
                        <div class="form-group">
                            <label  class="col-sm-3 control-label">กฏหมายอุตสาหกรรม :</label>
                            <div class="col-sm-7">
                                <input class="form-control " type="text"  id="mi_desc" name="mi_desc" placeholder="วัตถุอันตรายชนิดที่ 2" value="<?php echo $mi_desc ?>">
                                <input type ="hidden" id="mi_acc_no" name="mi_acc_no" value="<?php echo $mi_acc_no ?>">
                                <input type ="hidden" id="mi_seq" name="mi_seq" value="<?php echo $mi_seq ?>">
                            </div>                            
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-3 control-label">คำสัญญาณ :</label>
                            <div class="col-sm-3">
                                <select class="form-control" id="chem_ghs_haz_level" name="chem_ghs_haz_level">
                                    <option value="อันตราย" <?php if ($chem_ghs_haz_level == "อันตราย") echo "selected='true'" ?> >อันตราย</option>
                                    <option value="ระวัง" <?php if ($chem_ghs_haz_level == "ระวัง") echo "selected='true'" ?>>ระวัง</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-3 control-label">ข้อความแสดงความเป็นอันตราย :</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" type="text" id="chem_ghs_desc" name="chem_ghs_desc"><?php echo $chem_ghs_desc ?></textarea>
                            </div>
                        </div>                       
                        
                         
                       
                           <?php
                       
                                if ($chem_ghs_label_lst != "") {
                                    $arr_size = count($chem_ghs_label_lst);
                                } else {
                                    $arr_size = 0;
                                }
                                if ($arr_size > 0) { 
                                    foreach ($chem_ghs_label_lst as $value) { 
                                           
                                             $ghs_haz_check[$value]=$value;
                                       
                                      }
                                      }
                            ?>
                        
                     

                        <div class="form-group text-right"   >
                            <label  class="col-sm-3 control-label">เลือกฉลากตามระบบGHS :</label>
                            <div class="col-lg-3 text-center" >
                         
                                <input type="checkbox" id="haz_1" name="haz_1" class="login" value="1" <?php echo ($ghs_haz_check[1]=="1"? "checked='true'": "");?>></input> 
                                <img id="imgmenu-hover" class="border-img-noradius" src="<?php echo base_url(); ?>/picture/pic_ghs/haz_1.png" />
                                <br/>
                                <?php
                                             echo $ghs_haz_desc[1];
                                ?>
                            </div>
                           <div class="col-lg-3 text-center" >
                                <input type="checkbox" id="haz_2" name="haz_2" class="login" value="2" <?php echo ($ghs_haz_check[2]=="2"? "checked='true'": "");?>>
                                <img id="imgmenu-hover" class="border-img-noradius" src="<?php echo base_url(); ?>/picture/pic_ghs/haz_2.png" />
                                <br/>
                                <?php
                                             echo $ghs_haz_desc[2];
                                ?>  
                            </div>
                            <div class="col-lg-3 text-center" >
                                <input type="checkbox" id="haz_3" name="haz_3" class="login" value="3" <?php echo ($ghs_haz_check[3]=="3"? "checked='true'": "");?>>
                                <img id="imgmenu-hover" class="border-img-noradius" src="<?php echo base_url(); ?>/picture/pic_ghs/haz_3.png" />
                                <br/>
                                 <?php
                                             echo $ghs_haz_desc[3];
                                ?>  
                            </div>
                        </div>
                        
                            <div class="form-group text-right"   >
                            <label  class="col-sm-3 control-label"></label>
                            <div class="col-lg-3 text-center" >
                                <input type="checkbox" id="haz_4" name="haz_4" class="login" value="4" <?php echo ($ghs_haz_check[4]=="4"? "checked='true'": "");?>></input> 
                                <img id="imgmenu-hover" class="border-img-noradius" src="<?php echo base_url(); ?>/picture/pic_ghs/haz_4.png" />
                                <br/>
                                <?php
                                             echo $ghs_haz_desc[4];
                                ?>
                            </div>
                             <div class="col-lg-3 text-center" >
                                <input type="checkbox" id="haz_5" name="haz_5" class="login" value="5" <?php echo ($ghs_haz_check[5]=="5"? "checked='true'": "");?>>
                                <img id="imgmenu-hover" class="border-img-noradius" src="<?php echo base_url(); ?>/picture/pic_ghs/haz_5.png" />
                                <br/>
                                <?php
                                             echo $ghs_haz_desc[5];
                                ?>  
                            </div>
                           <div class="col-lg-3 text-center" >
                                <input type="checkbox" id="haz_6" name="haz_6" class="login" value="6" <?php echo ($ghs_haz_check[6]=="6"? "checked='true'": "");?>>
                                <img id="imgmenu-hover" class="border-img-noradius" src="<?php echo base_url(); ?>/picture/pic_ghs/haz_6.png" />
                                <br/>
                                 <?php
                                             echo $ghs_haz_desc[6];
                                ?>  
                            </div>
                        </div>
                        
                            <div class="form-group text-right"   >
                            <label  class="col-sm-3 control-label"></label>
                           <div class="col-lg-3 text-center" >
                                <input type="checkbox" id="haz_7" name="haz_7" class="login" value="7" <?php echo ($ghs_haz_check[7]=="7"? "checked='true'": "");?>></input> 
                                <img id="imgmenu-hover" class="border-img-noradius" src="<?php echo base_url(); ?>/picture/pic_ghs/haz_7.png" />
                                <br/>
                                <?php
                                             echo $ghs_haz_desc[7];
                                ?>
                            </div>
                            <div class="col-lg-3 text-center" > 
                                <input type="checkbox" id="haz_8" name="haz_8" class="login" value="8" <?php echo ($ghs_haz_check[8]=="8"? "checked='true'": "");?>>
                                <img id="imgmenu-hover" class="border-img-noradius" src="<?php echo base_url(); ?>/picture/pic_ghs/haz_8.png" />
                                <br/>
                                <?php
                                             echo $ghs_haz_desc[8];
                                ?>  
                            </div>
                            <div class="col-lg-3 text-center" >
                                <input type="checkbox" id="haz_9" name="haz_9" class="login" value="9" <?php echo ($ghs_haz_check[9]=="9"? "checked='true'": "");?>>
                                <img id="imgmenu-hover" class="border-img-noradius" src="<?php echo base_url(); ?>/picture/pic_ghs/haz_9.png" />
                                <br/>
                                 <?php
                                           echo $ghs_haz_desc[9];
                                ?>  
                            </div>
                        </div>


                        </div>


                    </fieldset>
                </form>

            </div>
        </div>

    </div>


<?php //$this->load->view('modal.html'); ?>
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