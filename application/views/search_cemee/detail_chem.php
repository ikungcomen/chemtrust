<div class="col-md-9">
    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-1">
                <span class="glyphicon glyphicon glyphicon-th fa-3x icon" aria-hidden="true"></span>
            </div>
            <div class="col-sm-11">
                <h4 class="font-title"><b>รายละเอียด</b></h4>
            </div>

            <hr width="100%">
            <br>
            <div class="form-group">
                <div class="col-sm-6">
                    <a class="btn btn-success"  href="<?php echo base_url(); ?>index.php/search_cemee/searchCemee_controller/show_search_cemee_all"  ><span class="glyphicon glyphicon-backward" aria-hidden="true"> ย้อนกลับ</span></a>
                </div>

                <div class="col-sm-6 text-right">
                    <a class="btn btn-warning"  href="<?php echo base_url(); ?>index.php/search_cemee/searchCemee_controller/edit_chem/<?php echo $chem_info[0]['chem_no']; ?>"  ><span class="glyphicon glyphicon-edit" aria-hidden="true"> แก้ไข</span></a>
                </div>

            </div>
            <br>
            <div class="panel-body form-horizontal payment-form">
                <hr><br>
                <?php if ($this->session->userdata('message_save') == 'true') { ?>
                    <div id="alert-message" class="alert alert-success alert-dismissible" role="alert">แก้ไขข้อมูลเรียบร้อย</div>
                <?php } ?>
                <div class="form-group">
                    <label class="col-sm-2 text-right">รหัสสารเคมี : </label>
                    <label class="col-sm-2 text-left"><font color="red"><?php echo $chem_info[0]['chem_no']; ?></font></label>
                    <label class="col-sm-2 text-right">Cas No. : </label>
                    <label class="col-sm-2 text-left"><font color="red"><?php echo $chem_info[0]['chem_cas_number']; ?></font></label>
                    <label class="col-sm-2 text-right">ลำดับบัญชี : </label>
                    <label class="col-sm-2 text-left"><font color="red"><?php echo $chem_info[0]['chem_seq']; ?></font></label>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 text-right">ชื่อสารเคมี Th : </label>
                    <label class="col-sm-2 text-left"><font color="red"><?php echo $chem_info[0]['chem_name_th']; ?></font></label>
                    <label class="col-sm-2 text-right">ชื่อสารเคมี Eng : </label>
                    <label class="col-sm-2 text-left"><font color="red"><?php echo $chem_info[0]['chem_name_en']; ?></font></label>
                    <label class="col-sm-2 text-right">ประเภทสารเคมี : </label>
                    <label class="col-sm-2 text-left"><font color="red"><?php echo $chem_info[0]['chem_store_name']; ?></font></label>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 text-right">จำนวนนำเข้า : </label>
                    <label class="col-sm-2 text-left"><font color="red"><?php echo $chem_info[0]['chem_qty_in']; ?></font></label>
                    <label class="col-sm-2 text-right">หน่วยนำเข้า : </label>
                    <label class="col-sm-2 text-left"><font color="red"><?php echo $chem_info[0]['chem_msm_name_in']; ?></font></label>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 text-right">จำนวนคงเหลือ : </label>
                    <label class="col-sm-2 text-left"><font color="red"><?php echo $chem_info[0]['chem_qty_boh']; ?></font></label>
                    <label class="col-sm-2 text-right">หน่วยคงเหลือ : </label>
                    <label class="col-sm-2 text-left"><font color="red"><?php echo $chem_info[0]['chem_msm_name_out']; ?></font></label>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 text-right">สถานที่จัดเก็บ : </label>
                    <label class="col-sm-2 text-left"><font color="red"><?php echo $chem_info[0]['chem_warehouse_name']; ?></font></label>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 text-right">พิมพ์ MSDS : </label>
                    <div class="col-sm-2 text-left"> 
                        <a id="print_classify_btn" class="btn btn-primary" href="file_web/chem_desc/<?php echo $chem_info[0]['chem_msds_file']; ?>" target="_blank">
                                    <span class="glyphicon glyphicon-print fa-1x" aria-hidden="true"> MSDS</span>
                      </a>                      
                   </div>
                   <label class="col-sm-2 text-right">พิมพ์ฉลาก : </label>
                    <div class="col-sm-2   text-left"> 
                        <a id="print_classify_btn" class="btn btn-primary" href="file_web/chem_desc/<?php echo $chem_info[0]['chem_label_file']; ?>" target="_blank">
                                    <span class="glyphicon glyphicon-print fa-1x" aria-hidden="true"> ฉลาก</span>
                      </a>
                      
                   </div>
                </div>
                    
                <hr>
                <div class="form-group">
                    <label class="col-sm-3"><font color="#0040FF">ผู้สร้าง : &nbsp;&nbsp;<?php echo $chem_info[0]['create_userid']; ?></font></label>
                    <label class="col-sm-3"><font color="#0040FF">วันที่สร้าง : &nbsp;&nbsp;<?php echo $chem_info[0]['create_date']; ?></font></label>
                    <label class="col-sm-3"><font color="#0040FF">ผู้แก้ไข : &nbsp;<?php echo $chem_info[0]['update_userid']; ?></font></label>
                    <label class="col-sm-3"><font color="#0040FF">วันที่แก้ไข : &nbsp;<?php echo $chem_info[0]['update_date']; ?></font></label>


                </div>



            </div>  
        </div>
    </div>
</div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        window.setTimeout(function () {
            $("#alert-message").alert('close');
<?php $this->session->unset_userdata('message_save'); ?>
        }, 2000);


    });

</script>

