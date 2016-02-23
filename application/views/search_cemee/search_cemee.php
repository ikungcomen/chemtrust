<div class="col-md-9">
    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-1">
                <span class="glyphicon glyphicon-search fa-3x icon" aria-hidden="true"></span>
            </div>
            <div class="col-sm-11">
                <h4 class="font-title"><b>ค้นหาสารเคมีด้วยรหัส</b></h4>
            </div>

            <hr width="100%">
            <br><br>
            <?php if ($this->session->userdata('message_save') == 'error'){ ?>
                    <div id="alert-message" class="alert alert-warning alert-dismissible" role="alert">ไม่พบข้อมูล</div>
            <?php }?>
            <form id="search_chem" method="post"  action="<?php echo base_url(); ?>index.php/search_cemee/searchCemee_controller/search_chem">
                <fieldset>  
                    <div class="form-group">
                        <label  class="col-sm-2 control-label">รหัสสารเคมี :</label>
                        <div class="col-sm-2">
                            <input class="form-control" type="text" id="chem_no" name="chem_no" maxlength="10"   placeholder="รหัสสารเคมี">
                        </div>
                        <label  class="col-sm-2 control-label">ชื่อทางการค้า :</label>
                        <div class="col-sm-3">
                            <input class="form-control " type="text"  id="chem_name" name="chem_name" maxlength="250"    placeholder="ชื่อทางการค้า">
                        </div>
                        <div class="col-sm-3">
                            <a class="btn btn-primary" id="btn_search_chem"><span class="glyphicon glyphicon-search fa-1x" aria-hidden="true"> ค้นหา</span></a>
                        </div>
                    </div>
                    <br><br>
                </fieldset>
            </form>
            <div class="panel-body form-horizontal payment-form">
                <?php if ($this->session->userdata('message_save') == 'true') { ?>
                    <div id="alert-message" class="alert alert-success alert-dismissible" role="alert">ลบข้อมูลเรียบร้อย</div>
                <?php } ?>
                <div class="panel-body form-horizontal payment-form">
                    <?php
                    $count = 0;
                    foreach ($chem_info as $row) {
                        $count++;
                    }
                    ?>
                    <?php if ($count > 0) { ?>
                        <table class="table table-hover">
                            <thead>
                                <tr id="header_table">
                                    <th class="text-center">ลำดับ</th>
                                    <th class="text-center">รหัสสารเคมี</th>
                                    <th class="text-center">ชื่อสารเคมี Th</th>
                                    <th class="text-center">ชื่อสารเคมี Eng</th>
                                    <th class="text-center">ประเภทสารเคมี</th>
                                    <th class="text-center">รายละเอียด</th>
                                </tr>
                            </thead>
                            <tbody id="myTable">
                                <?php
                                $count = 0;
                                foreach ($chem_info as $row) {
                                    $count++;
                                    ?>
                                    <tr>
                                        <td class="text-center"><?php echo $count; ?></td>
                                        <td class="text-center"><?php echo $row['chem_no']; ?></td>
                                        <td class="text-center"><?php echo $row['chem_name_th']; ?></td>
                                        <td class="text-center"><?php echo $row['chem_name_en']; ?></td>
                                        <td class="text-center"><?php echo $row['chem_type']; ?></td>
                                        <td class="text-center"><a class="btn btn-danger"  href="<?php echo base_url(); ?>index.php/search_cemee/searchCemee_controller/delete_chem/<?php echo $row['chem_no']; ?>"  ><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>&nbsp;<a class="btn btn-info"  href="<?php echo base_url(); ?>index.php/search_cemee/searchCemee_controller/detai_chem/<?php echo $row['chem_no']; ?>"  ><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></td></td>
                                    </tr><?php } ?>
                            </tbody>

                        </table>
<?php } ?>
                </div>
            </div>  
            <div class="col-md-12 text-center">
                <ul class="pagination pagination-lg pager" id="myPager"></ul>
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
        $('#btn_search_chem').click(function () {
            $("#search_chem").submit();
        });
        $("#chem_no").autocomplete({
            source: function (request, response) {
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/search_cemee/searchCemee_controller/search_chem_no_auto",
                    type: 'POST',
                    cache: false,
                    dataType: "json",
                    data: {
                        chem_no: $("#chem_no").val()
                    },
                    success: function (data) {
                        response($.map(data, function (list) {
                            return {
                                value: list.chem_no
                            };
                        }));
                    },
                    error: function (data) {
                        //alert("Error");
                    }
                });
            },
            minLength: 1,
            select: function (event, ui) {
                $("#chem_no").val(ui.item.value);
                return false;
            }
        });
        $("#chem_name").autocomplete({
            source: function (request, response) {
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/search_cemee/searchCemee_controller/search_chem_name_auto",
                    type: 'POST',
                    cache: false,
                    dataType: "json",
                    data: {
                        chem_name: $("#chem_name").val()
                    },
                    success: function (data) {
                        response($.map(data, function (list) {
                            return {
                                value: list.chem_name_th
                            };
                        }));
                    },
                    error: function (data) {
                        //alert("Error");
                    }
                });
            },
            minLength: 1,
            select: function (event, ui) {
                $("#chem_name").val(ui.item.value);
                return false;
            }
        });
    });

</script>

