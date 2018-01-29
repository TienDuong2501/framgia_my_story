@extends('admin.layout.main')
@push('scripts')
    {{ Html::script('js/admin.js') }}
@endpush
@section('content')
@include('admin.user.editUser')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('admin/user.result_search') }} {{  count($results) }} {{ trans('admin/user.singular_result_search') }}
                </div>
                <div class="panel-body">
                    <div class="white-box">
                        <div class="row">
                        </div>
                        <div id="notification"></div>
                        <a href="{{ route('show-user') }}" class="btn btn-success"
                        style="float: left">{{ trans('admin/user.link_user_list') }}</a>
                        {!! Form::open(['route' => 'search-user',
                        'method' => 'post',
                        'enctype' => 'multipart/form-data']) !!}
                            {!! Form::token() !!}
                            <div class="form-group form-inline" style="float: right">
                                {!! Form::text('keyword', old('keyword'),
                                ['class' => 'search_for form-control',
                                'placeholder' => trans('admin/user.placeholder')] ) !!}
                                {!! Form::submit(null, ['class' => 'btn btn-success']) !!}
                            </div>
                        {!! Form::close() !!}
                        @if(count($results) != 0)
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
                                        <th colspan="3">{{ trans('admin/user.Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($results as $key => $user)
                                        <tr id="{{ $user->id }}">
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td data="{{ $user->id }}">{{ $user->role }}</td>
                                            <td value="{{ $user->id }}">{{ $user->status }}</td>
                                            <td>{{ $user->created_at }}</td>
                                            <td>{{ $user->updated_at }}</td>
                                            <td>
                                                @if($user->status == 0 )
                                                    <a href="" data="{{ $user->id }}"
                                                        data-url="{{ route('show-user') }}"
                                                        class="deactive btn btn-primary">
                                                    {{ trans('admin/user.Active_button') }}</a>
                                                @else
                                                    <a href="" data="{{ $user->id }}"
                                                        data-url="{{ route('deactive-user') }}"
                                                        class="active_user btn btn-primary">
                                                    {{ trans('admin/user.Deactive_button') }}</a>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="" role="{{ $user->id }}"
                                                    data-url="{{ route('delete-user') }}"
                                                    class="delete btn btn-primary">
                                                {{ trans('admin/user.Delete_button') }}</a>
                                            </td>
                                            <td>
                                                <a href="" data="{{ $user->id }}"
                                                    data-url="{{ route('show-edit-form') }}"
                                                    class="edit btn btn-primary">
                                                {{ trans('admin/user.Edit') }}</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="text-center">
                                {{ $results->links() }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
