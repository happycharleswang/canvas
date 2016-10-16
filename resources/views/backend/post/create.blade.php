@extends('backend.layout')

@section('title')
    <title>{{ Settings::blogTitle() }} | New Post</title>
@stop

@section('content')
    <section id="main">

        @include('backend.partials.sidebar-navigation')

        <section id="content">
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        <ol class="breadcrumb">
                            <li><a href="{{ url('admin') }}">Home</a></li>
                            <li><a href="{{ url('admin/post') }}">Posts</a></li>
                            <li class="active">New Post</li>
                        </ol>

                        @include('shared.errors')

                        @include('shared.success')

                        <h2>Create a New Post
                            <br>
                            <small>Set a page image to feature at the top of your blog post by specifying the image path relative to the uploads directory.</small>
                        </h2>
                    </div>
                    <div class="card-body card-padding">
                        <form class="keyboard-save" role="form" method="POST" id="postCreate" action="{{ route('admin.post.store') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            @include('backend.post.partials.form')

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-icon-text"><i class="zmdi zmdi-floppy"></i> Save</button>
                                &nbsp;
                                <a href="{{ url('admin/post') }}"><button type="button" class="btn btn-link">Cancel</button></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </section>

@stop

@section('unique-js')
    @include('backend.post.partials.editor')

    @include('backend.shared.notifications.protip')
    @include('backend.shared.components.datetime-picker')

    @include('backend.shared.components.slugify')

    {!! JsValidator::formRequest('App\Http\Requests\PostCreateRequest', '#postCreate') !!}
@stop
