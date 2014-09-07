[![Build Status](https://travis-ci.org/suzuki86/QuickBot.svg?branch=master)](https://travis-ci.org/suzuki86/QuickBot) [![Coverage Status](https://coveralls.io/repos/suzuki86/QuickBot/badge.png?branch=master)](https://coveralls.io/r/suzuki86/QuickBot?branch=master)

## Dependencies

- [twitteroauth](https://github.com/abraham/twitteroauth)

## Usage

- Write text you want to tweet in tweets.txt.
- Get instance by passing TwitterOAuth object to constructor of QuickBot.
- Run tweet method, then one of the lines in tweets.txt will be tweeted at random.

```php
<?php

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
