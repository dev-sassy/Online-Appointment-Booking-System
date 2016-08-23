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
                                <label for="exampleInputEmail1">Description</label>
                                <textarea class="form-control" name="description" id="description" rows="5" cols="50" placeholder="Description"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-primary" name="add_pdr" id="add_pdr" value="Add Diagnosis"/>
                            <a href="<?php echo base_url() . 'patient' ?>" class="btn btn-default"> Cancel </a>                            
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>    
