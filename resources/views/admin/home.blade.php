@extends('admin.layout.main')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('admin/admin.dasboard') }}</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(session('no-permission'))
                        <div class="alert alert-danger">
                            {{ session('no-permission') }}
                        </div>
                    @endif
                    {{ trans('admin/admin.notification') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection