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
//player
if (isset($_POST['hit'])) {
    $game->getPlayer()->hit($game);
    $_SESSION['Blackjack'] = serialize($game);
    if ($game->getPlayer()->hasLost()) {
        unset($_SESSION['Blackjack']);
    }
}
//dealer
if (isset($_POST['stand'])) {
    $game->getDealer()->hit($game);
    $_SESSION['Blackjack'] = serialize($game);
    if ($game->getDealer()->hasLost()) {
        unset($_SESSION['Blackjack']);
    }
}
//surrender


require_once 'view.php';


