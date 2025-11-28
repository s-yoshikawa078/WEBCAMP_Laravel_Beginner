@extends('test.layout')

{{-- メインコンテンツ --}}
@section('contents')

        @if ($errors->any())
            <div>
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
            </div>
        @endif
        
        <form action="/test/input" method="post">
            @csrf
            email：<input type="text" name="email" value="{{ old('email') }}"><br>
            パスワード：<input type="password" name="password"><br>
            <button>送信する</button>
        </form>
@endsection         