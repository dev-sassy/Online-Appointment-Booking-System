<div class="row">
    <div class="col-md-12">
        <section class="panel">
            <header class="panel-heading">
                Book Appointment
            </header>
            <div class="panel-body">
                <div class="col-md-6">    
                    <form class="cmxform form-horizontal adminex-form" method="post" id="book_app_form">
                        <div class="form-group clearfix">
                            <div class="col-md-6">
                                <label>Doctor</label>
                                <select id="dr_list" name="dr_list" class="form-control m-bot15" onblur="chk_for_appointment()">
                                    <option disabled selected>Select Doctor</option>
                                    <?php
                                    if ($dr_count >= 1) {
                                        foreach ($dr_list as $dr_name) {
                                            ?>
                                            <option value="<?php echo $dr_name->dr_id; ?>"><?php echo 'Dr. ' . $dr_name->dr_name . ' / ' . $dr_name->dr_username; ?></option>
                                        <?php
                                        }
                                    }
                                    ?>
                                </select>    
                            </div>
                            <div class="col-md-6">
                                <label>Appointment Date</label>
                                <input type="text" name="app_date" id="app_date"  class="form-control" placeholder="Select Appointment Date" onblur="chk_for_appointment()" />  
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <div class="col-md-6">
                                <label>Patient</label>
                                <select id="p_list" name="p_list" class="form-control m-bot15">
                                    <option disabled selected>Select Patient</option>
                                    <?php
                                    if ($p_count >= 1) {
                                        foreach ($p_list as $p_name) {
                                            ?>
                                            <option value="<?php echo $p_name->p_id; ?>"><?php echo $p_name->p_fname . ' ' . $p_name->p_lname; ?></option>
                                        <?php
                                        }
                                    }
                                    ?>
                                </select>    
                            </div>
                            <div class="col-md-6">
                                <label>Appointment Time</label>
                                <select class="form-control m-bot15" id="app_time" name="app_time" disabled required>
                                    <option disabled selected value="Select Time">Select Time</option>
                                    <option value="08:00:00">8:00 To 9:00</option>
                                    <option value="09:00:00">9:00 To 10:00</option>
                                    <option value="10:00:00">10:00 To 11:00</option>
                                    <option value="11:00:00">11:00 To 12:00</option>
                                    <option value="12:00:00">12:00 To 1:00</option>
                                    <option value="01:00:00">1:00 To 2:00</option>
                                    <option value="02:00:00">2:00 To 3:00</option>
                                    <option value="03:00:00">3:00 To 4:00</option>
                                    <option value="04:00:00">4:00 To 5:00</option>
                                </select>  
                            </div>
                        </div>

                        <div class="form-group col-md-12">                        
                            <input type="submit" name="book_app" id="book_app" value="Book" class="btn btn-primary" />     
                            <a href="<?php echo base_url() . 'appointment' ?>" class="btn btn-default"> Cancel </a>                            
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>    
