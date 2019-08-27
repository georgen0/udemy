(function ($) {

    // On submit add category, prevent default submit and add category via ajax.
    $(document).ready(function () {
        $('form#add-category').on('submit', function (e) {
            // Prevent default submit executed by browser.
            e.preventDefault();
            $.ajax({
                url: '/admin/categories_ajax.php',
                type: "POST",
                data: {
                    categoryName: $('input[name="cat-title"]').val(),
                },
                success: function (response, status, request) {
                    $('input[name="cat-title"]').val('');
                    $('form#add-category').find('.messages').empty().append('<div class="alert alert-success" role="alert">' + response.message + "</div>");
                    $('table#cat_table').append('')

                },
                error: function (error, status, responseMessage) {
                    $('form#add-category').find('.messages').empty().append('<div class="alert alert-danger" role="alert">' + error.responseJSON.message + "</div>");
                }
            })
        })
    })
})(jQuery);