@extends('users.layouts.main')
@section('content')
@push('script')
<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea', menubar : false });</script>
@endpush
<div class="content">
    <div class="grids">
        <div class="row">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="err">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div class="row">
            {{ Form::open(['route' => 'create-post',
            'method' => 'POST',
            'enctype' => 'multipart/form-data']) }}
                {{ Form::label('title', trans('user/index.Title')) }}
                {{ Form::text('title', null, ['class' =>'form-control']) }}
                <br>
                {{ Form::label('sumary', trans('user/index.Sumary')) }}
                {{ Form::text('sumary', null,['class' =>'form-control']) }}
                <br>
                {{ Form::label('image', trans('user/index.Image')) }}
                {{ Form::file('image', null, ['class' => 'form-control']) }}
                <br>
                {{ Form::label('body', trans('user/index.Body')) }}
                {{ Form::textarea('body', null, array('class' => 'form-control')) }}
                <br>
                <a href="{{ route('get-all-post') }}" class="btn btn-danger cancel_button">
                    {{ trans('user/index.Cancel') }}
                </a>
                {{ Form::submit(trans('user/index.Create_Post'),
                ['class' => 'btn btn-info create_button']) }}
            {{ Form::close() }}
        </div>
    </div>
    <div class="clear"> </div>
    <div class="clear"> </div>
    <div class="footer">
        <p>&#169{{ trans('user/index.signature') }}</p>
    </div>
    <div class="clear"> </div>
</div>
@endsection
