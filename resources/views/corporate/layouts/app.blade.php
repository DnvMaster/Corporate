<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.2, user-scalable=yes" />
        <title>{{ $title or 'DnvMaster' }}</title>
        <meta name="keywords" content="{{ (isset($keywords)) ? $keywords : ''}}">
        <meta name="description" content="{{ (isset($description)) ? $description : ''}}">
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('corporate/images/favicon.ico') }}">
        <link rel="icon" type="image/x-icon" href="{{ asset('corporate/images/favicon.ico') }}">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('corporate/apple-touch-icon-144x.png') }}">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('corporate/apple-touch-icon-114x.png') }}">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('corporate/apple-touch-icon-72x.png') }}">
        <link rel="apple-touch-icon-precomposed" href="{{ asset('corporate/apple-touch-icon-57x.png') }}">
        <link rel="stylesheet" type="text/css" media="all" href="{{ asset('corporate/css/reset.css') }}">
        <link rel="stylesheet" type="text/css" media="all" href="{{ asset('corporate/css/style.css') }}">
        <link rel="stylesheet" id="max-width-1024-css" href="{{ asset('corporate/css/max-width-1024.css') }}" type="text/css" media="screen and (max-width: 1240px)">
        <link rel="stylesheet" id="max-width-768-css" href="{{ asset('corporate/css/max-width-768.css') }}" type="text/css" media="screen and (max-width: 987px)">
        <link rel="stylesheet" id="max-width-480-css" href="{{ asset('corporate/css/max-width-480.css') }}" type="text/css" media="screen and (max-width: 480px)">
        <link rel="stylesheet" id="max-width-320-css" href="{{ asset('corporate/css/max-width-320.css') }}" type="text/css" media="screen and (max-width: 320px)">
        <link rel="stylesheet" id="thickbox-css" href="{{ asset('corporate/css/thickbox.css') }}" type="text/css" media="all">
        <link rel="stylesheet" id="styles-minified-css" href="{{ asset('corporate/css/style-minifield.css') }}" type="text/css" media="all">
        <link rel="stylesheet" id="buttons" href="{{ asset('corporate/css/buttons.css') }}" type="text/css" media="all">
        <link rel="stylesheet" id="cache-custom-css" href="{{ asset('corporate/css/cache-custom.css') }}" type="text/css" media="all">
        <link rel="stylesheet" id="custom-css" href="{{ asset('corporate/css/custom.css" type="text/css') }}" media="all">
        <link rel="stylesheet" id="google-fonts-css" href="http://fonts.googleapis.com/css?family=Oswald%7CDroid+Sans%7CPlayfair+Display%7COpen+Sans+Condensed%3A300%7CRokkitt%7CShadows+Into+Light%7CAbel%7CDamion%7CMontez&amp;ver=3.4.2" type="text/css" media="all" />
        <link rel='stylesheet' href="{{ asset('corporate/css/font-awesome.css') }}" type='text/css' media='all'>
        <script type="text/javascript" src="{{ asset('corporate/js/jquery.js') }}"></script>
        <script type="text/javascript" src="{{ asset('corporate/js/comment-reply.js') }}"></script>
        <script type="text/javascript" src="{{ asset('corporate/js/jquery.quicksand.js') }}"></script>
        <script type="text/javascript" src="{{ asset('corporate/js/jquery.tipsy.js') }}"></script>
        <script type="text/javascript" src="{{ asset('corporate/js/jquery.prettyPhoto.js') }}"></script>
        <script type="text/javascript" src="{{ asset('corporate/js/jquery.cycle.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('corporate/js/jquery.anythingslider.js') }}"></script>
        <script type="text/javascript" src="{{ asset('corporate/js/jquery.eislideshow.js') }}"></script>
        <script type="text/javascript" src="{{ asset('corporate/js/jquery.easing.js') }}"></script>
        <script type="text/javascript" src="{{ asset('corporate/js/jquery.flexslider-min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('corporate/js/jquery.aw-showcase.js') }}"></script>
        <script type="text/javascript" src="{{ asset('corporate/js/layerslider.kreaturamedia.jquery-min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('corporate/js/shortcodes.js') }}"></script>
		<script type="text/javascript" src="{{ asset('corporate/js/jquery.colorbox-min.js') }}"></script> <!-- nav -->
		<script type="text/javascript" src="{{ asset('corporate/js/jquery.tweetable.js') }}"></script>
    </head>
    <body class="no_js responsive page-template-home-php stretched">
        <div class="bg-shadow">
            <div id="wrapper" class="group">
                @include('corporate.header')
				@yield('sliders')
				<div id="primary" class="sidebar-{{ isset($bar) ? $bar : 'no' }}">
				    <div class="inner group">
				        @yield('content')
				        @yield('bar')
				    </div>
				</div>
				@yield('footer')
            </div>
        </div>
        <script type="text/javascript" src="{{ asset('corporate/js/jquery.custom.js') }}"></script>
        <script type="text/javascript" src="{{ asset('corporate/js/contact.js') }}"></script>
        <script type="text/javascript" src="{{ asset('corporate/js/jquery.mobilemenu.js') }}"></script> 
    </body>
</html>