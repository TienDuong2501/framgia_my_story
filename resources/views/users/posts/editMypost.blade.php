<div class="modal fade" id="edit-post" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel"></h4>
            </div>
            {{ Form::open(['route' => 'edit-mypost',
            'method' => 'POST',
            'id' => 'frm-Edit',
            'enctype' => 'multipart/form-data']) }}
                <div class="modal-body">
                    {{ Form::label('title', trans('user/index.Title')) }}
                    {{ Form::text('title', null, ['class' =>'form-control',
                    'id' => 'title']) }}
                    <br>
                    {{ Form::label('sumary', trans('user/index.Sumary')) }}
                    {{ Form::text('sumary', null,['class' =>'form-control',
                    'id' => 'sumary']) }}
                    <br>
                    {{ Form::label('image', trans('user/index.Image')) }}
                    {{ Form::file('image', null, ['class' => 'form-control',
                    'id' => 'image']) }}
                    <br>
                    {{ Form::label('body', trans('user/index.Body')) }}
                    {{ Form::textarea('body', null, array('class' => 'form-control',
                    'id' => 'body')) }}
                </div>
                <div class="modal-footer">
                    {!! Form::submit(trans('user/index.Update'),['class' => 'btn btn-success pull-left']) !!}
                    {!! Form::button(trans('user/index.Close'),['class' => 'btn btn-default pull-right',
                    'data-dismiss' => 'modal']) !!}
                </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
