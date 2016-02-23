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
            <br><br>
            <div class="panel-body form-horizontal payment-form">
                <div class="form-group">
                    <label class="col-sm-12"><font color="red">แก้ไขล่าสุดเมื่อวันที่ : </font>&nbsp;<?php echo $chem_info[0]['update_date']; ?>&nbsp;<font color="red">โดยผู้ใช้ชื่อ : </font>&nbsp;<?php echo $chem_info[0]['update_userid']; ?></label>
                </div>
                <hr><br><br>
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
                <br>
                <hr>

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

