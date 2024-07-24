@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
    <h2>Contact</h2>
    <div class="form-container">
        <form action="{{ route('contact.confirm') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="last_name">お名前 <span class="required">※</span></label>
                <input type="text" id="last_name" name="last_name" placeholder="例: 山田" required>
                <input type="text" id="first_name" name="first_name" placeholder="例: 太郎" required>
            </div>
            <div class="form-group">
                <label>性別 <span class="required">※</span></label>
                <div class="radio-group">
                    <div class="radio-item">
                        <input type="radio" id="1" name="gender" value="1" checked>
                        <label for="1">男性</label>
                    </div>
                    <div class="radio-item">
                        <input type="radio" id="2" name="gender" value="2">
                        <label for="2">女性</label>
                    </div>
                    <div class="radio-item">
                        <input type="radio" id="3" name="gender" value="3">
                        <label for="3">その他</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="email">メールアドレス <span class="required">※</span></label>
                <input type="email" id="email" name="email" placeholder="例: test@example.com" required>
            </div>
            <div class="form-group">
                <label for="tel">電話番号 <span class="required">※</span></label>
                <div class="tel-group">
                    <input type="tel" id="tel-part1" name="tel_part1" placeholder="080" required>
                    -
                    <input type="tel" id="tel-part2" name="tel_part2" placeholder="1234"required>
                    -
                    <input type="tel" id="tel-part3" name="tel_part3" placeholder="5678" required>
                </div>
            </div>
            <div class="form-group">
                <label for="address">住所 <span class="required">※</span></label>
                <input type="text" id="address" name="address" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3" required>
            </div>
            <div class="form-group">
                <label for="building">建物名</label>
                <input type="text" id="building" name="building" placeholder="例: 千駄ヶ谷マンション101">
            </div>
            <div class="form-group">
                <label for="category_id">お問い合わせの種類 <span class="required">※</span></label>
                <select id="category_id" name="category_id" required>
                    <option value="">選択してください</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->content }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="detail">お問い合わせ内容 <span class="required">※</span></label>
                <textarea id="detail" name="detail" placeholder="お問い合わせ内容をご記載ください" required></textarea>
            </div>
            <div class="button-container">
                <button type="submit" class="btn">確認画面</button>
            </div>
        </form>
    </div>
@endsection