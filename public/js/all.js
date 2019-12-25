$(document).on('click', '.ticket_add_page', function () {
    page = parseInt($(this).data('page'));
    url =  $(this).data('url') ;
    page = page + 1;
    $(this).data('page', page);
    $.ajax({
        type: "get",


        url: url + '?page=' + page,

        dataType: 'json',
        success: function (msg) {
            $('.tbodi_table').append(msg['body']['body'])
            if (msg['body']['page_hide'] == 1) {
                $('.ticket_add_page').hide();
            }
        },
        error: function (xml, error) {
            console.log(error);
        }
    });
});