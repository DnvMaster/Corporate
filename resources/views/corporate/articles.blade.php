@extends('corporate.layouts.corporate')

@section('header')
    {!! $header !!}
@endsection

@section('content')
    {!! $content !!}
@endsection

@section('bar')
    {!! $rightBar ?? '' !!}
@endsection

@section('footer')
    {!! $footer !!}
@endsection