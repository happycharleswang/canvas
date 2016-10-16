<div class="container">
    @if(!empty(Settings::disqus()))
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                @include('frontend.blog.partials.disqus')
            </div>
        </div>
        <br>
    @endif
    <div style="text-align: center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <hr>
                <p class="small">&copy; {{ \Carbon\Carbon::today()->format('Y') }} {{ Settings::blogTitle() }} · Built on
                    <a href="http://canvas.toddaustin.io" target="_blank">Canvas</a>
/
<a href="https://laravel.com" target="_blank">Laravel</a>
                </p>
            </div>
        </div>
    </div>
</div>

<!-- scroll to top button -->
<span id="top-link-block" class="hidden hover-button">
    <a id="scroll-to-top" href="#top">SCROLL TO TOP</a>
</span>

@if (!empty(Settings::gaId()))
    @include('frontend.blog.partials.analytics')
@endif
