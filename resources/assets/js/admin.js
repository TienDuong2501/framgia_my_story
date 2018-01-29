//-----------------------js trang index-------------------
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function () {
    var baseUrl = window.location.origin;
    $('#notification').hide();
    $('.deactive').on( 'click', function (e) {
        e.preventDefault();
        var id = $(this).attr('data');
        var url = $(this).data('url');
        if (confirm( 'Do you really want to deactive this user?' )) {
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
        source: baseUrl+'/admin/search'
    });
    $(".edit").on('click', function (e) {
        e.preventDefault();
        var id = $(this).attr('data');
        var url = $(this).data('url');
        $.get(url, {
            id: id
        }, function (data) {
            $('#frm-update').find('#role').val(data.role)
            $('#frm-update').find('#id').val(data.id)
            $('#student-update').modal('show')
        });
    });
    $('#frm-update').on('submit', function (e) {
        e.preventDefault();
        var data = $(this).serialize();
        var url = $(this).attr('action');
        $.post(url, data, function (data) {
            $('td[value=' + data.id + ']').html(data.role);
            $('#student-update').modal('hide')
        })
    })
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
                })
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
