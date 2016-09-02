$(document).ready(function () {
    $("#add_asd_form").validate({
        rules: {
            firstname: {
                minlength: 2,
                maxlength: 20,
                required: true,
                pattern: '^[a-zA-Z \']+$'
            },
            lastname: {
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
        },
        messages: {
            firstname: {
                required: "Please enter the First Name",
                minlength: "First Name name must be between 2 and 10 characters!",
                maxlength: "First Name Name must be between 2 and 10 characters!",
                pattern: "Please enter only alphabet characters or space"
            },
            lastname: {
                required: "Please enter the Last Name",
                minlength: "Last Name name must be between 2 and 10 characters!",
                maxlength: "Last Name Name must be between 2 and 10 characters!",
                pattern: "Please enter only alphabet characters or space"
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
        }
    });
});