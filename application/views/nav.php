
<div class="left-side sticky-left-side">

    <!--logo and iconic logo start-->
    <div class="logo">
        <a href="index.php"><img src="<?php echo base_url(); ?>assets/images/logo.png" alt=""></a>
    </div>

    <div class="logo-icon text-center">
        <a href="index.php"><img src="<?php echo base_url(); ?>assets/images/logo_icon.png" alt=""></a>
    </div>
    <!--logo and iconic logo end-->

    <div class="left-side-inner">

        <!-- visible to small devices only -->
        <div class="visible-xs hidden-sm hidden-md hidden-lg">
            <div class="media logged-user">
                <img alt="" src="<?php echo base_url(); ?>assets/images/photos/user-avatar.png" class="media-object">
                <div class="media-body">
                    <h4><a href="#"><?php echo $this->session->userdata('user_name'); ?></a></h4>
                    <span>"Hello There..."</span>
                </div>
            </div>

            <h5 class="left-nav-title">Account Information</h5>
            <ul class="nav nav-pills nav-stacked custom-nav">
                <li><a href="#"><i class="fa fa-user"></i> <span>Profile</span></a></li>
                <li><a href="#"><i class="fa fa-cog"></i> <span>Settings</span></a></li>
                <li><a href="<?php echo base_url().'admin/logout' ?>"><i class="fa fa-sign-out"></i> <span>Sign Out</span></a></li>
            </ul>
        </div>

        <!--sidebar nav start-->
        <ul class="nav nav-pills nav-stacked custom-nav">
            <li><a href=""><i class="fa fa-home"></i> <span>Dashboard</span></a></li>

<!--            <li><a href="cms-add.php"><i class="fa fa-sign-in"></i> <span>CMS Page</span></a></li>-->

            <li class="menu-list"><a href=""><i class="fa fa-user"></i> <span> Doctor</span></a>
                <ul class="sub-menu-list">
                    <li><a href="<?php echo base_url().'doctor' ?>"> View All Doctor</a></li>
                    <li><a href="<?php echo base_url().'doctor/add_doctor' ?>"> Add Doctor</a></li>
                </ul>
            </li>

            <li class="menu-list"><a href=""><i class="fa fa-archive"></i> <span> Categories</span></a>
                <ul class="sub-menu-list">
                    <li><a href="categories-view.php"> View All Categories</a></li>
                    <li><a href=""> Edit Categories</a></li>
                </ul>
            </li>


            <li class="menu-list"><a href=""><i class="fa fa-laptop"></i> <span> Training Details</span></a>
                <ul class="sub-menu-list">
                    <li><a href="training-view.php"> View All Training Details</a></li>
                    <li><a href=""> Edit Training Details</a></li>
                </ul>
            </li>


            <li class="menu-list"><a href=""><i class="fa fa-laptop"></i> <span> Events Details</span></a>
                <ul class="sub-menu-list">
                    <li><a href="event-view.php"> View All Events Details</a></li>
                    <li><a href=""> Edit Events Details</a></li>
                </ul>
            </li>


            <li class="menu-list"><a href=""><i class="fa fa-cloud-download"></i> <span>Drop box</span></a>
                <ul class="sub-menu-list">
                    <li><a href="downloder-add.php"> Upload & Share</a></li>
                    <li><a href="emailer-add.php"> Edit Emailer</a></li>
                </ul>
            </li>


            <li class="menu-list"><a href=""><i class="fa fa-laptop"></i> <span> Resumes</span></a>
                <ul class="sub-menu-list">
                    <li><a href="resumes-view.php"> View All Resumes</a></li>
                </ul>
            </li>


<!-- <li class="menu-list"><a href=""><i class="fa fa-envelope"></i> <span> Emailers</span></a>
<ul class="sub-menu-list">
<li><a href=""> View All Emailers</a></li>
<li><a href=""> Edit Emailers</a></li>
</ul>
</li>-->


            <li class="menu-list"><a href=""><i class="fa fa-comments"></i> <span> Contact Enquiry</span></a>
                <ul class="sub-menu-list">
                    <li><a href="contact-enquires-view.php"> View All Contact Enquires</a></li>
                    <!--<li><a href=""> Edit Contact Enquiry</a></li>-->
                </ul>
            </li>


            <li class="menu-list"><a href=""><i class="fa fa-ticket"></i> <span> Testimonials</span></a>
                <ul class="sub-menu-list">
                    <li><a href="testimonial-view.php"> View All Testimonials</a></li>
                    <li><a href=""> Edit Testimonials</a></li>
                </ul>
            </li>


            <li class="menu-list"><a href=""><i class="fa fa-laptop"></i> <span> Sliders</span></a>
                <ul class="sub-menu-list">
                    <li><a href="slider-view.php"> View All Sliders</a></li>
                    <li><a href=""> Edit Sliders</a></li>
                </ul>
            </li>


        </ul>
        <!--sidebar nav end-->

    </div>
</div>