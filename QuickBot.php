<?php

require_once __DIR__ . '/lib/twitteroauth.php';

class QuickBot{
  private $ck;
  private $cs;
  private $at;
  private $ats;
  private $endpoint;
  private $filename;
  public $twitter;

  public function __construct($consumerKey, $consumerSecret, $accessToken, $accessTokenSecret){
    /**
     * Set consumer key, consumer secret,
     * access token, access token secret.
     */
    $this->ck = $consumerKey;
    $this->cs = $consumerSecret;
    $this->at = $accessToken;
    $this->ats = $accessTokenSecret;

    /**
     * Create and set TwitterOAuth object.
     */
    $this->twitter = new TwitterOAuth(
      $this->ck,
      $this->cs,
      $this->at,
      $this->ats
    );

    /**
     * Set endpoint for posting tweet.
     */
    $this->endpoint = 'https://api.twitter.com/1.1/statuses/update.json';

    /**
     * Set filename for load tweets.
     */
    $this->filename = 'tweets.txt';
  }

  /**
   * Load terms from text file.
   */
  public function loadTextFile(){
    $fh = fopen($this->filename, 'r');
    $terms = array();
    while($term = fgets($fh, 1024)){
      $terms[] = trim($term);
    }
    fclose($fh);
    return $terms;
  }

  /**
   * Select a term at random.
   */
  public function selectTerm($terms){
    return $terms[mt_rand(0, count($terms) - 1)]; 
  }

  /**
   * Tweet.
   */
  public function tweet(){
    $text = $this->selectTerm($this->loadTextFile());
    $response = $this->twitter->OAuthRequest(
      $this->endpoint,
      'POST',
      array(
        'status' => $text
      )
    );
    return $response;
  }
}
