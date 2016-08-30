
<div class="row">
    <aside class="col-md-3">
        <h4 class="drg-event-title"> Draggable Events</h4>
        <div id='external-events'>
            <form class="cmxform form-horizontal adminex-form">
                <div class="form-group clearfix">
                    <div class="col-md-12">
                        <label>Search For Doctor Wise Appointment</label>
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
                </div>
                <div class="form-group col-md-12">                        
                    <input type="submit" name="search" value="Find" class="btn btn-primary" />
                    <a href="" class="btn btn-default"> Reset </a>
                </div>
            </form>
        </div>
    </aside>

    <aside class="col-md-9">
        <section class="panel">
            <div id="calendar" class="has-toolbar"></div>
        </section>
    </aside>

</div>