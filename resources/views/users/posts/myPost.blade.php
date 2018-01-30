@extends('users.layouts.main')
@section('content')
@push('script')
<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>
@endpush
<div class="content">
    <div class="grids">
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
                        <th>{{ trans('user/index.Action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($myPost as $key => $post)
                    <tr>
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
                            <td>{{ $substr = substr($post->body,0,10).'...' }}</td>
                        @else
                            <td>{{ $post->body }}</td>
                        @endif
                            <td><img src="{{ $post->image }}" class="mypost_image"></td>
                        @if(strlen($post->post_status) > 20)
                            <td>
                                {{ $substr = substr($post->post_status,0,10).'...' }}
                            </td>
                        @else
                            <td>{{ $post->post_status }}</td>
                        @endif
                        @if(strlen($post->created_at) > 20)
                            <td>
                                {{ $substr = substr($post->created_at,0,10).'...' }}
                            </td>
                        @else
                            <td>{{ $post->created_at }}</td>
                        @endif
                        @if(strlen($post->updated_at) > 20)
                            <td>
                                {{ $substr = substr($post->updated_at,0,10).'...' }}
                            </td>
                        @else
                            <td>{{ $post->updated_at }}</td>
                        @endif
                            <td>
                                <button type="button" class="btn btn-primary"
                                data-toggle="modal" data-target="#myModal">
                                {{ trans('user/index.View') }}
                                </button>
                                <div class="modal fade" id="myModal"
                                tabindex="-1" role="dialog"
                                aria-labelledby="myModalLabel">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close"
                                                data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <ul>
                                                    <li>
                                                        <span>
                                                            {{ trans('user/index.Post_By') }}
                                                            {{ $post->name }} 
                                                            {{ trans('user/index.on') }} 
                                                            {{ $post->created_at }}
                                                        </span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="modal-body">
                                                <div class="singlepage">
                                                    <a href="#">
                                                        <img src="
                                                        {{ asset('images/grid-img.jpg') }}" />
                                                    </a>
                                                    <p>{{ $post->body }}</p>
                                                    <div class="clear"> </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button"
                                                class="btn btn-default"
                                                data-dismiss="modal">{{ trans('user/index.Close') }}</button>
                                                <a href="" class="btn btn-primary">
                                                    {{ trans('user/index.Edit') }}
                                                </a>
                                                <a href="" class="btn btn-primary">
                                                    {{ trans('user/index.Delete') }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
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
