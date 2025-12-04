@extends('layout')

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
        <form action="{{ route('login') }}" method="POST">
         @csrf
         <input type="email" name="email" required>
         <input type="password" name="password" required>
         <button type="submit">ログイン</button>
        </form>
@endsection    