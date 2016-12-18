<?php
//variable in view
//print_r($model[0]['data']);
//$chem_seq = 0;
//$chem_cas_number = "";
//$chem_name_th = "";
//$chem_name_en = "";
//$chem_desc = "";

//-message
$message_flag = "";
$message = "";

//--control view and asign data
if ($model[0]['method'] != 'main') {
    if ($model[0]['method'] == 'haveRow') {
       // print_r($model[0]['data']);
        $data=$model[0]['data'];
        /*$chem_seq = $model[0]['data']['data'][0]['chem_seq'];
        $chem_cas_number = $model[0]['data']['data'][0]['chem_cas_number'];
        $chem_name_th = $model[0]['data']['data'][0]['chem_name_th'];
        $chem_name_en = $model[0]['data']['data'][0]['chem_name_en'];
        $chem_desc = $model[0]['data']['data'][0]['chem_desc'];*/
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
                <h4 class="font-title"><b>สารเคมีอันตรายตามกฎหมายอุตหกรรม(ค้นหา)</b></h4>
            </div>
            <hr width="100%">            
            <div class="panel-body form-horizontal payment-form">
                <form id="mi_frm" method="post" action="<?php echo base_url(); ?>index.php/ministry_industry/ministry_industry_controller/search_list">                
                    <input type ="hidden" id="cmd" name="cmd">
                 
                    <fieldset>  

                        <div class="form-group">                           
                              <div class="col-sm-6 text-left">                                
                                <a id="back_btn" class="btn btn-success" href="<?php echo base_url(); ?>index.php/main_law/main_law_controller/main_law">
                                    <span class="glyphicon glyphicon-backward fa-1x" aria-hidden="true" >ย้อนกลับ</span>
                                </a>                              
                            </div>
                             <div class="col-sm-6 text-right">  
                                <a id="search_btn" class="btn btn-primary">
                                    <span class="glyphicon glyphicon-search fa-1x" aria-hidden="true"> ค้นหา</span>
                                </a>    
                                <a id="add_btn" class="btn btn-success" href="<?php echo base_url(); ?>index.php/ministry_industry/ministry_industry_controller/ministry_industry_go_add">
                                    <span class="glyphicon glyphicon-plus fa-1x" aria-hidden="true" > เพิ่ม</span>
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
                            <label  class="col-sm-1 control-label">บัญชีที่ :</label>
                            <div class="col-sm-2">
                                <input class="form-control " type="text" id="chem_list_acc_no" name="chem_list_acc_no"    placeholder="ลำดับใบบัญชี" >
                            </div>
                            <label  class="col-sm-1 control-label">ลำดับที่ :</label>
                            <div class="col-sm-2">
                                <input class="form-control " type="text" id="chem_seq" name="chem_seq"    placeholder="ลำดับใบบัญชี" >
                            </div>
                            <label  class="col-sm-2 control-label">คำอธิบาย :</label>
                            <div class="col-sm-4">
                                <input class="form-control" type="text" id="chem_desc" name="chem_desc"    placeholder="คำอธิบาย" >
                            </div>
                        </div>  
                          <div class="form-group text-center" >
                            <div class="col-sm-12 text-right">
                                <ul class="pagination pagination-sm">
                                  <?php   if ($model[0]['method'] == 'haveRow'){ 
                                      foreach($model[0]['paging'] as $value) {   
                                             echo $value;     
                                          }
                                       }
                                  
                                     ?>
                                </ul>
                            </div>
                        </div>
                        
                     <div class="form-group text-center"> 
                         <div class="col-sm-12"> 
                            <table class="myTable_style" style="table-layout: fixed;">
                                <thead>                               
                                    <tr>
                                        <th style="width: 10%;text-align: center"><small>บัญชีที่</small></th>
                                        <th style="width: 10%;text-align: center"><small>ลำดับที่</small></th>
                                        <th style="width: 10%;text-align: center"><small>ชื่อวัตถุอันตราย</small></th>
                                        <th style="width: 10%;text-align: center"><small>CAS number</small></th>
                                        <th style="width: 10%;text-align: center"><small>ชนิดของวัตถุอันตราย</small></th>
                                        <th style="width: 10%;text-align: center"><small>เงื่อนไข</small></th>
                                        <th style="width: 15%;text-align: center"><small>แก้ไข/ลบ</small></th>
                                    </tr>                                   
                                </thead>
                                <tbody>
                                 <?php
                                   if ($model[0]['method'] != 'main') {
                                        if ($model[0]['method'] == 'haveRow') {
                                             $data=$model[0]['data']['data'];                                             
                                             foreach ($data as $value) {                                              
                                                  echo "<tr>";
                                                  echo "<td style='word-wrap:break-word;'>" . $value['chem_list_acc_no'] ."</td>";
                                                  echo "<td style='word-wrap:break-word;'><small>" . $value['chem_seq'] ."</small></td>";
                                                  echo "<td style='word-wrap:break-word;'><small>" . $value['chem_ind_name'] ."</small></td>";
                                                   echo "<td style='word-wrap:break-word;'><small>" . $value['chem_cas_number'] ."</small></td>";
                                                  echo "<td style='word-wrap:break-word;'><small>" . $value['chem_ind_type'] ."</small></td>";
                                                  echo "<td  style='word-wrap:break-word;'><small>" . $value['chem_condition'] ."</small></td>";
                                  ?>
                                                  <td>
                                                   <a id="edit_btn" class="btn btn-warning" href="<?php echo base_url(); ?>index.php/ministry_industry/ministry_industry_controller/ministry_industry_go_edit?chem_list_acc_no=<?php echo $value['chem_list_acc_no'] ;?>&chem_seq=<?php echo $value['chem_seq'] ;?>">
                                                      <span class="glyphicon glyphicon-edit  fa-1x" aria-hidden="true"></span>
                                                  </a>
                                                   <a id="edit_btn" class="btn btn-danger" href="<?php echo base_url(); ?>index.php/ministry_industry/ministry_industry_controller/delete?chem_list_acc_no=<?php echo $value['chem_list_acc_no'] ;?>&chem_seq=<?php echo $value['chem_seq'] ;?>">
                                                      <span class="glyphicon glyphicon-remove  fa-1x" aria-hidden="true"></span>
                                                  </a>
                                                 </td>
                                    <?php
                                                 
                                                  echo "</tr>";
                                             }
                                        }
                                   }
                                        
                                 ?>                                 
                                  
                                    
                                </tbody>
                            </table>                     
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

        $("#search_btn").click(function() {          
             $("#cmd").val('search');
             $("#mi_frm").submit();            
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