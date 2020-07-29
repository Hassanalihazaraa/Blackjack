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
        /*
        $deck = new Deck();
        $deck->shuffle();

        $this->player = new Player($deck);
        $this->dealer = new Dealer($deck);
        $this->deck = $deck;*/
    }

    public function hit(Blackjack $game): void
    {
        $deck = $game->getDeck();
        $card = $deck->drawCard();
        $game->setDeck($deck);
        $this->setCard($card);

        if ($this->getScore() > self::PLAYER_LIMIT) {
            $this->setLost(true);
        }
    }

    public function getCards(): array
    {
        return $this->cards;
    }

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
        $playerCards = $this->getCards();
        $score = 0;
        foreach ($playerCards as $playerCard) {
            $score += $playerCard->getValue();
        }
        return $score;
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
}

//Dealer
class Dealer extends Player
{
    const DEALER_LIMIT = 15;

    public function hit(Blackjack $game): void
    {
        if ($this->getScore() > self::DEALER_LIMIT) {
            parent::hit($game);
        }
    }

}
