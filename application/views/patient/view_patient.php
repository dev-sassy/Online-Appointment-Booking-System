<div class="row">
    <div class="col-md-12">
        <section class="panel">
            <header class="panel-heading pd-btm-25px">
                All User
                <div class="btn-group pull-right">
                    <a href="<?php echo base_url() . 'patient/add_patient' ?>" id="editable-sample_new" class="btn btn-primary">
                        Add New <i class="fa fa-plus"></i>
                    </a>
                </div>
            </header>
            <div class="panel-body">
                <div class="adv-table table-responsive">
                    <table  class="display table table-bordered table-striped icon-color-blk" id="dynamic-table">
                        <thead>
                            <tr>
                                <td>
                                    Paitent First Name
                                </td>
                                <td>
                                    Paitent Last Name
                                </td>
                                <td>
                                    Paitent Email
                                </td>
                                <td>
                                    User Name
                                </td>
                                <td>
                                    Patient Contact
                                </td>
                                <td>
                                    Patient Emergency Contact Number
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                        </thead>
                        <?php
                        if ($p_count >= 1) {
                            ?>
                            <tbody>
                                <?php
                                foreach ($p_list as $p) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $p->patient_fname; ?>
                                        </td>
                                        <td>
                                            <?php echo $p->patient_lname; ?>
                                        </td>
                                        <td>
                                            <?php echo $p->patient_email; ?>
                                        </td>
                                        <td>
                                            <?php echo $p->patient_username; ?>
                                        </td>
                                        <td>
                                            <?php echo $p->patient_contact; ?>
                                        </td>
                                        <td>
                                            <?php echo $p->patient_emergency_c_number; ?>
                                        </td>
                                        <td>
                                            <a href="<?php echo base_url() . 'patient/edit_patient/' . $p->patient_id; ?>">Edit</a>
                                        </td>
                                        <td>
                                            <a href="<?php echo base_url() . 'patient/del_patient/' . $p->patient_id; ?>" onclick="return confirm('are you sure?')">Delete</a>
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
