<?php

require_once 'QuickBot.php';

class QuickBotText extends PHPUnit_Framework_TestCase{

  public function testLoadTextFile(){
    $qb = new QuickBot('', '', '', '');
    $expected = array(
      'はじめまして',
      'おはよう',
      'こんにちは',
      'こんばんは',
      'さようなら'
    );
    $this->assertSame($expected, $qb->loadTextFile());
  }
}
