<?php
declare(strict_types=1);

class Player
{
    const PLAYER_LIMIT = 21;
    private array $cards = [];
    private bool $lost = false;

    //Draw two cards
    public function __construct(deck $deck)
    {
        $this->cards[] = $deck->drawCard();
        $this->cards[] = $deck->drawCard();

        $deck = new Deck();
        $deck->shuffle();

        $this->player = new Player($deck);
        $this->dealer = new Dealer($deck);
        $this->deck = $deck;
    }

    public function hit()
    {

    }

    //set lost to true
    public function surrender(): void
    {
        $this->hasLost(true);
    }

    public function getScore()
    {

    }
    //get lost property
    public function hasLost(): bool
    {
        return $this->lost;
    }



}

class Dealer extends Player
{
    const DEALER_LIMIT = 15;

}
