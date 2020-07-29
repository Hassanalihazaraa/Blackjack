<?php
declare(strict_types=1);

require_once './code/Player.php';
require_once './code/Blackjack.php';
require_once './code/Deck.php';
require_once './code/Card.php';
require_once './code/Suit.php';

session_start();

if (!isset($_SESSION['Blackjack'])) {
    $game = new Blackjack();
    $_SESSION['Blackjack'] = serialize($game);
} else {
    $game = unserialize($_SESSION['Blackjack'], [Blackjack::class]);
}

require_once 'view.php';
