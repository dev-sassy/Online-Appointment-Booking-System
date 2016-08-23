<div class="row">
    <div class="col-md-12">
        <section class="panel">
            <header class="panel-heading">
                Edit Admin Staff
            </header>
            <div class="panel-body">
                <div class="col-md-6">
                    <form method="post" id="add_asd_form" role="form" class="cmxform form-horizontal adminex-form">
                        <div class="form-group clearfix">
                            <div class="col-md-12">
                                <label for="exampleInputEmail1">First Name : </label>
                                <input type="text" class="form-control" id="firstname" name="firstname" maxlength="25" value="<?php echo $asd[0]['as_fname'] ?>"  placeholder="First Name" />                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <div class="col-md-12">
                                <label for="exampleInputEmail1">Last Name : </label>
                                <input type="text" class="form-control" id="lastname" name="lastname" maxlength="25" value="<?php echo $asd[0]['as_lname'] ?>"  placeholder="last Name" />                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <div class="col-md-12">
                                <label for="exampleInputEmail1">User Name : </label>
                                <input type="text" class="form-control" id="username" name="username" maxlength="10" value="<?php echo $asd[0]['as_id'] ?>" placeholder="User Name" readonly />
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <div class="col-md-12">
                                <label for="exampleInputEmail1">Email : </label>
                                <input type="text" class="form-control" id="email" name="email" maxlength="50" value="<?php echo $asd[0]['as_email'] ?>" placeholder="Doctor Email" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-primary" name="update_asd" id="update_asd" value="Update"/>
                            <a href="<?php echo base_url() . 'admin_staff' ?>" class="btn btn-default"> Cancel </a>                            
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>

