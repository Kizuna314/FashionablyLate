@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
<div class="container">
    <h2 class="text-center mb-4">Confirm</h2>

    <form action="{{ route('contact.store') }}" method="POST">
        @csrf
        <table class="table">
            <tr>
                <th>お名前</th>
                <td>
                    {{ $inputs['last_name'] }} {{ $inputs['first_name'] }}
                    <input type="hidden" name="last_name" value="{{ $inputs['last_name'] }}">
                    <input type="hidden" name="first_name" value="{{ $inputs['first_name'] }}">
                </td>
            </tr>
            <tr>
                <th>性別</th>
                <td>
                    @if($inputs['gender'] == '1')
                        男性
                    @elseif($inputs['gender'] == '2')
                        女性
                    @else
                        その他
                    @endif
                    <input type="hidden" name="gender" value="{{ $inputs['gender'] }}">
                </td>
            </tr>
            <tr>
                <th>メールアドレス</th>
                <td>
                    {{ $inputs['email'] }}
                    <input type="hidden" name="email" value="{{ $inputs['email'] }}">
                </td>
            </tr>
            <tr>
                <th>電話番号</th>
                <td>
                    {{ $inputs['tel_part1'] }}-{{ $inputs['tel_part2'] }}-{{ $inputs['tel_part3'] }}
                    <input type="hidden" name="tel_part1" value="{{ $inputs['tel_part1'] }}">
                    <input type="hidden" name="tel_part2" value="{{ $inputs['tel_part2'] }}">
                    <input type="hidden" name="tel_part3" value="{{ $inputs['tel_part3'] }}">
                </td>
            </tr>
            <tr>
                <th>住所</th>
                <td>
                    {{ $inputs['address'] }}
                    <input type="hidden" name="address" value="{{ $inputs['address'] }}">
                </td>
            </tr>
            <tr>
                <th>建物名</th>
                <td>
                    {{ $inputs['building'] }}
                    <input type="hidden" name="building" value="{{ $inputs['building'] }}">
                </td>
            </tr>
            <tr>
                <th>お問い合わせの種類</th>
                <td>
                    @if($inputs['category_id'] == '1')
                        商品のお届けについて
                    @elseif($inputs['category_id'] == '2')
                        商品の交換について
                    @elseif($inputs['category_id'] == '3')
                        商品トラブル
                    @elseif($inputs['category_id'] == '4')
                        ショップへのお問い合わせ
                    @else
                        その他
                    @endif
                    <input type="hidden" name="category_id" value="{{ $inputs['category_id'] }}">
                </td>
            </tr>
            <tr>
                <th>お問い合わせ内容</th>
                <td>
                    {!! nl2br(e($inputs['detail'])) !!}
                    <input type="hidden" name="detail" value="{{ $inputs['detail'] }}">
                </td>
            </tr>
        </table>

        <div class="text-center mt-4">
            <button type="submit" class="btn btn-primary">送信</button>
            <a href="{{ route('contact.fix',
            ['last_name' => $inputs['last_name'],
            'first_name' => $inputs['first_name'],
            'gender' => $inputs['gender'],
            'email' => $inputs['email'],
            'tel_part1' => $inputs['tel_part1'],
            'tel_part2' => $inputs['tel_part2'],
            'tel_part3' => $inputs['tel_part3'],
            'address' => $inputs['address'],
            'building' => $inputs['building'],
            'category_id' => $inputs['category_id'],
            'detail' => $inputs['detail']
            ]) }}" class="btn btn-secondary">修正</a>
        </div>
    </form>
</div>
@endsection