<div class="row">
    <div class="col-md-12">
        <section class="panel">
            <header class="panel-heading">
                Add Doctor
            </header>
            <div class="panel-body">
                <div class="col-md-6">                    
                    <?php
                    echo $this->session->flashdata('error_message');
                    $attributes = array('id' => 'add_dr_form', 'role' => 'form', 'class' => 'cmxform form-horizontal adminex-form', 'enctype' => 'multipart/form-data');
                    echo form_open('doctor/add_doctor', $attributes);

                    $firstname_field = array(
                        'name' => 'firstname',
                        'id' => 'firstname',
                        'value' => '',
                        'maxlength' => '20',
                        'class' => 'form-control',
                        'placeholder' => 'First Name'
                    );
                    ?>
                    <div class="form-group clearfix">
                        <div class="col-md-12">
                            <?php echo form_label('First Name :', 'firstname'); ?>
                            <?php echo form_input($firstname_field); ?>
                        </div>
                    </div>

                    <?php
                    $username_field = array(
                        'name' => 'username',
                        'id' => 'username',
                        'value' => 'DRS' . $next_user_id,
                        'class' => 'form-control',
                        'placeholder' => 'User Name',
                        'readonly' => 'true'
                    );
                    ?>
                    <div class="form-group clearfix">
                        <div class="col-md-12">
                            <?php echo form_label('User Name :', 'username'); ?>
                            <?php echo form_input($username_field); ?>
                            <?php echo form_label('', 'mail_err'); ?>
                        </div>
                    </div>

                    <?php
                    $password_field = array(
                        'name' => 'password',
                        'id' => 'password',
                        'value' => '',
                        'maxlength' => '15',
                        'class' => 'form-control',
                        'placeholder' => 'Password'
                    );
                    ?>
                    <div class="form-group clearfix">
                        <div class="col-md-12">
                            <?php echo form_label('Password :', 'password'); ?>
                            <?php echo form_password($password_field); ?>                            
                        </div>
                    </div>

                    <?php
                    $confirm_password_field = array(
                        'name' => 'verify_password',
                        'id' => 'verify_password',
                        'value' => '',
                        'maxlength' => '15',
                        'class' => 'form-control',
                        'placeholder' => 'Verify Password'
                    );
                    ?>
                    <div class="form-group clearfix">
                        <div class="col-md-12">
                            <?php echo form_label('Verify Password :', 'verify_password'); ?>
                            <?php echo form_password($confirm_password_field); ?>
                        </div>
                    </div>
                    
                    <div class="form-group clearfix">
                        <div class="col-md-12">
                            <label>Doctor Pic</label>
                            <input type="file" name="userfile" id="userfile" size="20" class="form-control" />
                        </div>
                    </div>
                    
                    <?php
                    $doctor_email_field = array(
                        'name' => 'dr_email',
                        'id' => 'dr_email',
                        'value' => '',
                        'class' => 'form-control',
                        'placeholder' => 'Doctor Email'
                    );
                    ?>
                    <div class="form-group clearfix">
                        <div class="col-md-12">
                            <?php //echo form_label('Doctor Email :', 'dr_email'); ?>
                            <?php //echo form_input($doctor_email_field); ?>                            
                        </div>
                    </div>

                    <?php
                    $add_doctor_btn = array(
                        'name' => 'add_dr',
                        'id' => 'add_dr',
                        'value' => 'Add Doctor',
                        'class' => 'btn btn-primary'
                    );
                    ?>
                    <div class="form-group col-md-12">                        
                        <?php echo form_submit($add_doctor_btn); ?>     
                        <a href="<?php echo base_url() . 'doctor' ?>" class="btn btn-default"> Cancel </a>                            
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </section>
    </div>
</div>    
