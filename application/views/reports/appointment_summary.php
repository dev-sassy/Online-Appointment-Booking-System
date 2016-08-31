<div class="row">
    <div class="col-md-12">
        <section class="panel">
            <form id="p_report" role="form" class="cmxform form-horizontal adminex-form" method="post">
                <div class="form-group clearfix">
                    <div class="col-md-2">
                        <input type="text" name="from_date" id="from_date" class="form-control" value="<?php echo $txt_value['from_date']; ?>" placeholder="From Date" />
                    </div>
                    <div class="col-md-2">
                        <input type="text" name="to_date" id="to_date"  class="form-control" value="<?php echo $txt_value['to_date']; ?>" placeholder="To Date" />
                    </div>
                    <div class="col-md-2">
                        <select id="dr_list" name="dr_list" class="form-control m-bot15">
                            <option selected value="">Select Doctor</option>
                                <?php
                                if ($dr_count >= 1) {
                                    foreach ($dr_list as $dr_name) {
                                        if ($txt_value && $dr_name->dr_id == $txt_value['doc']) {
                                            ?>
                                            <option value="<?php echo $dr_name->dr_id; ?>" selected><?php echo 'Dr. ' . $dr_name->dr_name . ' / ' . $dr_name->dr_username; ?></option>
                                        <?php } else {
                                            ?>
                                            <option value="<?php echo $dr_name->dr_id; ?>"><?php echo 'Dr. ' . $dr_name->dr_name . ' / ' . $dr_name->dr_username; ?></option>
                                            <?php
                                        }
                                    }
                                }
                                ?>
                            </select>
                    </div>
                    <div class="col-md-2">
                        <input type="submit" name="gen_report" id="gen_report" class="btn btn-primary" value="Genrate" />
                    </div>
                </div>
            </form>


            <div class="panel-body">
                <div class="adv-table table-responsive">
                    <table  class="display table table-bordered table-striped icon-color-blk" >
                        <thead>
                            <tr>
                                <td>
                                   Appointment Date
                                </td>
                                <td>
                                    Appointment Time
                                </td>
                                <td>
                                    Doctor Name
                                </td>
                                <td>
                                    Patient Name
                                </td>
                            </tr>
                        </thead>
                        <?php
                        if ($a_count >= 1) {
                            ?>
                            <tbody>
                                <?php
                                foreach ($a_list as $a) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $a->ap_date; ?>
                                        </td>
                                        <td>
                                            <?php echo $a->ap_time; ?>
                                        </td>
                                        <td>
                                            <?php echo $a->dr_name . '/' . $a->dr_username; ?>
                                        </td>
                                        <td>
                                            <?php echo $a->p_fname . '/' . $a->p_lname ; ?>
                                        </td>
                                    </tr>
                                <?php }
                                ?>
                            </tbody>
                            <?php
                        } else {
                            echo "No Record Found";
                        }
                        ?>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>
