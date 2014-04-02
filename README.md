## 依存ライブラリ

- [twitteroauth](https://github.com/abraham/twitteroauth) を lib 以下に配置します。

```
└── lib
    ├── OAuth.php
    └── twitteroauth.php
```

## 使いかた

- tweets.txt にツイートを改行区切りで保存します。
- tweet メソッドを実行すると tweets.txt の内容をランダムにツイートします。

```php
require_once 'QuickBot.php';

$qb = new QuickBot(
  'your_consumer_key',
  'your_consumer_secret',
  'your_access_token',
  'your_access_token_secret'
);
$qb->tweet();

```
