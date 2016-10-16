<div class="container" id="head-c">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            <h1><a href="{{ url('/') }}">{{ Settings::blogTitle() }}</a></h1>
            <h3>{{ Settings::blogSubTitle() }}</h3>
            @if(isset($user->twitter) && strlen($user->twitter))
                <a href="https://sharethemeal.org" target="_blank" id="social"><i class="fa fa-fw fa-heart"></i></a>
            @endif
            @if(isset($user->facebook) && strlen($user->facebook))
                <a href="http://facebook.com/{{ $user->facebook }}" target="_blank" id="social"><i class="fa fa-fw fa-facebook"></i></a>
            @endif
            @if(isset($user->github) && strlen($user->github))
                <a href="http://github.com/{{ $user->github }}" target="_blank" id="social"><i class="fa fa-fw fa-github"></i></a>
            @endif
            @if(isset($user->linkedin) && strlen($user->linkedin))
                <a href="http://linkedin.com/in/{{ $user->linkedin }}" target="_blank" id="social"><i class="fa fa-fw fa-linkedin"></i></a>
            @endif
        </div>
    </div>

    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
        <ol class="breadcrumb" style="background-color:white">
            <li><a href="/">Home</a></li>
            <li><a href="/blog?tag=Research">Research</a></li>
            <li><a href="/blog/publications">Publications</a></li>
            <li><a href="/blog/about">About</a></li>
        </ol>
    </div>
</div>


