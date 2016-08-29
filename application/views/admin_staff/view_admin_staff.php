<div class="row">
    <div class="col-md-12">
        <section class="panel">
            <header class="panel-heading pd-btm-25px">
                All User
                <div class="btn-group pull-right">
                    <a href="<?php echo base_url() . 'admin_staff/add_admin_staff' ?>" id="editable-sample_new" class="btn btn-primary">
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
                                    User Name
                                </td>
                                <td>
                                    First Name
                                </td>
                                <td>
                                    Last Name
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                        </thead>
                        <?php
                        if ($ads_count >= 1) {
                            ?>
                            <tbody>
                                <?php
                                 $i = 1;
                                foreach ($ads as $staff_list) {
                                    ?>
                                    <tr>
                                        <td width="3%"><?php echo $i++; ?></td>
                                        <td>
                                            <?php echo $staff_list->as_username; ?>
                                        </td>
                                        <td>
                                            <?php echo $staff_list->as_fname; ?>
                                        </td>
                                        <td>
                                            <?php echo $staff_list->as_lname; ?>
                                        </td>
                                        <td>
                                            <a href="<?php echo base_url() . 'admin_staff/edit_staff/' . $staff_list->as_id; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true" title="Edit"></i></a>
                                        </td>
                                        <td>
                                            <a href="<?php echo base_url() . 'admin_staff/del_staff/' . $staff_list->as_id; ?>" onclick="return confirm('are you sure?')"><i class="fa fa-times" aria-hidden="true" title="Delete"></i></a>
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
