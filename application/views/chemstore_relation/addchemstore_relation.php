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
                    <a class="btn btn-success"  href="<?php echo base_url(); ?>index.php/main_cemee/main_controller"  ><span class="glyphicon glyphicon-backward" aria-hidden="true"> ย้อนกลับ</span></a>
                </div>
                
            </div>
            <br>
            <hr>
            
            <div class="panel-body form-horizontal payment-form">
                <?php if ($this->session->userdata('message_save') == 'true') { ?>
                    <div id="alert-message" class="alert alert-success alert-dismissible" role="alert">บันทึกข้อมูลเรียบร้อย</div>
                <?php }else if ($this->session->userdata('message_save') == 'false'){?>
                    <div id="alert-message" class="alert alert-success alert-dismissible" role="alert">ลบข้อมูลเรียบร้อย</div>
                    <?php }?>
                <form id="save_store_relation" method="post" action="<?php echo base_url(); ?>index.php/chremstorerelation_controller/chremstore_relation/add_chem_store_relation">
                    <fieldset>  
                        <div class="form-group">
                            
                            <div class="col-sm-5">
                               <select class="form-control request" id="chem_type_1" name="chem_type_1">
                                    <option value="">-------------- ประเภทสารเคมี --------------</option>
                                    <?php foreach ($chem_type as $row) { ?>
                                        <option value="<?php echo $row['chem_store_type']; ?>"><?php echo $row['chem_store_name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <label  class="col-sm-2  text-center">วางชิดกับ</label>
                            
                            <div class="col-sm-5">
                               <select class="form-control request" id="chem_type_2" name="chem_type_2">
                                    <option value="">-------------- ประเภทสารเคมี --------------</option>
                                    <?php foreach ($chem_type as $row) { ?>
                                        <option value="<?php echo $row['chem_store_type']; ?>"><?php echo $row['chem_store_name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-3 control-label">เงื่อนไขการจัดวาง :</label>
                            <div class="col-sm-9">
                               <select class="form-control request" id="chem_relation" name="chem_relation">
                                    <option value="">-- เงื่อนไขการจัดวาง --</option>
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
                
                <table class="myTable_style">
                            <thead>
                                <tr id="header_table">
                                    <th class="text-center">ลำดับ</th>
                                    <th class="text-center">ประเภทสารเคมี</th>
                                    <th class="text-center">วางชิด</th>
                                    <th class="text-center">ประเภทสารเคมี</th>
                                    <th class="text-center">การจัดวาง</th>
                                    <th class="text-center">แก้ไข</th>
                                </tr>
                            </thead>
                            <tbody id="myTable">
                                <?php
                                $count = 0;
                                foreach ($chemstore_relation as $row) {
                                    $count++;
                                    ?>
                                    <tr>
                                        <td class="text-center"><?php echo $count; ?></td>
                                        <td class="text-center"><?php echo $row['chem_store_type_main']; ?></td>
                                        <td class="text-center"><font color="#FF0000">กับ</font></td>
                                        <td class="text-center"><?php echo $row['chem_store_type_relation']; ?></td>
                                        <td class="text-center"><font color="#FF0000"><?php echo $row['chem_relation_descr']; ?></font></td>
                                        <td class="text-center"><a class="btn btn-danger"  href="<?php echo base_url(); ?>index.php/chremstorerelation_controller/chremstore_relation/delete_chem_store_relation/<?php echo $row['chem_store_type_1']; ?>/<?php echo $row['chem_store_type_2']; ?>"  ><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
                                    </tr><?php } ?>
                            </tbody>

                        </table>
                <div class="col-md-12 text-center">
                <ul class="pagination pagination-lg pager" id="myPager"></ul>
            </div>
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
            var chem_relation = $('#chem_relation').val().trim();
            if (chem_type_1 == "") {
                $('#message').html('กรุณาระบุ ประเภทสารเคมี');
                $('#myModal').modal('show');
            }else if (chem_type_2 == "") {
                $('#message').html('กรุณาระบุ ประเภทสารเคมี');
                $('#myModal').modal('show');
            }else if (chem_relation == "") {
                $('#message').html('กรุณาระบุ เงื่อนไขการจัดวาง');
                $('#myModal').modal('show');
            }else {
                $("#save_store_relation").submit();
            }
        });
        window.setTimeout(function () {
          $("#alert-message").alert('close');
          <?php $this->session->unset_userdata('message_save');?>
         }, 2000);
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

