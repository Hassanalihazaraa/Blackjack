<?php
declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

//Dealer class
class Dealer extends Player
{
    const DEALER_LIMIT = 15;

    //getting the dealer score when hit
    public function hit(): void
    {
        while ($this->getScore() < self::DEALER_LIMIT) {
            parent::hit();
        }
    }
}
