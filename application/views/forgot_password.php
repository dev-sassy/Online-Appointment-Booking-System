<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">

<div class="login-body">
    <div class="container">
        <form id="login_form" role="form" style="max-width: 100%;" class="form-signin" method="post">
            <div class="form-signin-heading text-center">
                <h1 class="sign-title">Forgot Password</h1>                

                <?php if ($status !== '') { ?>
                    <div style="margin-bottom: 0;" class="alert alert-success" id="edit_succ">
                        <h5> <?php echo $status; ?> </h5>
                    </div>
                <?php } ?>
            </div>            
        </form>
    </div>    
</div>