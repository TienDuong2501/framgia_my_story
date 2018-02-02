@extends('admin.layout.main')
@push('scripts')
{{ Html::script('js/admin.js') }}
@endpush
@section('title','Search')
@section('content')
@include('admin.posts.viewApprovedPost')
@include('admin.posts.viewPendingPost')
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
                        {!! Form::open(['route' => 'search-post-results',
                        'method' => 'post',
                        'enctype' => 'multipart/form-data']) !!}
                            {!! Form::token() !!}
                            <div class="form-group form-inline" style="float: right">
                                {!! Form::text('keyword', old('keyword'),
                                ['class' => 'search_for form-control',
                                'placeholder' => trans('admin/user.placeholder')] ) !!}
                                {!! Form::submit('Search', ['class' => 'btn btn-success']) !!}
                            </div>
                        {!! Form::close() !!}
                        @if(count($results) != 0)
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>{{ trans('admin/post.ID') }}</th>
                                        <th>{{ trans('admin/post.Name') }}</th>
                                        <th>{{ trans('admin/post.Title') }}</th>
                                        <th>{{ trans('admin/post.Sumary') }}</th>
                                        <th>{{ trans('admin/post.Body') }}</th>
                                        <th>{{ trans('admin/post.Image') }}</th>
                                        <th>{{ trans('admin/post.Status') }}</th>
                                        <th>{{ trans('admin/post.Create_at') }}</th>
                                        <th>{{ trans('admin/post.Update_at') }}</th>
                                        <th colspan="2">{{ trans('admin/post.Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($results as $key => $Post)
                                        <tr id="{{ $Post->id }}">
                                        <td>{{ $Post->id }}</td>
                                        @if(strlen($Post->user->name) > 20)
                                            <td>{{ $substr = substr($Post->user->name,0,10).'...' }}</td>
                                        @else
                                            <td>{{ $Post->user->name }}</td>
                                        @endif
                                        @if(strlen($Post->title) > 20)
                                            <td>{{ $substr = substr($Post->title,0,10).'...' }}</td>
                                        @else
                                            <td>{{ $Post->title }}</td>
                                        @endif
                                        @if(strlen($Post->brief) > 20)
                                            <td>{{ $substr = substr($Post->brief,0,10).'...' }}</td>
                                        @else
                                            <td>{{ $Post->brief }}</td>
                                        @endif
                                        @if(strlen($Post->body) > 20)
                                            <td>{{ $substr = substr($Post->body,0,10).'...' }}</td>
                                        @else
                                            <td>{!! $Post->body !!}</td>
                                        @endif
                                        <td>
                                            <img class="pending_img" src="{{ $Post->image }}" alt="">
                                        </td>
                                        @if(strlen($Post->post_status) > 20)
                                            <td>{{ $substr = substr($Post->post_status,0,10).'...' }}</td>
                                        @else
                                            <td>{{ $Post->post_status }}</td>
                                        @endif
                                        @if(strlen($Post->created_at) > 20)
                                            <td>{{ $substr = substr($Post->created_at,0,10).'...' }}</td>
                                        @else
                                            <td>{{ $Post->created_at }}</td>
                                        @endif
                                        @if(strlen($Post->updated_at) > 20)
                                            <td>{{ $substr = substr($Post->updated_at,0,10).'...' }}</td>
                                        @else
                                            <td>{{ $Post->updated_at }}</td>
                                        @endif
                                        @if($Post->post_status == 'approved')
                                        <td>

                                            <a href="" data="{{ $Post->id }}"
                                                data-url="{{ route('detail-approved-post') }}"
                                                class=" view_approved_post btn btn-primary">
                                            {{ trans('admin/post.View') }}</a>
                                        </td>
                                         <td>
                                            <a href="" data="{{ $Post->id }}"
                                                data-url="{{ route('delete-approved-post') }}"
                                                class=" delete_post btn btn-primary">
                                            {{ trans('admin/post.Delete') }}</a>
                                        </td>
                                        @else
                                            <td>
                                                <a href="" data="{{ $Post->id }}"
                                                    data-url="{{ route('detail-pending-post') }}"
                                                    class="view_pending_post btn btn-primary">
                                                {{ trans('admin/post.View') }}</a>
                                            </td>
                                            <td>
                                                <a href="" data="{{ $Post->id }}"
                                                    data-url="{{ route('delete-pending-post') }}"
                                                    class="delete_post btn btn-primary">
                                                {{ trans('admin/post.Delete') }}</a>
                                            </td>
                                        @endif
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
