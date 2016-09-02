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
                                    Sr No.
                                </td>
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
                                <td>Action</td>
                                
                            </tr>
                        </thead>
                        <?php
                        if ($p_count >= 1) {
                            ?>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($p_list as $p) {
                                    ?>
                                    <tr>
                                        <td width="3%"><?php echo $i++; ?></td>
                                        <td>
                                            <?php echo $p->p_fname; ?>
                                        </td>
                                        <td>
                                            <?php echo $p->p_lname; ?>
                                        </td>
                                        <td>
                                            <?php echo $p->p_email; ?>
                                        </td>
                                        <td>
                                            <?php echo $p->p_username; ?>
                                        </td>
                                        <td>
                                            <?php echo $p->p_contact; ?>
                                        </td>
                                        <td>
                                            <?php echo $p->p_emergency_c_number; ?>
                                        </td>
                                        <td width= "10%">
                                            <a href="<?php echo base_url() . 'patient/view_appointment_record/' . $p->p_id; ?>" ><i class="fa fa-eye" aria-hidden="true" title="View  Appointments"></i></a>
                                            <a href="<?php echo base_url() . 'patient/edit_patient/' . $p->p_id; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true" title="Edit"></i></a>
                                            <a href="<?php echo base_url() . 'patient/del_patient/' . $p->p_id; ?>" onclick="return confirm('are you sure?')"><i class="fa fa-times" aria-hidden="true" title="Delete"></i></a>
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
