@extends('backend.layout')

@section('title')
    <title>{{ Settings::blogTitle() }} | Media</title>
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
                            <li class="active">Media</li>
                        </ol>
                        <ul class="actions">
                            <li class="dropdown">
                                <a href="" data-toggle="dropdown">
                                    <i class="zmdi zmdi-more-vert"></i>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li>
                                        <a href="">Refresh Media Library</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <h2>Media Library
                            <small>All the files you’ve uploaded are listed alphabetically in the Media Library. Double-click a folder name to see its contents.</small>
                        </h2>
                    </div>

                    <media-manager></media-manager>
                </div>
            </div>
        </section>
    </section>
@stop

@section('unique-js')

    <script>
        new Vue({
            el: 'body',
            events:{
                'media-manager-notification' : function(message, type, time)
                {
                    $.growl({
                        message: message
                    },{
                        type: 'inverse',
                        allow_dismiss: false,
                        label: 'Cancel',
                        className: 'btn-xs btn-inverse',
                        placement: {
                            from: 'top',
                            align: 'right'
                        },
                        delay: time,
                        animate: {
                            enter: 'animated fadeInRight',
                            exit: 'animated fadeOutRight'
                        },
                        offset: {
                            x: 20,
                            y: 85
                        }
                    });
                }
            }
        });
    </script>
@stop
