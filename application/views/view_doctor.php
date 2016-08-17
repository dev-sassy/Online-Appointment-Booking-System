<div class="row">
    <div class="col-md-12">
        <section class="panel">
            <header class="panel-heading pd-btm-25px">
                    All User
                    <div class="btn-group pull-right">
                            <a href="<?php echo base_url().'doctor/add_doctor' ?>" id="editable-sample_new" class="btn btn-primary">
                                    Add New <i class="fa fa-plus"></i>
                            </a>
                    </div>
            </header>
            <?php
                if ($dr_count >= 1) {
             ?>
            <div class="panel-body">
                <div class="adv-table table-responsive">
                    <table  class="display table table-bordered table-striped icon-color-blk" id="dynamic-table">
                        <thead>
                            <tr>
                                <td>
                                    User Name
                                </td>
                                <td>
                                    Doctor Name
                                </td>
                                <td>
                                    Doctor Email
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($dr as $dr_list) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $dr_list->dr_user_name; ?>
                                        </td>
                                        <td>
                                            <?php echo $dr_list->dr_name; ?>
                                        </td>
                                        <td>
                                            <?php echo $dr_list->dr_email; ?>
                                        </td>
                                        <td>
                                            <a href="<?php echo base_url() . 'index.php/doctor/edit_doctor/' . $dr_list->dr_id; ?>">Edit</a>
                                        </td>
                                        <td>
                                            <a href="<?php echo base_url() . 'index.php/doctor/del_doctor/' . $dr_list->dr_id; ?>" onclick="return confirm('are you sure?')">Delete</a>
                                        </td>
                                    </tr>
                                <?php }
                                ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php } ?>
        </section>
    </div>
</div>
