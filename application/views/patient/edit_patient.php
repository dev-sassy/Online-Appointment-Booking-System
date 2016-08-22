<div class="row">
    <div class="col-md-12">
        <section class="panel">
            <header class="panel-heading">
                Edit Patient
            </header>
            <div class="panel-body">
                <div class="col-md-6">
                    <form method="post" id="add_p_form" role="form" class="cmxform form-horizontal adminex-form">
                        <div class="form-group clearfix">
                            <div class="col-md-12">
                                <label for="exampleInputEmail1">First Name : </label>
                                <input type="text" class="form-control" id="firstname" name="firstname" maxlength="25" value="<?php echo $p_edit[0]['patient_fname'] ?>"  placeholder="First Name" />                            
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <div class="col-md-12">
                                <label for="exampleInputEmail1">Last Name : </label>
                                <input type="text" class="form-control" name="lastname" id="lastname" value="<?php echo $p_edit[0]['patient_lname'] ?>" placeholder="Last Name" maxlength="25"  />
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <div class="col-md-12">
                                <label for="exampleInputEmail1">User Name : </label>
                                <input type="text" class="form-control" name="username" id="username" placeholder="User Name" value="<?php echo $p_edit[0]['patient_username'] ?>" maxlength="25" readonly  />
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <div class="col-md-12">
                                <label for="exampleInputEmail1">Paitent Email : </label>
                                <input type="text" class="form-control" name="p_email" id="p_email" placeholder="Paitent Email" value="<?php echo $p_edit[0]['patient_email'] ?>" maxlength="30"  />
                            </div>
                        </div> 
                        <div class="form-group clearfix">
                            <div class="col-md-12">
                                <label for="exampleInputEmail1">Paitent Address : </label>
                                <textarea class="form-control" name="p_addr" id="p_addr"><?php echo $p_edit[0]['patient_address'] ?></textarea>
                            </div>
                        </div> 
                        <div class="form-group clearfix">
                            <div class="col-md-12">
                                <label for="exampleInputEmail1">Paitent Contact : </label>
                                <input type="text" class="form-control" name="p_contact" id="p_contact" placeholder="Paitent Contact" value="<?php echo $p_edit[0]['patient_contact'] ?>" maxlength="15"  />
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <div class="col-md-12">
                                <label for="exampleInputEmail1">Paitent Emergency Contact Name : </label>
                                <input type="text" class="form-control" name="p_eme_contact_name" id="p_eme_contact_name" placeholder="Paitent Emergency Contact Name" value="<?php echo $p_edit[0]['patient_emergency_c_name'] ?>" maxlength="25"  />
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <div class="col-md-12">
                                <label for="exampleInputEmail1">Paitent Emergency Contact Number : </label>
                                <input type="text" class="form-control" name="p_eme_contact_num" id="p_eme_contact_num" placeholder="Paitent Emergency Contact Number" value="<?php echo $p_edit[0]['patient_emergency_c_number'] ?>" maxlength="15"  />
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <div class="col-md-12">
                                <label for="exampleInputEmail1">Paitent Emergency Contact Relationship : </label>
                                <input type="text" class="form-control" name="p_eme_contact_rel" id="p_eme_contact_rel" placeholder="Paitent Emergency Contact Relationship" value="<?php echo $p_edit[0]['patient_emergency_c_relationship'] ?>" maxlength="15"  />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-primary" name="update_p" id="update_p" value="Update"/>
                            <a href="<?php echo base_url() . 'patient' ?>" class="btn btn-default"> Cancel </a>                            
                        </div>

                    </form>
                </div>
            </div>
        </section>
    </div>
</div>

