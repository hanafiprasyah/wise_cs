$(function() {
    $.validator.setDefaults({
        submitHandler: function() {
            alert("Form successful submitted!");
        }
    });
    $('#validateForm').validate({
        rules: {
            username: {
                required: true,
                username: true,
            },
            password: {
                required: true,
                minlength: 4
            },
        },
        messages: {
            username: {
                required: "Please enter your username!",
                email: "Please enter a vaild username!"
            },
            password: {
                required: "Please provide a password!",
                minlength: "Your password must be at least 4 characters long!"
            },
        },
        errorElement: 'span',
        errorPlacement: function(error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });
});