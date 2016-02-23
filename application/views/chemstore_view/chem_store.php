<div class="col-md-9">
    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-1">
                <span class="glyphicon glyphicon-search fa-3x icon" aria-hidden="true"></span>
            </div>
            <div class="col-sm-11">
                <h4 class="font-title"><b>การจัดเก็บสารเคมีแบบแยกห่าง</b></h4>
            </div>

            <hr width="100%">
            <br><br>
            <form id="search_chem" method="post"  action="<?php echo base_url(); ?>index.php/chemstore_controller/chemStore_controller/search_chem_store">
                <?php if ($this->session->userdata('message_save') == 'error') { ?>
                    <div id="alert-message" class="alert alert-warning alert-dismissible" role="alert">ไม่พบข้อมูล</div>
                <?php } ?>
                <fieldset>  
                    <div class="form-group">
                        <label  class="col-sm-3 control-label text-right">สถานที่จัดเก็บสารเคมี :</label>
                        <div class="col-sm-6 text-left">
                            <select class="form-control" id="chem_warehouse_code" name="chem_warehouse_code">
                                <?php foreach ($chem_warehouse as $row) { ?>
                                    <option value="<?php echo $row['chem_warehouse_code']; ?>" ><?php echo $row['chem_warehouse_name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <a class="btn btn-primary" id="btn_search_chem"><span class="glyphicon glyphicon-search fa-1x" aria-hidden="true"> ค้นหา</span></a>
                        </div>
                        <br>
                        <br>
                    </div>
                    <hr>
                    <br><br>
                </fieldset>
            </form>
            <table class="table table-hover">
                <thead>
                    <tr id="header_table">
                            <th></th>
                        <?php foreach ($chem_no as $row) { ?>
                        
                            <th ><?php echo $row['chem_no']; ?></th>
                            <?php } ?>
                    </tr>
                </thead>
                <tbody >

                    <?php
                    $first_step = 0;
                    $x_chemno_temp = "";
                    echo '<tr>';
                    foreach ($chem_info as $row) {
                        ?>
                        <?php
                        if ($first_step == 0) {
                            $first_step = 1;
                            $x_chemno_temp = $row['x_chem_no'];
                            $x_chemno_temp = $row['x_chem_no'];
                            echo '<td >' . $x_chemno_temp . '</td>';
                        }
                        if ($x_chemno_temp != $row['x_chem_no']) {
                            echo '</tr>';
                            echo '<tr>';
                            $x_chemno_temp = $row['x_chem_no'];
                            echo '<td >' . $x_chemno_temp . '</td>';
                        }
                        echo '<td >' . $row['chem_relation_code'] . '</td>';
                    }
                    echo '</tr>';
                    ?>


                </tbody>

            </table>


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


    });

</script>

