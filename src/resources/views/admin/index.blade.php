@extends('layouts.app')

@section('title', 'Admin')

@section('header-content')
    <nav>
        <a href="{{ route('logout') }}" class="btn-logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">logout</a>
    </nav>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
@endsection

@section('content')
    <h2>Admin</h2>
    <form action="{{ route('admin.search') }}" method="get" class="search-form">
        <input type="text" name="search" placeholder="名前やメールアドレスを入力してください">
        <select name="gender">
            <option value="">性別</option>
            <option value="male">男性</option>
            <option value="female">女性</option>
            <option value="other">その他</option>
        </select>
        <select name="category">
            <option value="">お問い合わせの種類</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->content }}</option>
            @endforeach
        </select>
        <input type="date" name="date">
        <button type="submit" class="btn">検索</button>
        <button type="reset" class="btn btn-reset">リセット</button>
    </form>
    <button class="btn btn-export">エクスポート</button>
    <table>
        <thead>
            <tr>
                <th>お名前</th>
                <th>性別</th>
                <th>メールアドレス</th>
                <th>お問い合わせの種類</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($contacts as $contact)
                <tr>
                    <td>{{ $contact->last_name }} {{ $contact->first_name }}</td>
                    <td>{{ $contact->gender }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->category->content }}</td>
                    <td><button class="btn btn-detail" data-id="{{ $contact->id }}">詳細</button></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $contacts->links() }}
@endsection

@section('scripts')
    <script>
        // 詳細ボタンのクリックイベントハンドラーを追加
        document.querySelectorAll('.btn-detail').forEach(button => {
            button.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                // Ajaxリクエストを送信して詳細情報を取得し、モーダルウィンドウに表示する処理を追加
            });
        });
    </script>
@endsection