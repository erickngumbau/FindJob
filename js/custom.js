$(document).ready(function () {

    $('.applicantform').click(function (e) {
        e.preventDefault();
        $.get('../site/applicantform', function (data) {
            $('#applicantform').modal('show')
                .find('#applicantformContent')
                .html(data);
        });
    });

});





