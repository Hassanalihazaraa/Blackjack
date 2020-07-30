<?php
declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

class Player
{
    const PLAYER_LIMIT = 21;
    private array $cards = [];
    private bool $lost = false;

    //Draw two cards
    public function __construct(Deck $deck)
    {
        $this->cards[] = $deck->drawCard();
        $this->cards[] = $deck->drawCard();
    }

    //hit method
    public function hit(): void
    {
        $deck = $_SESSION['Blackjack']->getDeck();
        $card = $deck->drawCard();
        $this->setCard($card);
        $_SESSION['Blackjack']->setDeck($deck);

        if ($this->getScore() > self::PLAYER_LIMIT) {
            $this->setLost(true);
        }
    }

    //get hasLost property
    public function hasLost(): bool
    {
        return $this->lost;
    }

    //set lost
    public function setLost(bool $lost): void
    {
        $this->lost = $lost;
    }

    //getting cards from the player
    public function getCards(): array
    {
        return $this->cards;
    }

    //setting card from the Card class
    public function setCard(Card $card): array
    {
        $this->cards[] = $card;
        return $this->cards;
    }


    //Surrender
    public function surrender(): void
    {
        $this->setLost(true);
    }

    //player score
    public function getScore(): int
    {
        $score = 0;
        foreach ($this->getCards() as $playerCard) {
            $score += $playerCard->getValue();
        }
        return $score;
    }
}

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
