$(document).ready(function () {
    $("#cmsEditForme").validate({
        rules: {
            page_title: {
                minlength: 2,
                maxlength: 20,
                required: true,
                //pattern: '^[a-zA-Z \']+$'
            },
            page_metakeyword: {
                required: true,
            },
            page_metadesc: {
                required: true,
            },
            page_content: {
                required: true,
            }
        },
        messages: {
            page_title: {
                required: "Please enter the page title",
                minlength: "page title must be between 2 and 20 characters!",
                maxlength: "Page title must be between 2 and 20 characters!"
            },
            page_metakeyword: {
                required: "Please enter the page metakeyword",
            },
            page_metadesc: {
                required: "Please enter the page meta description"
            },
            page_content: {
                required: "Please enter confirm password"
            },
        }
    });

});