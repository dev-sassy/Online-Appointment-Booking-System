<div class="row">
    <div class="col-md-12">
        <section class="panel">
            <header class="panel-heading pd-btm-25px">
                All Diagnosis Records
            </header>

            <div class="panel-body">
                <div class="adv-table table-responsive">
                    <table  class="display table table-bordered table-striped icon-color-blk" id="dynamic-table">
                        <thead>
                            <tr>
                                <td>
                                    Date
                                </td>
                                <td>
                                    Description
                                </td>
                                <td>
                                    Patient User Name
                                </td>
                                <td>
                                    Patient Name
                                </td>
                                <td></td>
                            </tr>
                        </thead>
                        <?php
                        if ($pdr_count >= 1) {
                            ?>
                            <tbody>
                                <?php
                                foreach ($pdr_list as $pdr) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $pdr->pdr_date; ?>
                                        </td>
                                        <td>
                                            <?php echo $pdr->pdr_detail; ?>
                                        </td>
                                        <td>
                                            <?php echo $pdr->p_username; ?>
                                        </td>
                                        <td>
                                            <?php echo $pdr->p_fname . ' ' . $pdr->p_lname; ?>
                                        </td>
                                        <td>
                                            <?php if ($this->uri->segment(3)) { ?>
                                                <a href="<?php echo base_url() . 'patient/edit_diagnois_record/' . $pdr->pdr_id . '/' . $this->uri->segment(3); ?>"><i class="fa fa-pencil-square-o" aria-hidden="true" title="Edit"></i></a>
                                            <?php } else { ?>
                                                <a href="<?php echo base_url() . 'patient/edit_diagnois_record/' . $pdr->pdr_id; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true" title="Edit"></i></a>
                                                <?php }
                                                ?>
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
