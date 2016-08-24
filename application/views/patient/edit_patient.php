<div class="row">
    <div class="col-md-12">
        <section class="panel">
            <header class="panel-heading">
                Edit Patient
            </header>
            <div class="panel-body">
                <div class="col-md-6">
                    <?php
                    echo $this->session->flashdata('error_message');

                    $attributes = array('id' => 'edit_p_form', 'role' => 'form', 'class' => 'cmxform form-horizontal adminex-form');
                    $hidden_patient_id = array('patient_id' => $p_edit[0]['patient_id']);
                    echo form_open('patient/edit_patient', $attributes, $hidden_patient_id);

                    $firstname_field = array(
                        'name' => 'firstname',
                        'id' => 'firstname',
                        'value' => $p_edit[0]['patient_fname'],
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
                    $lastname_field = array(
                        'name' => 'lastname',
                        'id' => 'lastname',
                        'value' => $p_edit[0]['patient_lname'],
                        'maxlength' => '20',
                        'class' => 'form-control',
                        'placeholder' => 'Last Name'
                    );
                    ?>
                    <div class="form-group clearfix">
                        <div class="col-md-12">
                            <?php echo form_label('Last Name :', 'lastname'); ?>
                            <?php echo form_input($lastname_field); ?>
                        </div>
                    </div>

                    <?php
                    $username_field = array(
                        'name' => 'username',
                        'id' => 'username',
                        'value' => $p_edit[0]['patient_username'],
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
                    $p_email_field = array(
                        'name' => 'p_email',
                        'id' => 'p_email',
                        'value' => $p_edit[0]['patient_email'],
                        'class' => 'form-control',
                        'placeholder' => 'Patient Email'
                    );
                    ?>
                    <div class="form-group clearfix">
                        <div class="col-md-12">
                            <?php echo form_label('Patient Email :', 'p_email'); ?>
                            <?php echo form_input($p_email_field); ?>                            
                        </div>
                    </div>

                    <?php
                    $p_address_field = array(
                        'name' => 'p_addr',
                        'id' => 'p_addr',
                        'value' => $p_edit[0]['patient_address'],
                        'class' => 'form-control',
                        'rows' => '3',
                        'minlength' => '10',
                        'maxlength' => '100',
                        'placeholder' => 'Patient Address'
                    );
                    ?>
                    <div class="form-group clearfix">
                        <div class="col-md-12">
                            <?php echo form_label('Patient Address :', 'p_addr'); ?>
                            <?php echo form_textarea($p_address_field); ?>                            
                        </div>
                    </div>

                    <?php
                    $p_contact_field = array(
                        'name' => 'p_contact',
                        'id' => 'p_contact',
                        'value' => $p_edit[0]['patient_contact'],
                        'class' => 'form-control',
                        'minlength' => '10',
                        'maxlength' => '10',
                        'number' => 'true',
                        'placeholder' => 'Patient Contact'
                    );
                    ?>
                    <div class="form-group clearfix">
                        <div class="col-md-12">
                            <?php echo form_label('Patient Contact:', 'p_addr'); ?>
                            <?php echo form_input($p_contact_field); ?>                            
                        </div>
                    </div>

                    <?php
                    $p_eme_contact_name_field = array(
                        'name' => 'p_eme_contact_name',
                        'id' => 'p_eme_contact_name',
                        'value' => $p_edit[0]['patient_emergency_c_name'],
                        'maxlength' => '20',
                        'class' => 'form-control',
                        'placeholder' => 'Patient Emergency Contact Name'
                    );
                    ?>
                    <div class="form-group clearfix">
                        <div class="col-md-12">
                            <?php echo form_label('Patient Emergency Contact Name :', 'p_eme_contact_name'); ?>
                            <?php echo form_input($p_eme_contact_name_field); ?>                            
                        </div>
                    </div>

                    <?php
                    $p_eme_contact_field = array(
                        'name' => 'p_eme_contact_num',
                        'id' => 'p_eme_contact_num',
                        'value' => $p_edit[0]['patient_emergency_c_number'],
                        'class' => 'form-control',
                        'minlength' => '10',
                        'maxlength' => '10',
                        'number' => 'true',
                        'placeholder' => 'Patient Emergency Contact Number'
                    );
                    ?>
                    <div class="form-group clearfix">
                        <div class="col-md-12">
                            <?php echo form_label('Patient Emergency Contact Number:', 'p_eme_contact_num'); ?>
                            <?php echo form_input($p_eme_contact_field); ?>                            
                        </div>
                    </div>

                    <?php
                    $p_eme_contact_rel_field = array(
                        'name' => 'p_eme_contact_rel',
                        'id' => 'p_eme_contact_rel',
                        'value' => $p_edit[0]['patient_emergency_c_relationship'],
                        'maxlength' => '20',
                        'class' => 'form-control',
                        'placeholder' => 'Patient Emergency Contact Relationship'
                    );
                    ?>
                    <div class="form-group clearfix">
                        <div class="col-md-12">
                            <?php echo form_label('Patient Emergency Contact Relationship:', 'p_eme_contact_rel'); ?>
                            <?php echo form_input($p_eme_contact_rel_field); ?>                            
                        </div>
                    </div>                    

                    <?php
                    $udpate_patient_btn = array(
                        'name' => 'update_p',
                        'id' => 'update_p',
                        'value' => 'Update',
                        'class' => 'btn btn-primary'
                    );
                    ?>
                    <div class="form-group col-md-12">                        
                        <?php echo form_submit($udpate_patient_btn); ?>     
                        <a href="<?php echo base_url() . 'patient' ?>" class="btn btn-default"> Cancel </a>                            
                    </div>                    
                    <?php echo form_close(); ?>
                </div>
            </div>
        </section>
    </div>
</div>