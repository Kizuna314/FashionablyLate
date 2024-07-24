@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('title', 'Thank You')

@section('content')
    <div class="thanks">
        <h2>お問い合わせありがとうございました</h2>
    </div>
    <div class="button-container">
        <a href="/" class="btn">HOME</a>
    </div>
@endsection
