$(document).ready(function() {

    $('#delete_category_form').submit(function(e) {
        e.preventDefault();

        var formData = $(this).serialize();


        $.ajax({
            type: 'POST',
            url: '/category_delete',
            data: formData,
            success: function(response) {

                $('#content').html(response);
            },
            error: function(xhr, status, error) {

                console.error(error);
            }
        });
    });
});
