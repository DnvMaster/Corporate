@extends('corporate.layouts.corporate')

@section('title', __('403'))

@section('header')
    {!! $header !!}
@endsection

@section('content')
    {!! $content !!}
@endsection

@section('content')
    @section('code', '403')
    @section('message', __($exception->getMessage() ?: 'Forbidden'))
@endsection

@section('footer')
    {!! $footer !!}
@endsection
