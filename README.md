[![Build Status](https://travis-ci.org/suzuki86/QuickBot.svg?branch=master)](https://travis-ci.org/suzuki86/QuickBot)

## 依存ライブラリ

- [twitteroauth](https://github.com/abraham/twitteroauth) をパスが通った位置に配置します。

## 使いかた

- tweets.txt にツイートを改行区切りで保存します。
- TwitterOAuth オブジェクトを QuickBot の引数に渡してインスタンスを取得します。
- tweet メソッドを実行すると tweets.txt の内容をランダムにツイートします。

```php
require_once 'QuickBot.php';
require_once 'twitteroauth.php';

$twitter = new TwitterOAuth(
  'your_consumer_key',
  'your_consumer_secret',
  'your_access_token',
  'your_access_token_secret'
);
$qb = new QuickBot($twitter);
$qb->tweet();

```
