$(document).ready(function () {
    $("#add_dr_form").validate({
        rules: {
            firstname: {
                minlength: 2,
                maxlength: 20,
                required: true,
                pattern: '^[a-zA-Z \']+$'
            },
            username: {
                minlength: 2,
                maxlength: 10,
                required: true,
                // pattern:'^[a-zA-Z]+$'
            },
            password: {
                minlength: 6,
                maxlength: 15,
                required: true,
            },
            verify_password: {
                required: true,
                equalTo: "#password"
            },
            /*dr_email: {
                required: true,
                pattern: "^[_A-Za-z0-9-\\+]+(\\.[_A-Za-z0-9-]+)*@" + "[A-Za-z0-9-]+(\\.[A-Za-z0-9]+)*(\\.[A-Za-z]{2,})$"
            },*/
        },
        messages: {
            firstname: {
                required: "Please enter the First Name",
                minlength: "First Name name must be between 2 and 10 characters!",
                maxlength: "First Name Name must be between 2 and 10 characters!",
                pattern: "Please enter only alphabet characters,space or ' only"
            },
            username: {
                required: "Please enter the User Name",
                minlength: "Uset Name name must be between 2 and 10 characters!",
                maxlength: "User Name Name must be between 2 and 10 characters!",
                //pattern: "Please enter only alphabet characters"
            },
            password: {
                required: "Please enter the Password",
                minlength: "Password must be between 6 and 15 characters!",
                maxlength: "Password must be between 6 and 15 characters!",
            },
            verify_password: {
                equalTo: "Your password is not matched.",
                required: "Please enter confirm password"
            },
            /*dr_email: {
                required: "Please enter the email address",
                pattern: "Please enter valid email address"
            },*/
        }
    });

    $('#add_dr').click(function () {
        if ($('#mail_err').text() == "UserName already exist")
        {
            $('#username').focus();
            return false;
        }

    });

    $('#username').blur(function () {
        if ($('#username').val() !== "")
        {
            $.ajax({
                url: SITE_URL+"doctor/chk_username",
                type: "POST",
                dataType : 'json',
                data: {id: this.value},
                success: function (data) {
                    if (data == 'UserName already exist')
                    {
                        $(this).focus();
                        $('#mail_err').show();
                        $('#mail_err').addClass('error');
                        $('#mail_err').text(data);
                        return false;
                    }
                    else
                    {
                        $('#mail_err').removeClass('error');
                        $('#mail_err').text('');
                        $('#mail_err').hide();
                    }
                }
            });
        }
    });

});