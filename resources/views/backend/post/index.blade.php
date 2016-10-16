@extends('backend.layout')

@section('title')
    <title>{{ Settings::blogTitle() }} | Posts</title>
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
                            <li class="active">Posts</li>
                        </ol>
                        <ul class="actions">
                            <li class="dropdown">
                                <a href="" data-toggle="dropdown">
                                    <i class="zmdi zmdi-more-vert"></i>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li>
                                        <a href="">Refresh Posts</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>

                        @include('shared.errors')
                        @include('shared.success')

                        <h2>Posts&nbsp;
                            <a href="{{ url('admin/post/create') }}"><i class="zmdi zmdi-plus-circle" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Create a new post"></i></a>

                            <small>This page provides a comprehensive overview of all your blog posts. Click the <span class="zmdi zmdi-edit text-primary"></span> icon next to each post to update its contents or the <span class="zmdi zmdi-search text-primary"></span> icon to see what it looks like to your readers.</small>
                        </h2>
                    </div>

                    <div class="table-responsive">
                        <table id="posts" class="table table-condensed table-vmiddle">
                            <thead>
                                <tr>
                                    <th data-column-id="id">ID</th>
                                    <th data-column-id="title">Title</th>
                                    <th data-column-id="subtitle">Subtitle</th>
                                    <th data-column-id="slug">Slug</th>
                                    <th data-column-id="published" data-type="date">Status</th>
                                    <th data-column-id="created" data-type="date" data-order="desc">Created</th>
                                    <th data-column-id="updated" data-type="date">Updated</th>
                                    <th data-column-id="commands" data-formatter="commands" data-sortable="false">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $post)
                                    <tr>
                                        <td>{{ $post->id }}</td>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ str_limit($post->subtitle, config('blog.backend_trim_width')) }}</td>
                                        <td>{{ $post->slug }}</td>
                                        <td>{{ $post->is_draft === 1 ? '<span class="label label-primary">Draft</span>' : '<span class="label label-success">Published</span>' }}</td>
                                        <td>{{ $post->created_at->format('M d, Y') }}</td>
                                        <td>{{ $post->updated_at->format('M d, Y') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </section>
@stop

@section('unique-js')
    @if(Session::get('_login'))
        @include('backend.partials.notify', ['section' => '_login'])
        {{ \Session::forget('_login') }}
    @endif

    @if(Session::get('_new-post'))
        @include('backend.partials.notify', ['section' => '_new-post'])
        {{ \Session::forget('_new-post') }}
    @endif

    @if(Session::get('_delete-post'))
        @include('backend.partials.notify', ['section' => '_delete-post'])
        {{ \Session::forget('_delete-post') }}
    @endif

    @include('backend.post.partials.datatable')
@stop
