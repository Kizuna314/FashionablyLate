@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
<div class="container">
    <h2 class="text-center mb-4">お問い合わせフォーム</h2>

    <form action="{{ route('contact.confirm') }}" method="POST">
        @csrf
        <table class="table">
            <!-- お名前 -->
            <tr>
                <th>お名前</th>
                <td>
                    <input type="text" name="last_name" value="{{ old('last_name', $inputs['last_name'] ?? '') }}">
                    <input type="text" name="first_name" value="{{ old('first_name', $inputs['first_name'] ?? '') }}">
                </td>
            </tr>
            <!-- 性別 -->
            <tr>
                <th>性別</th>
                <td>
                    <select name="gender">
                        <option value="1" {{ old('gender', $inputs['gender'] ?? '') == '1' ? 'selected' : '' }}>男性</option>
                        <option value="2" {{ old('gender', $inputs['gender'] ?? '') == '2' ? 'selected' : '' }}>女性</option>
                        <option value="3" {{ old('gender', $inputs['gender'] ?? '') == '3' ? 'selected' : '' }}>その他</option>
                    </select>
                </td>
            </tr>
            <!-- メールアドレス -->
            <tr>
                <th>メールアドレス</th>
                <td>
                    <input type="email" name="email" value="{{ old('email', $inputs['email'] ?? '') }}">
                </td>
            </tr>
            <!-- 電話番号 -->
            <tr>
                <th>電話番号</th>
                <td>
                    <input type="text" name="tel_part1" value="{{ old('tel_part1', $inputs['tel_part1'] ?? '') }}">
                    <input type="text" name="tel_part2" value="{{ old('tel_part2', $inputs['tel_part2'] ?? '') }}">
                    <input type="text" name="tel_part3" value="{{ old('tel_part3', $inputs['tel_part3'] ?? '') }}">
                </td>
            </tr>
            <!-- 住所 -->
            <tr>
                <th>住所</th>
                <td>
                    <input type="text" name="address" value="{{ old('address', $inputs['address'] ?? '') }}">
                </td>
            </tr>
            <!-- 建物名 -->
            <tr>
                <th>建物名</th>
                <td>
                    <input type="text" name="building" value="{{ old('building', $inputs['building'] ?? '') }}">
                </td>
            </tr>
            <!-- お問い合わせの種類 -->
            <tr>
                <th>お問い合わせの種類</th>
                <td>
                    <select name="category_id">
                        <option value="1" {{ old('category_id', $inputs['category_id'] ?? '') == '1' ? 'selected' : '' }}>商品のお届けについて</option>
                        <option value="2" {{ old('category_id', $inputs['category_id'] ?? '') == '2' ? 'selected' : '' }}>商品の交換について</option>
                        <option value="3" {{ old('category_id', $inputs['category_id'] ?? '') == '3' ? 'selected' : '' }}>商品トラブル</option>
                        <option value="4" {{ old('category_id', $inputs['category_id'] ?? '') == '4' ? 'selected' : '' }}>ショップへのお問い合わせ</option>
                        <option value="5" {{ old('category_id', $inputs['category_id'] ?? '') == '5' ? 'selected' : '' }}>その他</option>
                    </select>
                </td>
            </tr>
            <!-- お問い合わせ内容 -->
            <tr>
                <th>お問い合わせ内容</th>
                <td>
                    <textarea name="detail">{{ old('detail', $inputs['detail'] ?? '') }}</textarea>
                </td>
            </tr>
        </table>

        <div class="text-center mt-4">
            <button type="submit" class="btn btn-primary">確認</button>
        </div>
    </form>
</div>
@endsection