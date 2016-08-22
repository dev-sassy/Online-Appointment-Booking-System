<div class="row">
    <div class="col-md-12">
        <section class="panel">
            <header class="panel-heading">
                Edit Doctor
            </header>
            <div class="panel-body">
                <div class="col-md-6">
                    <form method="post" id="add_dr_form" role="form" class="cmxform form-horizontal adminex-form">
                        <div class="form-group clearfix">
                            <div class="col-md-12">
                                <label for="exampleInputEmail1">First Name : </label>
                                <input type="text" class="form-control" id="firstname" name="firstname" maxlength="25" value="<?php echo $dr[0]['dr_name'] ?>"  placeholder="First Name" />                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <div class="col-md-12">
                                <label for="exampleInputEmail1">User Name : </label>
                                <input type="text" class="form-control" id="username" name="username" maxlength="10" value="<?php echo $dr[0]['dr_user_name'] ?>" placeholder="User Name" readonly />
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <div class="col-md-12">
                                <label for="exampleInputEmail1">Doctor Email : </label>
                                <input type="text" class="form-control" id="dr_email" name="dr_email" maxlength="50" value="<?php echo $dr[0]['dr_email'] ?>" placeholder="Doctor Email" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-primary" name="update_dr" id="update_dr" value="Update"/>
                            <a href="<?php echo base_url() . 'doctor' ?>" class="btn btn-default"> Cancel </a>                            
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>

