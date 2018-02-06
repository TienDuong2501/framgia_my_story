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
            var editor = tinymce.get('body'); 
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

// ------------------------like post----------------------

$(document).ready(function (e) {
    $('.vote').on('click', function (e) {
        e.preventDefault();
        var id_post = $(this).attr('data');
        var url = $(this).data('url');
        var idUser = $(this).attr('userId');
        if (idUser) {
            $.post(url, {
                id: id_post
            }, function (data) {
                $('#count' + id_post).html('(' + data.count + ')');
                if (data.flag == '1') {
                    $('#' + id_post).attr('style', 'color:red');
                } else {
                    $('#' + id_post).attr('style', 'color:#3097D1');
                }

            });
        } else {
            $('#notification').html(function load_notifi() {
                $.notify('you must login before doing this requirement', "danger");
            });
        }
    });


    //--------------------comment-------------
    $('#btn_comment').on('click', function (e) {
        e.preventDefault();
        var post_id = $('#frm_comment').attr('data');
        var user_id = $('#frm_comment br').attr('userId');
        var comment = $('#content_comment').val();
        var count_comment = $('#count_comment' + post_id).html();
        var url = $('#frm_comment').attr('action');
        if (user_id) {
            if (comment) {
                $.post(url, {
                    post_id: post_id,
                    user_id: user_id,
                    comment: comment
                }, function (data) {
                    $('#result').append(data);
                    $('#content_comment').val('');
                    $('#count_comment' + post_id).html(parseInt(count_comment) + 1);
                    $('#notification').html(function load_notifi() {
                        $.notify('successfully', "success");
                    });

                });
            } else {
                $('#notification').html(function load_notifi() {
                    $.notify('please type your commment', "danger");
                });
            }


        } else {
            $('#notification').html(function load_notifi() {
                $.notify('you must login before doing this requirement', "danger");
            });
        }

    });

    $(".edit").on('click', function (e) {
        e.preventDefault();
        var id = $(this).attr('data');
        var url = $(this).data('url');
        var user_id = $(this).attr('user_id');
        var current_user = $(this).attr('current_user');
        if (parseInt(current_user) == parseInt(user_id)) {
            $.get(url, {
                id: id
            }, function (data) {
                $('#frm-update').find('#edit_comment').val(data.conment);
                $('#frm-update').find('#id').val(data.id);
                $('.btn_update').attr('data', id);
                $('#comment-update').modal('show');
            });
        } else {
            $('#notification').html(function load_notifi() {
                $.notify('you have no permission to do this requirement', "danger");
            });
        }


    });


    $('#frm-update').on('submit', function (e) {
        e.preventDefault();
        var comment = $('#edit_comment').val();
        var id = $('.btn_update').attr('data');
        var url = $(this).attr('action');
        $.post(url, {
            comment: comment,
            id: id
        }, function (data) {
            // $('td[value=' + data.id + ']').html(data.conment);
            $('#content_comment' + id).html(data.conment);
            $('#comment-update').modal('hide');
            $('#notification').html(function load_notifi() {
                $.notify('The comment is edited Successfully', "success");
            })
        });
    });


    $(".delete").on('click', function (e) {
        e.preventDefault();
        var id = $(this).attr('data');
        var url = $(this).data('url');
        var post_id = $(this).attr('post_id');
        var user_id = $(this).attr('user_id');
        var current_user = $(this).attr('current_user');
        if (parseInt(current_user) == parseInt(user_id)) {
            $.post(url, {
                id: id,
                post_id: post_id
            }, function (data) {
                $('#show_comment' + id).remove();
                $('#count_comment' + post_id).html(data.count_comment);
                $('#notification').html(function load_notifi() {
                    $.notify(data.notification, "success");
                })
            });
        } else {
            $('#notification').html(function load_notifi() {
                $.notify('you have no permission to do this requirement', "danger");
            });
        }


    });


});