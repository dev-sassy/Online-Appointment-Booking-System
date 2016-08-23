<div class="row">
    <div class="col-md-12">
        <section class="panel">
            <header class="panel-heading pd-btm-25px">
                All User
                <div class="btn-group pull-right">
                    <a href="<?php echo base_url() . 'doctor/add_doctor' ?>" id="editable-sample_new" class="btn btn-primary">
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
                        <?php
                        if ($dr_count >= 1) {
                            ?>
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
                                            <a href="<?php echo base_url() . 'doctor/edit_doctor/' . $dr_list->dr_id; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true" title="Edit"></i></a>
                                        </td>
                                        <td>
                                            <a href="<?php echo base_url() . 'doctor/del_doctor/' . $dr_list->dr_id; ?>" onclick="return confirm('are you sure?')"><i class="fa fa-times" aria-hidden="true" title="Delete"></i></a>
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
