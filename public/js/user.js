$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function () {
    $('.view_post').on('click', function (e) {
        e.preventDefault();
        var id = $(this).attr('data');
        var url = $(this).data('url');
        $.get(url, {
            id: id
        }, function (data) {
            $('.modal-title').html(data.title);
            $('.created_at').html(data.created_at);
            $('.post_image').attr('src', data.image);
            $('.body_post').html(data.body);
            $('#show-post').modal('show')
        });
    });

    var baseUrl = window.location.origin;

    $('.search_for').autocomplete({
        source: baseUrl + '/search'
    });
    
    tinymce.init({
        selector: 'textarea',
        menubar: false
    });

    //------------edit post-------------

    $('.edit_post').on('click', function (e) {
        e.preventDefault();
        var id = $(this).attr('data');
        var url = $(this).data('url');
        $.get(url, {
            id: id
        }, function (data) {
            $('#frm-Edit').find('#title').val(data.title);
            $('#frm-Edit').find('#sumary').val(data.brief);
            $('#body').html(data.body);
            var editor = tinymce.get('body'); // use your own editor id here - equals the id of your textarea
            var content = editor.getContent();
            editor.setContent(data.body);
            $('#edit-post').modal('show');

            $('#frm-Edit').on('submit', function (e) {
                e.preventDefault();
                var title = $('#title').val();
                var sumary = $('#sumary').val();
                var body = $('#body').val();
                var image = $('#image').val();
                var hiddenImage = data.image;
                var url = $(this).attr('action');
                $.post(url, {
                    title: title,
                    id: id,
                    sumary: sumary,
                    image: image,
                    body: body,
                    hiddenImage: hiddenImage,
                }, function (data) {
                    console.log(data);
                });
            });
        });


    });

    //-------------------delete-------------------------

    $('.delete_post').on('click', function (e) {
        e.preventDefault();
        var id = $(this).attr('data');
        var url = $(this).data('url');
        if (confirm('Do you really want to delete this post?')) {
            $.post(url, {
                id: id
            }, function (data) {
                $('tr#' + id).remove();
                $('#notification').html(function load_notifi() {
                    $.notify(data, "success");
                });
            });
        }
    });

});


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