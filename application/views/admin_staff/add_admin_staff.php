<div class="row">
    <div class="col-md-12">
        <section class="panel">
            <header class="panel-heading">
                Add Admin Staff
            </header>
            <div class="panel-body">
                <div class="col-md-6">
                    <form id="add_asd_form" role="form" class="cmxform form-horizontal adminex-form" method="post">
                        <div class="form-group clearfix">
                            <div class="col-md-12">
                                <label for="exampleInputEmail1">First Name : </label>
                                <input type="text" class="form-control" name="firstname" id="firstname" placeholder="First Name" maxlength="25"  />
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <div class="col-md-12">
                                <label for="exampleInputEmail1">Last Name : </label>
                                <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Last Name" maxlength="25"  />
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <div class="col-md-12">
                                <label for="exampleInputEmail1">User Name : </label>
                                <input type="text" class="form-control" name="username" value="ADS<?php echo $next_user_id; ?>" id="username" placeholder="User Name" maxlength="10"  readonly />
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
                                <label for="exampleInputEmail1">Email : </label>
                                <input type="text" class="form-control" name="email" id="email" placeholder="Admin Staff Email" maxlength="30"  />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-primary" name="add_ads" id="add_ads" value="Add Admin Staff"/>
                            <a href="<?php echo base_url() . 'admin_Staff' ?>" class="btn btn-default"> Cancel </a>                            
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>    
