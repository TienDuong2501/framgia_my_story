@extends('users.layouts.main')

@push('script')
{!! Html::script('https://cloud.tinymce.com/stable/tinymce.min.js') !!}
{!! Html::script('js/user.js') !!}
@endpush
@section('content')
@include('users.posts.viewMyPost')
@include('users.posts.editMypost')
<div class="content">
    <div class="grids">
        <div id="notification"></div>
        <div class="row">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>{{ trans('user/index.STT') }}</th>
                        <th>{{ trans('user/index.Name') }}</th>
                        <th>{{ trans('user/index.Title') }}</th>
                        <th>{{ trans('user/index.Body') }}</th>
                        <th>{{ trans('user/index.Image') }}</th>
                        <th>{{ trans('user/index.Status') }}</th>
                        <th>{{ trans('user/index.Create_at') }}</th>
                        <th>{{ trans('user/index.Update_at') }}</th>
                        <th colspan="3">{{ trans('user/index.Action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($myPost as $key => $post)
                        <tr id="{{ $post->id }}">
                            <td>{{ $key + 1 }}</td>
                            @if(strlen($post->user->name) > 20)
                                <td>{{ $substr = substr($post->user->name,0,10).'...' }}</td>
                            @else
                                <td>{{ $post->user->name }}</td>
                            @endif
                            @if(strlen($post->title) > 20)
                                <td>{{ $substr = substr($post->title,0,10).'...' }}</td>
                            @else
                                <td>{{ $post->title }}</td>
                            @endif
                            @if(strlen($post->body) > 20)
                                <td>{!! $substr = substr($post->body,0,10).'...' !!}</td>
                            @else
                                <td>{!! $post->body !!}</td>
                            @endif
                                <td><img src="{{ $post->image }}" class="mypost_image"></td>
                            @if(strlen($post->post_status) > 20)
                                <td>
                                    {{ $substr = substr($post->post_status,0,10).'...' }}
                                </td>
                            @else
                                <td>{{ $post->post_status }}</td>
                            @endif
                            @if(strlen($post->created_at) > 15)
                                <td>
                                    {{ $substr = substr($post->created_at,0,10).'...' }}
                                </td>
                            @else
                                <td>{{ $post->created_at }}</td>
                            @endif
                            @if(strlen($post->updated_at) > 15)
                                <td>
                                    {{ $substr = substr($post->updated_at,0,10).'...' }}
                                </td>
                            @else
                                <td>{{ $post->updated_at }}</td>
                            @endif
                                <td><a href="" data="{{ $post->id }}"
                                    data-url="{{ route('view-my-post') }}"
                                    class="view_post btn btn-info">{{ trans('user/index.View') }}</a></td>
                                <td><a href="" data="{{ $post->id }}"
                                    data-url="{{ route('show-mypost-form') }}"
                                    class="edit_post btn btn-primary">{{ trans('user/index.Edit') }}</a></td>
                                <td><a href="" data="{{ $post->id }}"
                                    data-url="{{ route('delete-post') }}"
                                    class="delete_post btn btn-danger">{{ trans('user/index.Delete') }}</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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
