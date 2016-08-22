<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">

<div class="login-body">

    <?php if ($isSuccess) { ?>
        <div style="margin-bottom: 0;" class="alert alert-success" id="edit_succ">
            <h6> 
                <?php echo $status; ?>  
                <span id="redirect_message"></span>
                <script>
                    var sec = 5;
                    redirectMessage();
                    var msgTimer = setInterval(function () {
                        redirectMessage();
                    }, 1000);
                    
                    function redirectMessage() {
                        document.getElementById("redirect_message").innerHTML =
                                " Redirected within (" + (sec--) + ") seconds";

                        if (sec === 0) {
                            stop();
                        }
                    }

                    function stop() {
                        clearInterval(msgTimer);
                        window.location = "<?php echo base_url(); ?>/users"
                    }


                </script>
            </h6>
        </div>
    <?php } ?>

    <div class="container">
        <form id="login_form" role="form" class="form-signin" method="post">

            <div class="form-signin-heading text-center">
                <h1 class="sign-title">RESET PASSWORD</h1>
                <img alt="" src="<?php echo base_url(); ?>assets/images/logo.png">
            </div>

            <div class="login-wrap">
                <input type="password" id="new_password" name="new_password" placeholder="New Password" class="form-control" />
                <input type="password" id="reenter_password" name="reenter_password" placeholder="Re-enter Password" class="form-control" />

                <button type="submit" value="Reset Password" name="reset_password" class="btn btn-lg btn-login btn-block">
                    <i class="fa fa-check"></i>
                </button>
            </div>
        </form>
    </div>    
</div>