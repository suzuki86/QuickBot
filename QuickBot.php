<?php

class QuickBot{
  private $endpoint;
  private $filename;
  public $twitter;

  public function __construct($twitter){

    /**
     * Set twitteroauth object.
     */
    $this->twitter = $twitter;

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
    $response = $this->twitter->oAuthRequest(
      $this->endpoint,
      'POST',
      array(
        'status' => $text
      )
    );
    return $response;
  }
}
