@extends('test.layout')

{{-- メインコンテンツ --}}
@section('contents')
        email：{{ $datum['email'] }}<br>
        パスワード：{{ $datum['password'] }}<br>
@endsection       