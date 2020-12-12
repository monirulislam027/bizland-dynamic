$(document).ready(function () {

    const baseURL = "http://bizland-dynamic.test/";
    // register form validate

    $('#register_account_btn').on('click', function (e) {
        e.preventDefault();
        let name = $('#name');
        let email = $('#email');
        let password = $('#password');
        let confirm_password = $('#confirm_password');

        if (name.val() == '') {
            name.addClass('is-invalid');
        } else {
            name.removeClass('is-invalid');
        }

        if (email.val() == '') {
            email.addClass('is-invalid');
        } else {
            email.removeClass('is-invalid');
        }

        if (password.val() == '') {
            password.addClass('is-invalid');
        } else {
            password.removeClass('is-invalid');
        }

        if (confirm_password.val() == '') {
            confirm_password.addClass('is-invalid');
        } else {
            confirm_password.removeClass('is-invalid');
        }

        if (password.val() != '' && confirm_password.val() != '') {

            if (password.val() != confirm_password.val()) {
                $('#response-message').html(`<div class="alert alert-warning alert-dismissible fade show" role="alert">
                          Password didn't matched!;
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>`);

            } else {
                $('#response-message').remove('.alert');
            }


        }

        if (name.val() != '' && email.val() != '' && password.val() != '' && confirm_password.val() != '' && password.val() == confirm_password.val()) {

            $('#register_account_btn').html('Loading...').attr('disabled', true);

            $.ajax({
                url: baseURL + "admin/action/auth_action.php",
                method: 'post',
                data: $('#register_form').serialize() + "&action=register",
                success: function (response) {
                    $('#response-message').html(response.message);
                    if (!response.error) {
                        $('#register_account_btn').html('wait...');
                        setTimeout(function () {
                            window.location = response.rdr_url;
                        }, 2000);
                    } else {
                        $('#register_account_btn').html('Register').attr('disabled', false);
                    }

                },
                error: function (response) {
                    console.log('error')
                }

            });


        }

    });

    $('#login-form').on('submit', function (event) {

        event.preventDefault();

        let email = $('#email');
        let password = $('#password');

        if (email.val() == '') {
            email.addClass('is-invalid');
        } else {
            email.removeClass('is-invalid');
        }

        if (password.val() == '') {
            password.addClass('is-invalid');
        } else {
            password.removeClass('is-invalid');
        }

        if (email.val() != '' && password.val() != '') {
            $('#login-form-btn').html('Loading...').attr('disabled', true)
            $.ajax({
                url: baseURL + "admin/action/auth_action.php",
                method: 'post',
                data: $(this).serialize() + "&action=login",
                success: function (response) {
                    $('#response-message').html(response.message);
                    if (!response.error) {
                        if (response.rdr) {
                            $('#login-form-btn').html('Wait...');
                            setTimeout(function () {
                                window.location = response.rdr_url;
                            }, 2000);
                        }
                    } else {
                        $('#login-form-btn').html('Login').attr('disabled', false);
                    }

                },
                error: function (response) {
                    console.log('error')
                }

            });
        }


    });

    $('#forgot-password-form').on('submit' , function (event) {
        event.preventDefault();

        let email = $('#email');
        if (email.val() == ''){
            email.addClass('is-invalid');
        }else {
            email.removeClass('is-invalid');
        }

        if (email.val() != ''){
            $('#forgot-password-btn').html('Loading...').attr('disabled', true);
            $.ajax({
                url: baseURL + "admin/action/auth_action.php",
                method: 'post',
                data: $(this).serialize() + "&action=forgot-password",
                success: function (response) {
                    $('#response-message').html(response.message);
                    $('#forgot-password-btn').html('Request new password').attr('disabled', false);

                },
                error: function (response) {
                    console.log('error')
                }

            });


        }


    })

    $('#recover-password').on('submit' , function (event) {
        event.preventDefault();


        let password = $('#password');
        let con_password = $('#con_password');

        if (password.val() == ''){
            password.addClass('is-invalid');
        }else {
            password.removeClass('is-invalid');
        }

        if (con_password.val() == ''){
            con_password.addClass('is-invalid');
        }else {
            con_password.removeClass('is-invalid');
        }
        if (password.val() != '' && con_password.val() != '' && password.val() != con_password.val()){
            $('#response-message').html("Password didn't match!");
        }
        
        if (password.val() != '' && con_password.val() != '' && password.val() == con_password.val()){
            $('#recover-password-btn').html('Loading...').attr('disabled', true);
            $.ajax({
                url: baseURL + "admin/action/auth_action.php",
                method: 'post',
                data: $(this).serialize() + "&action=recover-password",
                success: function (response) {
                    $('#response-message').html(response.message);
                    if (!response.error){
                        $('#recover-password-btn').html('Wait....').attr('disabled', false);
                        if (response.rdr){
                            setTimeout(function () {
                                window.location = 'login.php'
                            } , 1000);
                        }
                    }else {
                        $('#recover-password-btn').html('Change password').attr('disabled', false);
                    }

                },
                error: function (response) {
                    console.log('error')
                }

            });


        }


    })



});