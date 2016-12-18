<?php
//variable in view
$chem_no=$model[0]['chem_no'];
$mi_url_no=null;
$mi_url_name="";
$mi_url="";
$chem_ind_type_1="";
$chem_ind_type_2="";
$chem_ind_type_3="";
$chem_ind_type_4="";
$chem_ind_type_0="";

$create_date="";
$create_userid="";
$update_date="";
$update_userid="";
//-message
$message_flag="";
$message="";
$method=$model[0]['method'];
//--control view and asign data
   if ($model[0]['method'] == 'edit') {       
             $mi_url_no=$model[0]['data']['data'][0]['mi_url_no'];
             $mi_url_name=$model[0]['data']['data'][0]['mi_url_name'];
             $mi_url=$model[0]['data']['data'][0]['mi_url'];
             $chem_ind_type_1=$model[0]['data']['data'][0]['chem_ind_type_1'];
             $chem_ind_type_2=$model[0]['data']['data'][0]['chem_ind_type_2'];
             $chem_ind_type_3=$model[0]['data']['data'][0]['chem_ind_type_3'];
             $chem_ind_type_4=$model[0]['data']['data'][0]['chem_ind_type_4'];
             $chem_ind_type_0=$model[0]['data']['data'][0]['chem_ind_type_0'];
             $create_date=$model[0]['data']['data'][0]['create_date'];
             $create_userid=$model[0]['data']['data'][0]['create_userid'];
             $update_date=$model[0]['data']['data'][0]['update_date'];
             $update_userid=$model[0]['data']['data'][0]['update_userid'];        
             $message_flag = $model[0]['message_flag'];
             $message = $model[0]['message'];         
    }   
    else {        
        $message_flag = $model[0]['message_flag'];
        $message = $model[0]['message'];
    }

?>

<div class="col-md-9">
    <div class=mo"row">
        <div class="col-sm-12">
            <div class="col-sm-1">
                <span class="glyphicon glyphicon-edit fa-3x icon" aria-hidden="true"></span>
            </div>
            <div class="col-sm-11">
                <h4 class="font-title"><b>จัดการข้อมูลรายงาน วอ.กอ.(แก้ไข)</b></h4>
            </div>
            <hr width="100%">            
            <div class="panel-body form-horizontal payment-form">
                <form id="main_frm" method="post" action="<?php echo base_url(); ?>index.php/law_abiding/law_abiding_controller/update_mi_url">                
                    <input type ="hidden" id="cmd" name="cmd" <?php echo "value='" . $method . "'"; ?>/>
                    <input type ="hidden" id="chem_no" name="chem_no" value='<?php echo $chem_no ?>'/>                    
                    <fieldset>  
                         
                        <div class="form-group ">
                            <div class="col-sm-6 text-lefft">                                
                                <a id="back_btn" class="btn btn-primary" href="<?php echo base_url(); ?>index.php/law_abiding/law_abiding_controller/search/<?php echo $chem_no?>">
                                    <span class="glyphicon glyphicon-backward fa-1x" aria-hidden="true" >กลับ</span>
                                </a>                              
                            </div>
                            <div class="col-sm-6 text-right">                                
                                <a id="save_btn" class="btn btn-primary">
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
                        
                        <div class="form-group text-center">
                            <label  class="col-sm-3 control-label">รายงาน :</label>
                            <div class="col-sm-3">
                                <select class="form-control request " id="mi_url_no" name="mi_url_no" >
                                    <option value="4" <?php echo ($mi_url_no=="4")?"selected='true'":""; ?>>บฉ.4</option>
                                    <option value="6" <?php echo ($mi_url_no=="6")?"selected='true'":""; ?>>วอ.อก.6</option>
                                    <option value="7" <?php echo ($mi_url_no=="7")?"selected='true'":""; ?>>วอ.อก.7</option>
                                    <option value="20" <?php echo ($mi_url_no=="20")?"selected='true'":""; ?>>วอ.อก.20</option>
                                     
                               </select>
                            </div>                            
                        </div> 
                         <div class="form-group text-center">
                            <label  class="col-sm-3 control-label">ชื่อ :</label>
                            <div class="col-sm-9">
                                <input class="form-control " type="text" id="mi_url_name" name="mi_url_name"    placeholder="url." value="<?php echo $mi_url_name ?>"/>
                            </div>                            
                        </div> 
                        <div class="form-group text-center">
                            <label  class="col-sm-3 control-label">URL :</label>
                            <div class="col-sm-9">
                                <input class="form-control " type="text" id="mi_url" name="mi_url"    placeholder="url." value="<?php echo $mi_url ?>"/>
                            </div>                            
                        </div> 
                        <div class="form-group text-center">
                            <label  class="col-sm-3 control-label">ใช้กับประเภทสารเคมี :</label>
                            <div class="col-sm-3 text-left">
                               <input class="login" type="checkbox" id="chem_ind_type_1" name="chem_ind_type_1" value="Y" <?php echo ($chem_ind_type_1=="Y"? "checked='true'": "");?>/>
                               <label  class="control-label">วัตถุอันตรายชนิดที่ 1.</label>
                               <br>
                               <input class="login" type="checkbox" id="chem_ind_type_2" name="chem_ind_type_2" value="Y" <?php echo ($chem_ind_type_2=="Y"? "checked='true'": "");?>/>
                               <label  class="control-label">วัตถุอันตรายชนิดที่ 2.</label>
                               <br>
                               <input class="login" type="checkbox" id="chem_ind_type_3" name="chem_ind_type_3" value="Y" <?php echo ($chem_ind_type_3=="Y"? "checked='true'": "");?>/>
                               <label  class="control-label">วัตถุอันตรายชนิดที่ 3.</label>
                               <br>
                               <input class="login" type="checkbox" id="chem_ind_type_4" name="chem_ind_type_4" value="Y" <?php echo ($chem_ind_type_4=="Y"? "checked='true'": "");?>/>
                               <label  class="control-label">วัตถุอันตรายชนิดที่ 4.</label>
                               <br>
                               <input class="login" type="checkbox" id="chem_ind_type_0" name="chem_ind_type_0" value="Y" <?php echo ($chem_ind_type_0=="Y"? "checked='true'": "");?>/>
                               <label  class="control-label">ไม่เป็นวัตถุอันตราย.</label>
                               
                            </div>                    
                        </div> 
                        
                        <hr>
                        
                        <div class="form-group text-info">
                            <label  class="col-sm-3 control-label"><small>ผู้สร้าง :<?php echo $create_userid ?></small></label>
                            <label  class="col-sm-3 control-label"><small>วันที่สร้าง:<?php echo $create_date ?></small></label>
                            <label  class="col-sm-3 control-label"><small>ผู้แก้ไข:<?php echo $update_userid ?></small></label>
                            <label  class="col-sm-3 control-label"><small>วันที่แก้ไข:<?php echo $update_date?></small></label>
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

        $("#save_btn").click(function() {

       
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
            /*else if (chem_cas_number == "") {
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
             }*/ 
        
             
             $('#cmd').val("edit");
             $("#main_frm").submit();
            
        });
        $("#mi_url_no").change(function() {

       
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
            /*else if (chem_cas_number == "") {
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
             }*/ 
             $('#cmd').val("search");
             $("#main_frm").submit();
            
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
       

       
    });

</script>