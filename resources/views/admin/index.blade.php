@extends('admin.layout')

{{-- メインコンテンツ --}}
@section('contents')
        <h1>管理画面 ログイン</h1>
        @if ($errors->any())
            <div>
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
            </div>
        @endif
        <form action="/admin/login" method="post">
            @csrf
            ログインID：<input type="text" name="login_id" value="{{ old('login_id') }}"><br>
            パスワード：<input type="password" name="password"><br>
            <button>ログインする</button>
        </form>
    </body>
@endsection