$(document).ready(function() {

    $('.delete-button').submit(function(e) {
        e.preventDefault();

        var categoryID = $(this).data('category-id');

        $.ajax({
            type: 'DELETE',
            url: '/category_delete/'+categoryID,
            data:{
                 _token: '{{ csrf_token() }}',
            id: categoryID
        },
            success: function(response) {

                $('#content').html(response);
            },
            error: function(xhr, status, error) {

                console.error(error);
            }
        });
    });
});
