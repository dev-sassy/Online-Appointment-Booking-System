<div class="left-side sticky-left-side">
    <!--logo and iconic logo start-->
    <div class="logo">
        <a href="<?php echo base_url() . $this->session->userdata('route_path') . '/dashboard'; ?>"><img src="<?php echo base_url(); ?>assets/images/HBMC LOGO.png" height="50px" alt=""></a>
    </div>

    <div class="logo-icon text-center">
        <a href="<?php echo base_url() . $this->session->userdata('route_path') . '/dashboard'; ?>"><img src="<?php echo base_url(); ?>assets/images/HBMC LOGO.png" height="50px" alt=""></a>
    </div>
    <!--logo and iconic logo end-->

    <div class="left-side-inner">

        <!-- visible to small devices only -->
        <div class="visible-xs hidden-sm hidden-md hidden-lg">
            <div class="media logged-user">
                <img alt="" src="<?php echo base_url(); ?>assets/images/pic_avatar.jpg" class="media-object">
                <div class="media-body">
                    <h4><a href="#"><?php echo $this->session->userdata('user_name'); ?></a></h4>
                    <span>"Hello There..."</span>
                </div>
            </div>

            <h5 class="left-nav-title">Account Information</h5>
            <ul class="nav nav-pills nav-stacked custom-nav">
<!--                <li><a href="#"><i class="fa fa-user"></i> <span>Profile</span></a></li>
                <li><a href="#"><i class="fa fa-cog"></i> <span>Settings</span></a></li>-->
                <li><a href="<?php echo base_url() . 'admin/logout' ?>"><i class="fa fa-sign-out"></i> <span>Sign Out</span></a></li>
            </ul>
        </div>

        <!--sidebar nav start-->
        <ul class="nav nav-pills nav-stacked custom-nav">
            <li><a href="<?php echo base_url() . $this->session->userdata('route_path') . '/dashboard'; ?>"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>

<!--            <li><a href="cms-add.php"><i class="fa fa-sign-in"></i> <span>CMS Page</span></a></li>-->

            <li class="menu-list"><a href=""><i class="fa fa-user"></i> <span> Doctor</span></a>
                <ul class="sub-menu-list">
                    <li><a href="<?php echo base_url() . 'doctor' ?>"> View All Doctor</a></li>
                    <?php if ($this->session->userdata('route_path') == 'users/doctor') { ?>
                        <li><a href="<?php echo base_url() . 'doctor/add_doctor' ?>"> Add Doctor</a></li>
                    <?php } ?>
                </ul>
            </li>

            <li class="menu-list"><a href=""><i class="fa fa-user"></i> <span>Patient</span></a>
                <ul class="sub-menu-list">
                    <li><a href="<?php echo base_url() . 'patient' ?>"> View All Patient</a></li>
                    <li><a href="<?php echo base_url() . 'patient/add_patient' ?>"> Add Patient</a></li>
                </ul>
            </li>
            <?php if ($this->session->userdata('route_path') == 'users/doctor') { ?>
                <li class="menu-list"><a href=""><i class="fa fa-user"></i> <span>Admin Staff</span></a>
                    <ul class="sub-menu-list">
                        <li><a href="<?php echo base_url() . 'admin_staff' ?>"> View All Admin Staff</a></li>
                        <li><a href="<?php echo base_url() . 'admin_staff/add_admin_staff' ?>"> Add Admin Staff</a></li>
                    </ul>
                </li>
            <?php } ?>

            <li class="menu-list"><a href=""><i class="fa fa-user"></i> <span>Appointment</span></a>
                <ul class="sub-menu-list">
                    <li><a href="<?php echo base_url() . 'appointment' ?>"> View All Appointment</a></li>
                    <?php if ($this->session->userdata('route_path') == 'users/staff') { ?>
                        <li><a href="<?php echo base_url() . 'appointment/book_appointment' ?>"> Book Appointment</a></li>
                    <?php } ?>
                </ul>
            </li>

            <?php if ($this->session->userdata('route_path') == 'users/doctor') { ?>
                <li class="menu-list"><a href=""><i class="fa fa-user"></i> <span>Diagnosis Records</span></a>
                    <ul class="sub-menu-list">
                        <li><a href="<?php echo base_url() . 'patient/view_diagnois_record' ?>"> View Diagnosis Records</a></li>
                    </ul>
                </li>
                <li class="menu-list"><a href=""><i class="fa fa-user"></i> <span>CMS Pages</span></a>
                    <ul class="sub-menu-list">
                        <li><a href="<?php echo base_url() . 'cms' ?>"> View All CMS PAges</a></li>
                        <li><a href="<?php echo base_url() . 'cms/addEdit' ?>"> Add CMS Pages</a></li>
                    </ul>
                </li>
                <li class="menu-list"><a href=""><i class="fa fa-laptop"></i> <span> Reports </span></a>
                    <ul class="sub-menu-list">
                        <li><a href="<?php echo base_url() . 'reports/patient_summary' ?>"> Patient Summary</a></li>
                        <li><a href="<?php echo base_url() . 'reports/appointment_summary' ?>"> Appointment Summary</a></li>
                    </ul>
                </li>
            <?php } ?>



        </ul>
        <!--sidebar nav end-->

    </div>
</div>