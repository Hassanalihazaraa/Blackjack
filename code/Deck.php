<?php
declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

class Deck
{
    private const CARDS_PER_SUIT = 14;//including the knight card.
    private const KNIGHT_CARD = 12;//In italian & spanish decks there is a knight card, but we don't need it

    private $cards = [];

    public function __construct()
    {
        $suits = [
            Suit::SPADE(),
            Suit::HEART(),
            Suit::CLUB(),
            Suit::DIAMOND(),
        ];

        foreach ($suits as $suit) {
            foreach (range(1, self::CARDS_PER_SUIT) as $i) {
                if ($i === self::KNIGHT_CARD) continue;

                $this->cards[] = new Card($suit, $i);
            }
        }
    }

    public function shuffle(): void
    {
        shuffle($this->cards);
    }

    /** @return class[] */
    public function getCards(): array
    {
        return $this->cards;
    }

    public function drawCard(): ?Card
    {
        return array_shift($this->cards);
    }
}