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
                                <?php if ($this->session->userdata('route_path') == 'users/doctor') { ?>
                                    <td></td>
                                    <td></td>
                                <?php } ?>
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
                                        <?php if ($this->session->userdata('route_path') == 'users/doctor') { ?>
                                            <td>
                                                <a href="<?php echo base_url() . 'patient/view_diagnois_record/' . $p->patient_id; ?>" ><i class="fa fa-eye" aria-hidden="true" title="View  Diagnosis"></i></a>
                                            </td>
                                            <td>
                                                <a href="<?php echo base_url() . 'patient/add_diagnosis/' . $p->patient_id; ?>" ><i class="fa fa-plus-circle" aria-hidden="true" title="Add Diagnosis"></i></a>
                                            </td>
                                        <?php } ?>
                                        <td>
                                            <a href="<?php echo base_url() . 'patient/edit_patient/' . $p->patient_id; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true" title="Edit"></i></a>
                                        </td>
                                        <td>
                                            <a href="<?php echo base_url() . 'patient/del_patient/' . $p->patient_id; ?>" onclick="return confirm('are you sure?')"><i class="fa fa-times" aria-hidden="true" title="Delete"></i></a>
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
