<div class="modal fade" id="student-update" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">{{ trans('admin/user.Title_Edit_User') }}</h4>
            </div>
            {!! Form::open(['route' => 'edit-user', 'method' => 'post', 'id' => 'frm-update',
            'enctype' => 'multipart/form-data']) !!}
            <div class="modal-body">
                <div class="col-4-md">
                    <div class="form-group">
                        {!! Form::label('Role') !!}
                        {!! Form::hidden('id', null, ['class' => 'form-control', 'id' => 'id']) !!}
                        {!! Form::select('role',['user' => 'User', 'editor' => 'Editor'],
                        null,['class' => 'form-control', 'id' => 'role']) !!}
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                {!! Form::submit('Update',['class' => 'btn btn-success pull-left']) !!}
                {!! Form::button('Close',['class' => 'btn btn-default', 'data-dismiss' => 'modal']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>