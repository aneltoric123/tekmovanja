$(document).ready(function() {
    $('.save-edit').on('click', function() {
        var categoryId = $(this).data('category-id');
        var newName = $('.category-name[data-category-id="' + categoryId + '"]').text();

        $.ajax({
            type: 'POST',
            url: '/category_update/' + categoryId,
            data: { newName: newName, _token: '{{ csrf_token() }}' },
            success: function(response) {
                console.log(response); // Log the server response
                // Add logic to handle the successful update
            },
            error: function(xhr, status, error) {
                console.error(error); // Log any errors
            }
        });
    });
});
