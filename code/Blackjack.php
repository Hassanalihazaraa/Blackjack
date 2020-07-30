<?php
declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

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
    //construct the player and the dealer
    public function __construct()
    {
        $deck = new Deck();
        $deck->shuffle();
        $this->player = new Player($deck);
        $this->dealer = new Dealer($deck);
        $this->deck = $deck;
    }

    //get player
    public function getPlayer(): Player
    {
        return $this->player;
    }

    //get dealer
    public function getDealer(): Dealer
    {
        return $this->dealer;
    }

    //get deck
    public function getDeck(): Deck
    {
        return $this->deck;
    }

    //set deck
    public function setDeck(Deck $deck): void
    {
        $this->deck = $deck;
    }

    //start  new game
    public function newGame()
    {
        if (isset($_SESSION['Blackjack'])) {
            session_destroy();
            session_start();
            $_SESSION['Blackjack'] = new Blackjack();
        }
    }

    //Define winner
    public function defineWinner()
    {
        if (!$_SESSION['Blackjack']->getPlayer()->hasLost() && !$_SESSION['Blackjack']->getDealer()->hasLost()) {
            if ($_SESSION['Blackjack']->getDealer()->getScore() < $_SESSION['Blackjack']->getPlayer()->getScore()) {
                $_SESSION['Blackjack']->getDealer()->setLost(true);
                session_destroy();
            } else {
                $_SESSION['Blackjack']->getPlayer()->setLost(true);
                session_destroy();
            }
        }
    }
}
