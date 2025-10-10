# パフォーマンス最適化ガイド

このドキュメントでは、Laravelアプリケーションのパフォーマンス最適化について説明します。

## 実装された最適化

### 1. バンドルサイズの最適化

#### CSS最適化
- **統合**: 9個の個別CSSファイルを1つの`app.min.css`に統合
- **圧縮**: CSSNanoを使用してCSSを圧縮
- **バージョニング**: キャッシュバスティングのためのファイルバージョニング
- **遅延読み込み**: クリティカルCSSの遅延読み込み

#### JavaScript最適化
- **Tree Shaking**: 使用されていないlodash関数を除外
- **Vendor分離**: lodashとaxiosを別ファイルに分離
- **遅延読み込み**: JavaScriptの遅延読み込み（defer属性）

### 2. データベース最適化

#### インデックス追加
```sql
-- 検索最適化のためのインデックス
CREATE INDEX contacts_name_search ON contacts (first_name, last_name);
CREATE INDEX contacts_email_search ON contacts (email);
CREATE INDEX contacts_gender_search ON contacts (gender);
CREATE INDEX contacts_category_search ON contacts (category_id);
CREATE INDEX contacts_created_at_search ON contacts (created_at);
CREATE INDEX contacts_gender_category_search ON contacts (gender, category_id);
```

#### クエリ最適化
- **Eager Loading**: N+1問題の解決
- **キャッシュ**: カテゴリデータと検索結果のキャッシュ

### 3. キャッシュ戦略

#### 実装されたキャッシュ
- **カテゴリデータ**: 1時間キャッシュ
- **検索結果**: 5分間キャッシュ
- **ビューキャッシュ**: 本番環境で有効

#### キャッシュキー
```php
// カテゴリデータ
'categories' => 3600秒

// 検索結果
'search_' . md5(serialize($searchParams)) => 300秒
```

### 4. レスポンス最適化

#### 圧縮
- **Gzip圧縮**: 1KB以上のレスポンスを自動圧縮
- **圧縮レベル**: 6（パフォーマンスと圧縮率のバランス）

#### HTTP最適化
- **DNS Prefetch**: 外部リソースの事前解決
- **Preload**: クリティカルCSSの事前読み込み

### 5. 設定最適化

#### 本番環境設定
```bash
# .env設定例
APP_ENV=production
APP_DEBUG=false
CACHE_DRIVER=redis
VIEW_CACHE=true
PERFORMANCE_CACHE_ENABLED=true
RESPONSE_COMPRESSION_ENABLED=true
```

## 使用方法

### アセットのビルド
```bash
# 開発環境
npm run dev

# 本番環境
npm run production
```

### パフォーマンス最適化コマンド
```bash
# 全体的な最適化
php artisan optimize:performance

# 個別最適化
php artisan cache:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### キャッシュの管理
```bash
# キャッシュクリア
php artisan cache:clear

# 設定キャッシュ
php artisan config:cache

# ルートキャッシュ
php artisan route:cache

# ビューキャッシュ
php artisan view:cache
```

## パフォーマンス測定

### 推奨ツール
- **Lighthouse**: Webページのパフォーマンス測定
- **New Relic**: アプリケーションパフォーマンス監視
- **Laravel Telescope**: デバッグとパフォーマンス分析

### 測定指標
- **First Contentful Paint (FCP)**: < 1.8秒
- **Largest Contentful Paint (LCP)**: < 2.5秒
- **Time to Interactive (TTI)**: < 3.8秒
- **Cumulative Layout Shift (CLS)**: < 0.1

## 今後の最適化案

### 1. データベース最適化
- **クエリ最適化**: より複雑なクエリの最適化
- **接続プーリング**: データベース接続の最適化
- **読み取り専用レプリカ**: 読み取りクエリの分散

### 2. アプリケーション最適化
- **Laravel Octane**: アプリケーションの永続化
- **Redis**: セッションとキャッシュの高速化
- **CDN**: 静的アセットの配信最適化

### 3. フロントエンド最適化
- **画像最適化**: WebP形式の使用
- **Critical CSS**: クリティカルパスの最適化
- **Service Worker**: オフライン対応とキャッシュ戦略

## 注意事項

1. **キャッシュの無効化**: データ更新時は関連キャッシュをクリア
2. **メモリ使用量**: キャッシュのメモリ使用量を監視
3. **デバッグ**: 本番環境ではデバッグモードを無効化
4. **ログ**: パフォーマンスログの適切な管理

## トラブルシューティング

### よくある問題
1. **キャッシュが更新されない**: `php artisan cache:clear`を実行
2. **アセットが読み込まれない**: `npm run production`を実行
3. **圧縮が効かない**: ミドルウェアの設定を確認

### ログの確認
```bash
# アプリケーションログ
tail -f storage/logs/laravel.log

# クエリログ（開発環境）
# DB_QUERY_LOG=true を .env に設定
```