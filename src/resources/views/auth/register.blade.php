@extends('layouts.register_layout')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('header-content')
    <nav>
        <a href="{{ route('login') }}" class="btn-login">login</a>
    </nav>
@endsection

@section('content')
<div class="container">
    <h2>Register</h2>
    <form action="{{ route('register') }}" method="post" class="register-form">
        @csrf
        <div class="form-group">
            <label for="name">お名前</label>
            <input type="text" id="name" name="name" placeholder="例: 山田 太郎" value="{{ old('name') }}"  required>
        </div>
        <div class="form-group">
            <label for="email">メールアドレス</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}"  placeholder="例: test@example.com" required>
        </div>
        <div class="form-group">
            <label for="password">パスワード</label>
            <input type="password" id="password" name="password" placeholder="例: coachtech1106" required>
        </div>
        <button type="submit" class="btn">登録</button>
    </form>
</div>
@endsection