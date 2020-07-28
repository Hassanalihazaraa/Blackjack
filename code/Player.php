<?php

/**
 * Player class
 *
 * properties:
 * cards (array)
 * lost (bool = false)
 *
 * empty methods
 * hits
 * surrender
 * getScore
 * hasLost
 */

class Player
{
   // private cards = [];
    private $lost = false;
    private $hits;
    private $surrender;
    private $getScore;
    private $hasLost;
 /**
 * Player constructor.
 * @param bool $lost
 * @param $hits
 * @param $surrender
 * @param $getScore
 * @param $hasLost
 */
 public function __construct($lost, $hits, $surrender, $getScore, $hasLost)
{
    $this->lost = $lost;
    $this->hits = $hits;
    $this->surrender = $surrender;
    $this->getScore = $getScore;
    $this->hasLost = $hasLost;
}


}

