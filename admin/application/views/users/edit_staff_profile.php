<div class="row">
    <div class="col-md-12">
        <section class="panel">
            <header class="panel-heading">
                Edit Profile
            </header>
            <div class="panel-body">
                <div class="col-md-6">
                    <?php
                    echo $this->session->flashdata('error_message');

                    $attributes = array('id' => 'add_asd_form', 'role' => 'form', 'class' => 'cmxform form-horizontal adminex-form');
                    $hidden_as_id = array('a_id' => $asd[0]['as_id']);
                    echo form_open('users/staff/edit_profile', $attributes, $hidden_as_id);

                    $firstname_field = array(
                        'name' => 'firstname',
                        'id' => 'firstname',
                        'value' => $asd[0]['as_fname'],
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
                        'value' => $asd[0]['as_lname'],
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
                        'value' => $asd[0]['as_username'],
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


                    <?php
                    $udpate_as_btn = array(
                        'name' => 'update_asd',
                        'id' => 'update_asd',
                        'value' => 'Update',
                        'class' => 'btn btn-primary'
                    );
                    ?>
                    <div class="form-group col-md-12">                        
                        <?php echo form_submit($udpate_as_btn); ?>     
                        <a href="<?php echo base_url() . 'admin_staff' ?>" class="btn btn-default"> Cancel </a>                            
                    </div>

                    <?php echo form_close(); ?>
                </div>
            </div>
        </section>
    </div>
</div>