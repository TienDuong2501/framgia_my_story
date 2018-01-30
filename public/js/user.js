$(document).on('click', '.pagination a', function (e) {
    e.preventDefault();
    var page = $(this).attr('href').split('page=')[1];
    getPost(page);
});

function getPost(page) {
    $.ajax({
        url: '/paginate?page=' + page,

    }).done(function (data) {
        $('.grids').html(data);
        location.hash = page;
    });
}
