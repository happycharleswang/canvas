@extends('backend.layout')

@section('title')
    <title>{{ Settings::blogTitle() }} | Settings</title>
@stop

@section('content')
    <section id="main">
        @include('backend.partials.sidebar-navigation')
        <section id="content">
            <div class="container">
                <div class="block-header">
                    <h2>Settings</h2>
                    <ul class="actions">
                        <li class="dropdown">
                            <a href="" data-toggle="dropdown">
                                <i class="zmdi zmdi-more-vert"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li>
                                    <a href="">Refresh Settings</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>

                @include('backend.settings.partials.settings')
                @include('backend.settings.partials.system-information')
                @include('backend.settings.partials.about')

            </div>
        </section>
    </section>
@stop

@section('unique-js')
    {!! JsValidator::formRequest('App\Http\Requests\SettingsUpdateRequest', '#settings') !!}

    @if(Session::get('_update-settings'))
        @include('backend.partials.notify', ['section' => '_update-settings'])
        {{ \Session::forget('_update-settings') }}
    @endif

    <script async defer src="https://buttons.github.io/buttons.js"></script>
@stop
