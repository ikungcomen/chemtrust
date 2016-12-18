<div class="col-md-9">
    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-1">
                <span class="glyphicon glyphicon-user fa-3x icon" aria-hidden="true"></span>
            </div>
            <div class="col-sm-11">
                <h4 class="font-title"><b>จัดการข้อมูลสมาชิก</b></h4>
            </div>
            <hr width="100%">
            <br><br>
            <div class="panel-body form-horizontal payment-form">
                <?php if ($this->session->userdata('message_save') == 'true') { ?>
                    <div id="alert-message" class="alert alert-success alert-dismissible" role="alert">ลบข้อมูลเรียบร้อย</div>
                <?php } ?>
                <table class="myTable_style">
                    <thead>
                        <tr id="header_table">
                            <th class="text-center">ลำดับ</th>
                            <th class="text-center">ชื่อ-นามสกุล</th>
                            <th class="text-center">เบอร์โทรศัพท์</th>
                            <th class="text-center">สิทธิ์การใช้งาน</th>
                            <th class="text-center">สถานะ</th>
                            <th class="text-center">อนุมัติ/ไม่อนุมัติ</th>
                            <th class="text-center">ปรับปรุง</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        <?php
                        $count = 0;
                        foreach ($user as $row) {
                            $count++;
                            ?>
                            <tr>
                                <td class="text-center"><?php echo $count; ?></td>
                                <td class="text-left"><?php echo $row['user_prefix'] . " " . $row['user_name'] . " " . $row['user_last_name']; ?></td>
                                <td class="text-lefft"><?php echo $row['user_tel']; ?></td>
                                <td class="text-center"><?php echo $row['user_role'] ?></td>
                                <td class="text-center">
                                    <?php if ($row['user_status'] == 'A') { ?>
                                    <font color="#00FF00"><?php echo "อนุมัติ"; ?></font>
                                    <?php } else { ?>
                                       <font color="red"> <?php echo "ยังไม่อนุมัติ"; ?></font>
                                    <?php } ?>
                                </td>
                                <td class="text-center">
                                    <?php if ($this->session->userdata('user_role') == 'admin')  { ?>
                                        <?php if ($row['user_status'] == 'A') { ?>
                                            <a class=" btn btn-warning " id="" href="<?php echo base_url(); ?>index.php/management_controller/editUser_controller/update_unapprove_status/<?php echo $row['user_id']; ?>" ><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                                        <?php } else { ?>
                                            <a class=" btn btn-success " id="" href="<?php echo base_url(); ?>index.php/management_controller/editUser_controller/update_approve_status/<?php echo $row['user_id']; ?>" ><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></a>
                                        <?php } ?>
                                    <?php } ?>
                                </td>
                                <td class="text-center">
                                    <?php if ($this->session->userdata('user_role') == 'admin')  { ?>
                                        <a class=" btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                                        &nbsp;
                                        <a class="btn btn-info"  href="<?php echo base_url(); ?>index.php/management_controller/editPassword_controller/select_user/<?php echo $row['user_id']; ?>"  ><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></td>
                                    <?php } else { ?>
                                        <a class=" btn btn-danger "  href="<?php echo base_url(); ?>index.php/management_controller/editUser_controller/delete_user/<?php echo $row['user_id']; ?>" ><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                                        &nbsp;
                                        <a class="btn btn-info"  href="<?php echo base_url(); ?>index.php/management_controller/editPassword_controller/select_user/<?php echo $row['user_id']; ?>"  ><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></td>
                                <?php } ?>


                            <?php } ?>
                        </tr>

                    </tbody>
                </table>


            </div>
            <div class="col-md-12 text-center">
                <ul class="pagination pagination-lg pager" id="myPager"></ul>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('modal.html'); ?>
<script type="text/javascript">
    $(document).ready(function () {

        window.setTimeout(function () {
            $("#alert-message").alert('close');
<?php $this->session->unset_userdata('message_save'); ?>
        }, 2000);
    });
</script>



