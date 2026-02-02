<div id="header" class="group">
    <div class="group inner">
        <div id="logo" class="group">
            <a href="{{ url('/') }}" title="Pink Rio">
                <img src="{{ asset('corporate/images/logo.png') }}" title="{{ __('Pink Rio') }}" alt="{{ __('Pink Rio') }}">
            </a>
        </div>
        <div id="sidebar-header" class="group">
            <div class="widget-first widget yit_text_quote">
                <blockquote class="text-quote-quote">&#8220;{{ __('The site was created using the template Pink Rio template and the Laravel 12') }} &#8221;</blockquote>
                <cite class="text-quote-author">{{ __('PHP & MySQL') }}</cite>
            </div>
        </div>
        <div class="clearer"></div>
        <hr>
        @include('corporate.navigation')
        <div id="header-shadow"></div>
        <div id="menu-shadow"></div>
    </div>
</div>