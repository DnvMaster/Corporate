@extends('corporate.layouts.corporate')

@section('header')
    @include('corporate.header')
@endsection

@section('content')
    <div id="content-index" class="content group">
        <img class="error-404-image group" src="{{ asset('corporate/images/features/404.png') }}" title="{{ __('Error 404') }}" alt="{{ __('404') }}">
        <div class="error-404-text group">
            <p>{{ __('We are sorry but the page you are looking for does not exist.') }}<br>{{ __('You could') }} <a href="{{ url('/') }}">{{ __('return to the home page') }}</a></p>
        </div>
    </div>
@endsection()

@section('footer')
    @include('corporate.footer')
@endsection
