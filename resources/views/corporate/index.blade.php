@extends(env('CORP').'.layouts.app')

@section('navigation')
    {!! $navigation !!}
@endsection

@section('sliders')
    {!! $sliders !!}
@endsection

@section('content')
    {!! $content !!}
@endsection

@section('bar')
    {!! $rightBar !!}
@endsection

@section('footer')
    {!! $footer !!}
@endsection