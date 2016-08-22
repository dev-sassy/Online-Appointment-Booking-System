<div class="row">
    <div class="col-md-12">
        <section class="panel">
            <header class="panel-heading">
                Add Doctor
            </header>
            <div class="panel-body">
                <div class="col-md-6">
                    <form id="add_dr_form" role="form" class="cmxform form-horizontal adminex-form" method="post">
                        <div class="form-group clearfix">
                            <div class="col-md-12">
                                <label for="exampleInputEmail1">First Name : </label>
                                <input type="text" class="form-control" name="firstname" id="firstname" placeholder="First Name" maxlength="25"  />
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <div class="col-md-12">
                                <label for="exampleInputEmail1">User Name : </label>
                                <input type="text" class="form-control" name="username" id="username" placeholder="User Name" maxlength="10"  />
                                <label id="mail_err"></label>
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <div class="col-md-12">
                                <label for="exampleInputEmail1">Password : </label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password" maxlength="14"  />
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <div class="col-md-12">
                                <label for="exampleInputEmail1">Verify Password : </label>
                                <input type="password" class="form-control" name="verify_password" id="verify_password" placeholder="Verify Password" maxlength="14"  />
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <div class="col-md-12">
                                <label for="exampleInputEmail1">Doctor Email : </label>
                                <input type="text" class="form-control" name="dr_email" id="dr_email" placeholder="Doctor Email" maxlength="30"  />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-primary" name="add_dr" id="add_dr" value="Add Doctor"/>
                            <a href="<?php echo base_url() . 'doctor' ?>" class="btn btn-default"> Cancel </a>                            
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>    
