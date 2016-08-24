<div class="row">
    <div class="col-md-12">
        <section class="panel">
            <form id="p_report" role="form" class="cmxform form-horizontal adminex-form" method="post">
                <div class="form-group clearfix">
                    <div class="col-md-12">
                        <input type="text" name="from_date" id="from_date" placeholder="From Date" />
                    </div>
                </div>
                <div class="form-group clearfix">
                    <div class="col-md-12">
                        <input type="text" name="to_date" id="to_date" placeholder="To Date" />
                    </div>
                </div>
                <div class="form-group clearfix">
                    <div class="col-md-12">
                        <input type="submit" name="gen_report" id="gen_report" value="Genrate" />
                    </div>
                </div>
            </form>


            <div class="panel-body">
                <div class="adv-table table-responsive">
                    <table  class="display table table-bordered table-striped icon-color-blk" id="dynamic-table">
                        <thead>
                            <tr>
                                <td>
                                    First Name
                                </td>
                                <td>
                                    Last Name
                                </td>
                                <td>
                                    User ID
                                </td>
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
                                            <?php echo $p->patient_username; ?>
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
