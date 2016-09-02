<div class="row">
    <div class="col-md-12">
        <section class="panel">
            <header class="panel-heading">
                Edit Doctor
            </header>
            <div class="panel-body">
                <div class="col-md-6">
                    <?php
                    echo $this->session->flashdata('error_message');

                    $attributes = array('id' => 'add_dr_form', 'role' => 'form', 'class' => 'cmxform form-horizontal adminex-form', 'enctype' => 'multipart/form-data');
                    $hidden_dr_id = array('dr_id' => $dr[0]['dr_id']);
                    echo form_open('doctor/edit_doctor', $attributes, $hidden_dr_id);
                    ?>

                    <?php
                    $firstname_field = array(
                        'name' => 'firstname',
                        'id' => 'firstname',
                        'value' => $dr[0]['dr_name'],
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
                        'value' => $dr[0]['dr_username'],
                        'class' => 'form-control',
                        'placeholder' => 'User Name',
                        'readonly' => 'true'
                    );
                    ?>
                    <div class="form-group clearfix">
                        <div class="col-md-12">
                            <?php echo form_label('User Name :', 'username'); ?>
                            <?php echo form_input($username_field); ?>
                        </div>
                    </div>

                    <div class="form-group clearfix">
                        <div class="col-md-12">
                            <label>Doctor Pic</label>
                            <img src="<?php echo base_url(); ?>assets/images/doctor_pic/<?php echo $dr[0]['dr_photo']; ?>" alt="No Image Found" class="slider-view-img" />
                            <input type="hidden" name="dr_pic_old" value="<?php echo $dr[0]['dr_photo']; ?>" />
                            <input type="file" name="userfile"  size="20" class="form-control valid" />
                        </div>
                    </div>

                    <?php
                    $doctor_email_field = array(
                        'name' => 'dr_email',
                        'id' => 'dr_email',
                        //'value' => $dr[0]['dr_email'],
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
                    $update_doctor_btn = array(
                        'name' => 'update_dr',
                        'id' => 'update_dr',
                        'value' => 'Update',
                        'class' => 'btn btn-primary'
                    );
                    ?>
                    <div class="form-group col-md-12">                        
                        <?php echo form_submit($update_doctor_btn); ?>     
                        <a href="<?php echo base_url() . 'doctor' ?>" class="btn btn-default"> Cancel </a>                            
                    </div>
                    <?php echo form_close(); ?>     
                </div>
            </div>
        </section>
    </div>
</div>

