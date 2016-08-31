
<div class="row">
    <aside class="col-md-3">
        <h4 class="drg-event-title"> Doctor Filtering</h4>
        <div id='external-events'>
            <?php if ($this->session->userdata('route_path') != 'users/doctor') { ?>
                <form name="search_doc" method="post" class="cmxform form-horizontal adminex-form">
                    <div class="form-group clearfix">
                        <div class="col-md-12">
                            <label>Search For Doctor Wise Appointment</label>
                            <select id="dr_list" name="dr_list" class="form-control m-bot15" onchange="fetch_data()">
                                <option value="" selected>Select Doctor</option>
                                <?php
                                if ($dr_count >= 1) {
                                    foreach ($dr_list as $dr_name) {
                                        if ($selected_doc && $dr_name->dr_id == $selected_doc['doc']) {
                                            ?>
                                            <option value="<?php echo $dr_name->dr_id; ?>" selected><?php echo 'Dr. ' . $dr_name->dr_name . ' / ' . $dr_name->dr_username; ?></option>
                                        <?php } else {
                                            ?>
                                            <option value="<?php echo $dr_name->dr_id; ?>"><?php echo 'Dr. ' . $dr_name->dr_name . ' / ' . $dr_name->dr_username; ?></option>
                                            <?php
                                        }
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <!--                    <div class="form-group col-md-12">                        
                                            <input type="submit" name="search" value="Find" class="btn btn-primary" />
                                            <input type="submit" name="reset" value="Reset" class="btn btn-primary" />
                                        </div>-->
                </form>
            <?php } ?>
            <div class="disp">
                
            </div>

        </div>
    </aside>

    <aside class="col-md-9">
        <section class="panel">
            <div id="calendar" ></div>
        </section>
    </aside>

</div>