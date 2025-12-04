@extends('layout')

@section('contents')

<h1>会員登録</h1>

@if ($errors->any())
    <div>
        @foreach ($errors->all() as $error)
            {{ $error }}<br>
        @endforeach
    </div>
@endif

@if(session('register_success'))
    <div>登録されました。</div>
@endif

<form action="/user/register" method="POST">
    @csrf
    名前：<input type="text" name="name" value="{{ old('name') }}"><br>
    Email：<input type="email" name="email" value="{{ old('email') }}"><br>
    パスワード：<input type="password" name="password"><br>
    <button type="submit">登録する</button>
</form>

@endsection