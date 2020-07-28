<?php
declare(strict_types=1);

class Blackjack
{
    private $player;
    private $dealer;
    private $deck;

    /**
     * Blackjack constructor.
     * @param $player
     * @param $dealer
     * @param $deck
     */
    public function __construct()
    {
        $deck = new Deck();
        $deck->shuffle();

        $this->player = new Player($deck);
        $this->dealer = new Dealer($deck);
        $this->deck = $deck;
    }

    public function getPlayer()
    {
        return $this->player;
    }

    public function getDealer()
    {
        return $this->dealer;
    }
}
