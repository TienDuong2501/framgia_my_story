@extends('admin.layout.main')
@push('scripts')
{{ Html::script('js/admin.js') }}
@endpush
@section('content')
@include('admin.user.editUser')
<div class="container">
    <div class="row">
        <div class="col-md-11">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('admin/user.Title_Index_User') }}
                </div>
                <div class="panel-body">
                    <div class="white-box">
                        <div class="row">
                        </div>
                        <a href=""
                        class="btn btn-success"
                        style="float: left">{{ trans('admin/user.Disable_User_link') }}</a>
                        <div id="notification"></div>
                        {!! Form::open(['route' => 'search-user',
                        'method' => 'post',
                        'enctype' => 'multipart/form-data']) !!}
                        <div class="form-group form-inline" style="float: right">
                            {!! Form::text('keyword', old('keyword'),
                            ['class' => 'search_for form-control',
                            'placeholder' => 'search for...'] ) !!}
                            {!! Form::submit(null, ['class' => 'btn btn-success']) !!}
                        </div>
                        {!! Form::close() !!}
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>{{ trans('admin/user.ID') }}</th>
                                    <th>{{ trans('admin/user.Name') }}</th>
                                    <th>{{ trans('admin/user.Email') }}</th>
                                    <th>{{ trans('admin/user.Role') }}</th>
                                    <th>{{ trans('admin/user.Status') }}</th>
                                    <th>{{ trans('admin/user.Create_at') }}</th>
                                    <th>{{ trans('admin/user.Update_at') }}</th>
                                    <th colspan="2">{{ trans('admin/user.Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pendingPosts as $key => $Post)
                                    <tr id="{{ $Post->id }}">
                                        <td>{{ $Post->id }}</td>
                                        <td>{{ $Post->name }}</td>
                                        <td>
                                            {{ $Post->email }}
                                        </td>
                                        <td value="{{ $Post->id }}">
                                            {{ $Post->role }}
                                        </td>
                                        <td>
                                            {{ $Post->status }}
                                        </td>
                                        <td>{{ $Post->created_at }}</td>
                                        <td>{{ $Post->updated_at }}</td>
                                        <td>
                                            <a href="" data="{{ $Post->id }}"
                                                data-url=""
                                                class="deactive btn btn-primary">
                                            {{ trans('admin/user.Deactive_button') }}</a>
                                        </td>
                                        <td>
                                            <a href="" data="{{ $Post->id }}"
                                                data-url=""
                                                class="edit btn btn-primary">
                                            {{ trans('admin/user.Edit') }}</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="text-center">
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
