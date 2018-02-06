<div class="modal fade" id="comment-update" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">{{ trans('user/index.Edit_Comment') }}</h4>
            </div>
            {!! Form::open(['route' => 'edit-comment', 'method' => 'post', 'id' => 'frm-update',
            'enctype' => 'multipart/form-data']) !!}
            <div class="modal-body">
                <div class="col-4-md">
                    <div class="form-group">
                        {!! Form::label('Content') !!}
                        {!! Form::hidden('id', null, ['class' => 'form-control', 'id' => 'id']) !!}
                        {!! Form::textarea('comment', null, ['class' => 'form-control',
                        'rows' => 5, 'id' => 'edit_comment']) !!}
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                {!! Form::submit('Update',['class' => 'btn_update btn btn-success pull-left']) !!}
                {!! Form::button('Close',['class' => 'btn btn-default', 'data-dismiss' => 'modal']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
