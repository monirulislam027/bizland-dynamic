$(document).ready(function () {

    const baseURL = "http://bizland-dynamic.test/";

    $('#hero-form').on('submit', function (e) {

        e.preventDefault();

        let hero_title = $('#title');
        let sub_title = $('#sub_title');
        let hero_link1_text = $('#hero_link1_text');
        let hero_link1_url = $('#hero_link1_url');
        let hero_link2_text = $('#hero_link2_text');
        let hero_link2_url = $('#hero_link2_url');

        if (hero_title.val() == '') {
            hero_title.addClass('is-invalid');
        } else {
            hero_title.removeClass('is-invalid');
        }
        if (sub_title.val() == '') {
            sub_title.addClass('is-invalid');
        } else {
            sub_title.removeClass('is-invalid');
        }
        if (hero_link1_text.val() == '') {
            hero_link1_text.addClass('is-invalid');
        } else {
            hero_link1_text.removeClass('is-invalid');
        }
        if (hero_link1_url.val() == '') {
            hero_link1_url.addClass('is-invalid');
        } else {
            hero_link1_url.removeClass('is-invalid');
        }
        if (hero_link2_text.val() == '') {
            hero_link2_text.addClass('is-invalid');
        } else {
            hero_link2_text.removeClass('is-invalid');
        }
        if (hero_link2_url.val() == '') {
            hero_link2_url.addClass('is-invalid');
        } else {
            hero_link2_url.removeClass('is-invalid');
        }

        if (hero_title.val() != '' && sub_title.val() != '' && hero_link1_text.val() != '' && hero_link1_url.val() != '' && hero_link2_text.val() != '' && hero_link2_url.val() != '') {
            $('#about-us-form-btn').html('Loading...').attr('disabled', true);

            $.ajax({
                url: baseURL + "admin/action/admin_action.php",
                method: 'post',
                data: $(this).serialize() + "&action=about_us",
                success: function (response) {

                    if (!response.error) {
                        if (response.rdr) {
                            setTimeout(function () {
                                window.location = response.rdr_url;
                            }, 2000);
                        }
                        Swal.fire({
                            icon: 'success',
                            title: 'success',
                            text: response.message
                        });
                        $('#about-us-form-btn').html('Save').attr('disabled', false);
                    } else {
                        $('#about-us-form-btn').html('Save').attr('disabled', false);
                    }

                },
                error: function (response) {
                    console.log('error')
                }

            });
        }

    });


});