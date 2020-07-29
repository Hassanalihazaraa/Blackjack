<?php
declare(strict_types=1);

class Blackjack
{
    private $player;
    private $dealer;
    private $deck;

    /**
     * Blackjack.class constructor.
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

    public function getPlayer(): Player
    {
        return $this->player;
    }

    public function getDealer(): Dealer
    {
        return $this->dealer;
    }

    public function getDeck(): Deck
    {
        return $this->deck;
    }

    public function setDeck(Deck $deck): void
    {
        $this->deck = $deck;
    }

    public function gameplay(): void
    {
        if (!$this->getPlayer()->hasLost()) {

        }
    }
}
