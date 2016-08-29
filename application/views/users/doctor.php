<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
<script src="<?php echo base_url(); ?>assets/js/jquery-2.1.3.js" ></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" ></script>

<div class="login-body">
    <?php if ($status !== '') { ?>
        <div style="margin-bottom: 0;" class="alert alert-success" id="edit_succ">
            <h6> <?php echo $status; ?> </h6>
        </div>
    <?php } ?>

    <div class="container">
        <form id="login_form" role="form" class="form-signin" method="post">

            <div class="form-signin-heading text-center">
                <h1 class="sign-title">Doctor Sign In</h1>
                <img alt="" src="<?php echo base_url() ?>assets/images/logo.png">
            </div>

            <div class="login-wrap">
                <input type="text" id="signin_id" name="username" autofocus="" placeholder="User ID" class="form-control">
                <input type="password" id="signin_password" name="password" placeholder="Password" class="form-control">

                <button type="submit" value="Login" id="chk_login" name="chk_login" class="btn btn-lg btn-login btn-block">
                    <i class="fa fa-check"></i>
                </button>

<!--                <label class="checkbox">
                    <span class="pull-right">
                        <a href="#myModal" data-toggle="modal"> Forgot Password?</a>
                    </span>
                </label>-->
            </div>
        </form>
    </div>

    <!-- Modal -->
    <form id="forgetpasswordForm" role="form" class="form-signin" method="post" 
          action="<?php echo base_url() . $this->session->userdata("route_path"); ?>/forgot_password">
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">X</button>
                        <h4 class="modal-title">Forgot Password ?</h4>
                    </div>
                    
                    <div class="modal-body">
                        <p>Enter your e-mail address below to reset your password.</p>
                        <input type="email" class="form-control placeholder-no-fix" 
                               name="forget_email" id="forget_email"
                               value="" autocomplete="off" placeholder="Email" required />
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- modal -->
    
</div>