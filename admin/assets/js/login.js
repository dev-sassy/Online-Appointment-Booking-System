$(document).ready(function () {
    $("#login_form").validate({
        rules: {
            username: {
                minlength: 2,
                maxlength: 10,
                required: true,
                pattern: '^[a-zA-Z]+$'
            },
            password: {
                minlength: 6,
                maxlength: 15,
                required: true,
            },
        },
        messages: {
            username: {
                required: "Please enter the User Name",
                minlength: "User Name name must be between 2 and 10 characters!",
                maxlength: "User Name Name must be between 2 and 10 characters!",
                pattern: "Please enter only alphabet characters"
            },
            password: {
                required: "Please enter the Password",
                minlength: "Password must be between 6 and 15 characters!",
                maxlength: "Password must be between 6 and 15 characters!",
            },
        }
    });
    
});