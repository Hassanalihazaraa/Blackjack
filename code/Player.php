<?php
//declare(strict_types=1);

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

    public function hit(Blackjack $game): void
    {
        $deck = $game->getDeck();
        $card = $deck->drawCard();
        $this->setCard($card);
        $game->setDeck($deck);

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

    public function getCards(): array
    {
        return $this->cards;
    }

    public function setCard(Card $card): array
    {
        $this->cards[] = $card;//[$card->getUnicodeCharacter(true), $card->getValue()];
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

//Dealer
class Dealer extends Player
{
    const DEALER_LIMIT = 15;

    public function hit(Blackjack $game): void
    {
        while($this->getScore() > self::DEALER_LIMIT) {
            parent::hit($game);
        }
    }

}
