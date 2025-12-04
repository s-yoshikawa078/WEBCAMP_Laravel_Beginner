@extends('test.layout')

{{-- メインコンテンツ --}}
@section('contents')

<h1>ログイン</h1>

@if ($errors->any())
    <div>
    @foreach ($errors->all() as $error)
        {{ $error }}<br>
    @endforeach
    </div>
@endif

@if(session('status'))
    <div style="color: #000;">
        {{ session('status') }}
    </div>
@endif

<form action="{{ route('login') }}" method="POST">
    @csrf
    email：<input name="email" value="{{ old('email') }}"><br>
    パスワード：<input name="password" type="password"><br>
    <button type="submit">ログインする</button><br>
    <a href="{{ route('user.register.form') }}">会員登録はこちら</a>
</form>

@endsection