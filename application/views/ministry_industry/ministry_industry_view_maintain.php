<?php
//variable in view
$chem_list_acc_no =0;
$chem_seq =0;
$chem_cas_number = "";
$chem_ind_name = "";
$chem_ind_type ="";
$chem_condition ="";
$chem_desc ="";
$create_date="";
$create_userid="";
$update_date="";
$update_userid="";
//-message
$message_flag="";
$message="";
$event_msg="";
$method=$model[0]['method'];
//--control view and asign data
   if ($model[0]['method'] == 'edit') {
        //print_r($model[0]['data']);
        $chem_list_acc_no =$model[0]['data']['data'][0]['chem_list_acc_no'];
        $chem_seq =$model[0]['data']['data'][0]['chem_seq'];
        $chem_cas_number =$model[0]['data']['data'][0]['chem_cas_number'];  
        $chem_ind_name =$model[0]['data']['data'][0]['chem_ind_name'];  
        $chem_ind_type =$model[0]['data']['data'][0]['chem_ind_type']; 
        $chem_condition =$model[0]['data']['data'][0]['chem_condition']; 
        $chem_desc =$model[0]['data']['data'][0]['chem_desc']; 
        $create_date=$model[0]['data']['data'][0]['create_date'];
        $create_userid=$model[0]['data']['data'][0]['create_userid'];
        $update_date=$model[0]['data']['data'][0]['update_date'];
        $update_userid=$model[0]['data']['data'][0]['update_userid'];
        
        $message_flag = $model[0]['message_flag'];
        $message = $model[0]['message'];
        $event_msg="(แก้ไข)";
    } 
    else if ($model[0]['method'] == 'added') {
        //print_r($model[0]['data']);
        $chem_list_acc_no =$model[0]['data']['data'][0]['chem_list_acc_no'];
        $chem_seq =$model[0]['data']['data'][0]['chem_seq'];
        $chem_cas_number =$model[0]['data']['data'][0]['chem_cas_number'];  
        $chem_ind_name =$model[0]['data']['data'][0]['chem_ind_name'];  
        $chem_ind_type =$model[0]['data']['data'][0]['chem_ind_type']; 
        $chem_condition =$model[0]['data']['data'][0]['chem_condition']; 
        $chem_desc =$model[0]['data']['data'][0]['chem_desc']; 
        $create_date=$model[0]['data']['data'][0]['create_date'];
        $create_userid=$model[0]['data']['data'][0]['create_userid'];
        $update_date=$model[0]['data']['data'][0]['update_date'];
        $update_userid=$model[0]['data']['data'][0]['update_userid'];
        
        $message_flag = $model[0]['message_flag'];
        $method="add";
        $message = $model[0]['message'];
        $event_msg="(แก้ไข)";
    } 
    else if ($model[0]['method'] == 'add') 
    {
        $message_flag = $model[0]['message_flag'];
        $message = $model[0]['message'];
        $event_msg="(เพิ่ม)";
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
                <h4 class="font-title"><b>สารเคมีอันตรายตามกฎหมายอุตหกรรม<?php echo $event_msg;?></b></h4>
            </div>
            <hr width="100%">            
            <div class="panel-body form-horizontal payment-form">
                <form id="mi_frm" method="post" action="<?php echo base_url(); ?>index.php/ministry_industry/ministry_industry_controller/ministry_industry_event">                
                    <input type ="hidden" id="cmd" name="cmd" <?php echo "value='" . $method . "'"; ?>/>
                    <input type ="hidden" id="chem_list_acc_no_hid" name="chem_list_acc_no_hid" value='<?php echo $chem_list_acc_no ?>'/> 
                    <input type ="hidden" id="chem_seq_hid" name="chem_seq_hid" value='<?php echo $chem_seq ?>'/>  
                    <fieldset>  
                         
                        <div class="form-group ">
                            <div class="col-sm-6 text-lefft">                                
                                <a id="back_btn" class="btn btn-primary" href="<?php echo base_url(); ?>index.php/ministry_industry/ministry_industry_controller/ministry_industry">
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
                            <label  class="col-sm-3 control-label">บัญชีที่ :</label>
                            <div class="col-sm-3">
                                <input class="form-control request" type="number" id="chem_list_acc_no" name="chem_list_acc_no"  placeholder="บัญชีที่"  <?php if($model[0]['method'] == 'edit') echo "disabled='true'"; ?>  value="<?php echo $chem_list_acc_no ?>"/>
                            </div> 
                            <label  class="col-sm-3 control-label">ลำดับในบัญชี :</label>
                            <div class="col-sm-3">
                                <input class="form-control request" type="number" id="chem_seq" name="chem_seq"  placeholder="ลำดับใบบัญชี"  <?php if($model[0]['method'] == 'edit') echo "disabled='true'"; ?>  value="<?php echo $chem_seq ?>"/>
                            </div>                            
                        </div>
                        
                        <div class="form-group text-center">
                            <label  class="col-sm-3 control-label">ชื่อ :</label>
                            <div class="col-sm-9">
                                <textarea class="form-control " type="text" id="chem_ind_name" name="chem_ind_name"    placeholder="ชื่อ" ><?php echo $chem_ind_name ?></textarea>
                            </div>                            
                        </div> 
                        
                         <div class="form-group text-center">
                            <label  class="col-sm-3 control-label">ชนิด :</label>
                             <div class="col-sm-3">
                                <select class="form-control" id="chem_ind_type" name="chem_ind_type">
                                    <option value="1" <?php if ($chem_ind_type == "1") echo "selected='true'" ?> >ชนิดที่-1</option>
                                    <option value="2" <?php if ($chem_ind_type == "2") echo "selected='true'" ?> >ชนิดที่-2</option>
                                    <option value="3" <?php if ($chem_ind_type == "3") echo "selected='true'" ?> >ชนิดที่-3</option>
                                    <option value="4" <?php if ($chem_ind_type == "4") echo "selected='true'" ?> >ชนิดที่-4</option>
                                    
                                </select>
                            </div>                          
                        </div> 
                        <div class="form-group text-center">
                            <label  class="col-sm-3 control-label">CAS number :</label>
                            <div class="col-sm-9">
                                <input class="form-control " type="text" id="chem_cas_number" name="chem_cas_number"    placeholder="CAS number" value="<?php echo $chem_cas_number ?>"/>
                            </div>                            
                        </div> 
                          <div class="form-group text-center">
                            <label  class="col-sm-3 control-label">เงื่อนไข :</label>
                            <div class="col-sm-9">
                                <textarea class="form-control " type="text" id="chem_condition" name="chem_condition"    placeholder="ชื่อ" ><?php echo $chem_condition ?></textarea>
                            </div>                            
                        </div> 
                         <div class="form-group text-center">
                            <label  class="col-sm-3 control-label">คำอฺธิบายสำหรับแสดงและค้นหา :</label>
                            <div class="col-sm-9">
                                <textarea class="form-control " type="text" id="chem_desc" name="chem_desc"    placeholder="คำอฺธิบายสำหรับแสดงและค้นหา" ><?php echo $chem_desc ?></textarea>
                            </div>                            
                        </div> 
                       
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



<?php// $this->load->view('modal.html'); ?>
<script type="text/javascript">
    $(document).ready(function() {

        $("#save_btn").click(function() {

            var chem_seq = $('#chem_seq').val().trim();
            var chem_list_acc_no = $('#chem_list_acc_no').val().trim();
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
            if (chem_list_acc_no == "") {
                $('#message').html('กรุณาระบุ บัญชี');
                $('#myModal').modal('show');
            }
            if (chem_seq == "") {
                $('#message').html('กรุณาระบุ ลำดับ');
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
                $("#mi_frm").submit();
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
       

       
    });

</script>