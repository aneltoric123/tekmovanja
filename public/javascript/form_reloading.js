$(document).ready(function() {

    $('#createCategoryForm').submit(function(e) {
        e.preventDefault();

        var formData = $(this).serialize();


        $.ajax({
            type: 'POST',
            url: '/category_create',
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
