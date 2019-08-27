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
                    var tableContent = "<tr>" +
                        "<td>" + response.catId + "</td>" +
                        "<td>" + response.catTitle + "</td>" +
                        "<td><a href='categories.php?delete=" + response.catId + "'>Delete</a></td>" +
                        "<td><a href='categories.php?edit=" + response.catId + "'>Edit</a></td>" +
                        "</tr>";
                    $.each(response.tableData)
                    $('tbody#cat_table').append(tableContent);
                },
                error: function (error, status, responseMessage) {
                    $('form#add-category').find('.messages').empty().append('<div class="alert alert-danger" role="alert">' + error.responseJSON.message + "</div>");
                }
            })
        })
    })
})(jQuery);