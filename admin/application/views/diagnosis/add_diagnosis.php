<div class="row">
    <div class="col-md-12">
        <section class="panel">
            <header class="panel-heading">
                Add Diagnosis
            </header>
            <div class="panel-body">
                <div class="col-md-6">
                    <form id="add_pdr_form" role="form" class="cmxform form-horizontal adminex-form" method="post">
                        <div class="form-group clearfix">
                            <div class="col-md-12">
                                <label for="exampleInputEmail1">Appointmnet Date</label>
                                <input type="text" name="ap_date" value="<?php echo $a_detail[0]['ap_date']; ?>" class="form-control" readonly/>
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <div class="col-md-12">
                                <label for="exampleInputEmail1">Appointmnet Time</label>
                                <input type="text" name="ap_time" value="<?php echo $a_detail[0]['ap_time']; ?>" class="form-control" readonly/>
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <div class="col-md-12">
                                <label for="exampleInputEmail1">Doctor Name</label>
                                <input type="text" name="dr_name" value="<?php echo $a_detail[0]['dr_name'] . ' / ' . $a_detail[0]['dr_username']; ?>" class="form-control" readonly/>
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <div class="col-md-12">
                                <label for="exampleInputEmail1">Patient Name</label>
                                <input type="text" name="p_name" value="<?php echo $a_detail[0]['p_fname'] . ' / ' . $a_detail[0]['p_lname']; ?>" class="form-control" readonly/>
                                <input type="hidden" name="p_id" value="<?php echo $a_detail[0]['p_id']; ?>" class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <div class="col-md-12">
                                <label for="exampleInputEmail1">Description</label>
                                <textarea class="form-control" name="description" id="description" rows="5" cols="50" placeholder="Description"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-primary" name="add_pdr" id="add_pdr" value="Add Diagnosis"/>
                            <?php if ($pid) { ?>
                            <a href="<?php echo base_url() . 'patient/view_appointment_record/'. $pid; ?>" class="btn btn-default"> Cancel </a>                            
                            <?php } else { ?>
                            <a href="<?php echo base_url() . 'appointment' ?>" class="btn btn-default"> Cancel </a>                            
                            <?php } ?>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>    
