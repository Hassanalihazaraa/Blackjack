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

    public function getCard(): array
    {
        $this->cards;
    }

    public function setCard(Card $card): array
    {
        $this->cards[] = [$card->getUnicodeCharacter(true), $card->getValue()];
    }


    //Surrender
    public function surrender(): void
    {
        $this->hasLost(true);
    }

    //player score
    public function getScore(): int
    {
        $playerCards = $this->getCard();
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

class Dealer extends Player
{
    const DEALER_LIMIT = 15;

}
