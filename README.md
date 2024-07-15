# FashionablyLate

## 環境構築
1. リポジトリをクローン
    ```bash
    git clone <リポジトリのURL>
    cd <リポジトリ名>
    ```

2. Dockerコンテナのビルド
    ```bash
    docker-compose up -d --build
    ```

3. コンテナに入る
    ```bash
    docker-compose exec php bash
    ```

4. パッケージをインストール
    ```bash
    composer install
    ```

5. 環境ファイルを設定
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```
    ※環境変数を変更

6. データベースのマイグレーションとシーディング
    ```bash
    php artisan migrate --seed
    ```

## 使用技術(実行環境)
・php:7.4.9
・nginx:1.21.1
・Laravel:8.75
・MySQL:8.0.26


## ER図
< - - - 作成したER図の画像 - - - >

## URL
・開発環境：http://localhost/
・phpMyAdmin:http://localhost:8080/
