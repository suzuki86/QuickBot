<?php

require_once __DIR__ . '/twitteroauth/twitteroauth/twitteroauth.php';
require_once 'QuickBot.php';

class QuickBotText extends PHPUnit_Framework_TestCase{

  public function testLoadTextFile(){
    $qb = new QuickBot(new TwitterOAuth('', '', '', ''));
    $expected = array(
      'はじめまして',
      'おはよう',
      'こんにちは',
      'こんばんは',
      'さようなら'
    );
    $this->assertSame($expected, $qb->loadTextFile());
  }

  public function testTweet(){
    /**
     * Create TwitterOAuth mock object.
     */
    $mockTwitterOAuth = $this->getMockBuilder('TwitteroAuth')
      ->setConstructorArgs(array('', '', '', ''))
      ->setMethods(array())
      ->getMock();
    $mockTwitterOAuth->expects($this->once())
      ->method('oAuthRequest')
      ->will($this->returnValue(true));

    $qb = new QuickBot($mockTwitterOAuth);
    $qb->tweet();
  }
}
