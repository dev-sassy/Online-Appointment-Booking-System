<div class="row">
    <div class="col-md-12">
        <section class="panel">
            <header class="panel-heading">
                Add Patient
            </header>
            <div class="panel-body">
                <div class="col-md-6">
                    <form id="add_p_form" role="form" class="cmxform form-horizontal adminex-form" method="post">
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
                                <input type="text" class="form-control" name="username" id="username" placeholder="User Name" maxlength="25"  />
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
                                <label for="exampleInputEmail1">Paitent Email : </label>
                                <input type="text" class="form-control" name="p_email" id="p_email" placeholder="Paitent Email" maxlength="30"  />
                            </div>
                        </div> 
                        <div class="form-group clearfix">
                            <div class="col-md-12">
                                <label for="exampleInputEmail1">Paitent Address : </label>
                                <textarea class="form-control" name="p_addr" id="p_addr"></textarea>
                            </div>
                        </div> 
                        <div class="form-group clearfix">
                            <div class="col-md-12">
                                <label for="exampleInputEmail1">Paitent Contact : </label>
                                <input type="text" class="form-control" name="p_contact" id="p_contact" placeholder="Paitent Contact" maxlength="15"  />
                            </div>
                        </div> 
                        <div class="form-group clearfix">
                            <div class="col-md-12">
                                <label for="exampleInputEmail1">Paitent Emergency Contact Name : </label>
                                <input type="text" class="form-control" name="p_eme_contact_name" id="p_eme_contact_name" placeholder="Paitent Emergency Contact Name" maxlength="25"  />
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <div class="col-md-12">
                                <label for="exampleInputEmail1">Paitent Emergency Contact Number : </label>
                                <input type="text" class="form-control" name="p_eme_contact_num" id="p_eme_contact_num" placeholder="Paitent Emergency Contact Number" maxlength="15"  />
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <div class="col-md-12">
                                <label for="exampleInputEmail1">Paitent Emergency Contact Relationship : </label>
                                <input type="text" class="form-control" name="p_eme_contact_rel" id="p_eme_contact_rel" placeholder="Paitent Emergency Contact Relationship" maxlength="15"  />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-primary" name="add_p" id="add_p" value="Add Paitent"/>
                            <a href="<?php echo base_url() . 'patient' ?>" class="btn btn-default"> Cancel </a>                            
                        </div>
                    </form>
                </div>
            </div>     
        </section>
    </div>
</div>