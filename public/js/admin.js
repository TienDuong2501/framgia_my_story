//-----------------------js trang index-------------------
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function () {
    var baseUrl = window.location.origin;
    $('#notification').hide();
    $('.deactive').on('click', function (e) {
        e.preventDefault();
        var id = $(this).attr('data');
        var url = $(this).data('url');
        if (confirm('Do you really want to deactive this user?')) {
            $.post(url, {
                id: id
            }, function (data) {
                $('tr#' + id).remove();
                $('#notification').html(function load_notifi() {
                    $.notify('Deactive successfully', "success");
                });
            });
        }
    });
    $(".search_for").autocomplete({
        source: baseUrl + '/admin/search'
    });
    $(".edit").on('click', function (e) {
        e.preventDefault();
        var id = $(this).attr('data');
        var url = $(this).data('url');
        $.get(url, {
            id: id
        }, function (data) {
            $('#frm-update').find('#role').val(data.role);
            $('#frm-update').find('#id').val(data.id);
            $('.btn_update').attr('data', id);
            $('#student-update').modal('show');
        });

    });

    $('#frm-update').on('submit', function (e) {
        e.preventDefault();
        var role = $('#role').val();
        var id = $('.btn_update').attr('data');
        var url = $(this).attr('action');
        $.post(url, {
            role: role,
            id: id
        }, function (data) {
            $('td[value=' + data.id + ']').html(data.role);
            $('#student-update').modal('hide');
            $('#notification').html(function load_notifi() {
                $.notify('The user is edited Successfully', "success");
            })
        });
    });

})
//-------------------------js trang disable-----------------------
$(document).ready(function () {
    $('.active_user').on('click', function (e) {
        e.preventDefault();
        var id = $(this).attr('data');
        var url = $(this).data('url');
        if (confirm('Do you really want to active this user?')) {
            $.post(url, {
                id: id
            }, function (data) {
                $('tr#' + id).remove();
                $('#notification').html(function load_notifi() {
                    $.notify('Active Successfully', "success");
                });
            })
        }
    })
    $('.delete').on('click', function (e) {
        e.preventDefault();
        var id = $(this).attr('data');
        var url = $(this).data('url');
        if (confirm('DO you really want to delete this user?')) {
            $.post(url, {
                id: id
            }, function (data) {
                $('tr#' + id).remove();
                $('#notification').html(function load_notifi() {
                    $.notify(data.notificattion, "success");
                })
            })
        }
    })
})

//--------------------------post management---------------------------

$(document).ready(function () {
    $('.view_approved_post').on('click', function (e) {
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
            $('.disapproved').attr('data', id);
            $('#show-post').modal('show');
        });
    });

    $('.disapproved').on('click', function (e) {
        e.preventDefault();
        var url = $(this).data('url');
        var id = $(this).attr('data');
        $.post(url, {
            id: id
        }, function (data) {
            $('tr#' + id).remove();
            $('#notification').html(function load_notifi() {
                $.notify(data, "success");
            });
            $('#show-post').modal('hide');
        });
    });


    $('.delete_post').on('click', function (e) {
        e.preventDefault();
        var url = $(this).data('url');
        var id = $(this).attr('data');
        $.post(url, {
            id: id
        }, function (data) {
            console.log(data);
            $('tr#' + id).remove();
            $('#notification').html(function load_notifi() {
                $.notify(data, "success");
            });
        });
    });

});

$(document).ready(function () {
    $('.view_pending_post').on('click', function (e) {
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
            $('.approved').attr('data', id);
            $('.suggest').attr('data', id);
            $('#show-post').modal('show');
        });

        $('#cmt').hide();

    });
    $('.suggest').on('click', function (e) {
        e.preventDefault();
        $('#cmt').show();
    });

    $('.approved').on('click', function (e) {
        e.preventDefault();
        var url = $(this).data('url');
        var id = $(this).attr('data');
        $.post(url, {
            id: id
        }, function (data) {
            $('tr#' + id).remove();
            $('#notification').html(function load_notifi() {
                $.notify(data, "success");
            });
            $('#show-post').modal('hide');
        });
    });
});