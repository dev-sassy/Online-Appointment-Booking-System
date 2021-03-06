<div class="row">
    <div class="col-md-12">
        <section class="panel">
            <header class="panel-heading pd-btm-25px">
                All Doctors
                <?php if ($this->session->userdata('route_path') == 'users/doctor') { ?>
                    <div class="btn-group pull-right">
                        <a href="<?php echo base_url() . 'doctor/add_doctor' ?>" id="editable-sample_new" class="btn btn-primary">
                            Add New <i class="fa fa-plus"></i>
                        </a>
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
                                    User Name
                                </td>
                                <td>
                                    Doctor Name
                                </td>
                                <td>
                                    Doctor Photo
                                </td>
                                <?php if ($this->session->userdata('route_path') == 'users/doctor') { ?>
                                    <td>Action</td>
                                <?php } ?>
                            </tr>
                        </thead>
                        <?php
                        if ($dr_count >= 1) {
                            ?>
                            <tbody>
                                <?php
                                $i = 1; 
                                foreach ($dr as $dr_list) {
                                    ?>
                                    <tr>
                                        <td width="3%">
                                            <?php echo $i++; ?>
                                        </td>
                                        <td>
                                            <?php echo $dr_list->dr_username; ?>
                                        </td>
                                        <td>
                                            <?php echo $dr_list->dr_name; ?>
                                        </td>
                                        <td width="30%"> 
                                            <?php if($dr_list->dr_photo) { ?>
                                                <img src="<?php echo base_url(); ?>assets/images/doctor_pic/<?php echo $dr_list->dr_photo;  ?>" alt="No Image Found" class="slider-view-img" />
                                            <?php } else { ?>
                                                <img src="<?php echo base_url(); ?>assets/images/doctor_pic/no-image-available.jpg" alt="No Image Found" class="slider-view-img" />
                                            <?php } ?>
                                        </td>
                                        <?php if ($this->session->userdata('route_path') == 'users/doctor') { ?>
                                            <td width="10%">
                                                <a href="<?php echo base_url() . 'doctor/edit_doctor/' . $dr_list->dr_id; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true" title="Edit"></i></a>
                                                <a href="<?php echo base_url() . 'doctor/del_doctor/' . $dr_list->dr_id; ?>" onclick="return confirm('are you sure?')"><i class="fa fa-times" aria-hidden="true" title="Delete"></i></a>
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
