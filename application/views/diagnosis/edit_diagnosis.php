<div class="row">
    <div class="col-md-12">
        <section class="panel">
            <header class="panel-heading">
                Edit Diagnosis
            </header>
            <div class="panel-body">
                <div class="col-md-6">
                    <form id="add_pdr_form" role="form" class="cmxform form-horizontal adminex-form" method="post">
                        <div class="form-group clearfix">
                            <div class="col-md-12">
                                <label for="exampleInputEmail1">Description</label>
                                <textarea class="form-control" name="description" id="description" rows="5" cols="50" placeholder="Description"><?php echo $pdr_edit[0]['pdr_detail'] ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-primary" name="update_pdr" id="update_pdr" value="Update"/>
                            <?php if($this->uri->segment(4)) { ?>
                                <a href="<?php echo base_url() . 'patient/view_diagnois_record/' . $this->uri->segment(4); ?>" class="btn btn-default"> Cancel </a>                            
                            <?php } else { ?>
                                <a href="<?php echo base_url() . 'patient/view_diagnois_record' ?>" class="btn btn-default"> Cancel </a>                            
                            <?php } ?>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>    
