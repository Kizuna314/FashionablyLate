@extends('layouts.login_layout')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
<div class="container">
    <h2>Login</h2>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <label for="email">メールアドレス</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}"  placeholder="例: test@example.com" required>
        <label for="password">パスワード</label>
        <input type="password" id="password" name="password" placeholder="例: coachtech1106" required>
        <button type="submit">ログイン</button>
    </form>
</div>
@endsection
