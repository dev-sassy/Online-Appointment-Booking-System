<div class="row">
    <div class="col-md-12">
        <section class="panel">
            <header class="panel-heading pd-btm-25px">
                All Appointment
                <?php if ($this->session->userdata('route_path') == 'users/staff') { ?>
                    <div class="btn-group pull-right">
                        <?php if ($id) { ?>
                            <a href="<?php echo base_url() . 'appointment/book_appointment/' . $id; ?>" id="editable-sample_new" class="btn btn-primary">
                                Add New <i class="fa fa-plus"></i>
                            </a>
                        <?php } else { ?>
                            <a href="<?php echo base_url() . 'appointment/book_appointment' ?>" id="editable-sample_new" class="btn btn-primary">
                                Add New <i class="fa fa-plus"></i>
                            </a>
                        <?php } ?>
                    </div>
                <?php } ?>
            </header>

            <div class="panel-body">
                <div class="adv-table table-responsive">
                    <table  class="display table table-bordered table-striped icon-color-blk" id="dynamic-table">
                        <thead>
                            <tr>
                                <td>
                                    Sr No.
                                </td>
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
                                <?php if ($this->session->userdata('route_path') == 'users/doctor') { ?>
                                    <td>Action</td>
                                <?php } ?>
                                <?php if ($this->session->userdata('route_path') == 'users/staff') { ?>
                                    <td>Action</td>
                                <?php } ?>
                            </tr>
                        </thead>
                        <?php
                        if ($a_count >= 1) {
                            ?>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($a_list as $appointment) {
                                    ?>
                                    <tr>
                                        <td width="3%">
                                            <?php echo $i++; ?>
                                        </td>   
                                        <td>
                                            <?php echo $appointment->ap_date; ?>
                                        </td>
                                        <td>
                                            <?php echo $appointment->ap_time; ?>
                                        </td>
                                        <td>
                                            <?php echo $appointment->dr_name . ' / ' . $appointment->dr_username; ?>
                                        </td>
                                        <td>
                                            <?php echo $appointment->p_fname . ' ' . $appointment->p_lname; ?>
                                        </td>
                                        <?php if ($this->session->userdata('route_path') == 'users/doctor') { ?>
                                            <td>
                                                <a href="<?php echo base_url() . 'patient/view_diagnois_record/' . $appointment->ap_id; ?>" ><i class="fa fa-eye" aria-hidden="true" title="View Diagnosis"></i></a>
                                                <?php if ($id) { ?>
                                                    <a href="<?php echo base_url() . 'patient/add_diagnosis/' . $appointment->ap_id . '/' . $id; ?>" ><i class="fa fa-plus-circle" aria-hidden="true" title="Add Diagnosis"></i></a>
                                                <?php } else { ?>
                                                    <a href="<?php echo base_url() . 'patient/add_diagnosis/' . $appointment->ap_id; ?>"  ><i class="fa fa-plus-circle" aria-hidden="true" title="Add Diagnosis"></i></a>
                                                <?php } ?>
                                            </td>
                                        <?php } ?>
                                        <?php if ($this->session->userdata('route_path') == 'users/staff') { ?>
                                            <td>
                                                <?php if ($appointment->ap_date > date('Y-m-d')) { ?>
                                                    <?php if ($id) { ?>
                                                        <a href="<?php echo base_url() . 'appointment/cancel_appointment/' . $appointment->ap_id . '/' . $id; ?>"  onclick="return confirm('are you sure?')"><i class="fa fa-times" aria-hidden="true" title="Delete"></i></a>
                                                    <?php } else { ?>
                                                        <a href="<?php echo base_url() . 'appointment/cancel_appointment/' . $appointment->ap_id; ?>" onclick="return confirm('are you sure?')"><i class="fa fa-times" aria-hidden="true" title="Delete"></i></a>
                                                        <?php } ?>
                                                    <?php } ?>

                                            </td>
                                        <?php } ?>
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
