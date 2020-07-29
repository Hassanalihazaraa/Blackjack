<?php
declare(strict_types=1);

require_once './code/Player.php';
require_once './code/Blackjack.php';
require_once './code/Card.php';
require_once './code/Deck.php';
require_once './code/Suit.php';


session_start();

if (!isset($_SESSION['Blackjack'])) {
    $game = new Blackjack();
    $_SESSION['Blackjack'] = serialize($game);
} else {
    $game = unserialize($_SESSION['Blackjack'], [Blackjack::class]);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //player
    if (isset($_POST['hit']) && $_POST['hit'] === 'hit') {
        $game->getPlayer()->hit($game);
        $_SESSION['Blackjack'] = serialize($game);
        if ($game->getPlayer()->hasLost()) {
            unset($_SESSION['Blackjack']);
        }
    }
//dealer
    if (isset($_POST['stand']) && $_POST['stand'] === 'stand') {
        $game->getDealer()->hit($game);
        $_SESSION['Blackjack'] = serialize($game);
        if ($game->getDealer()->hasLost()) {
            unset($_SESSION['Blackjack']);
        }
    }
//surrender
    if (isset($_POST['surrender']) && $_POST['surrender'] === 'surrender') {
        $game->getPlayer()->surrender();
        unset($_SESSION['Blackjack']);
    }
}


require_once 'view.php';


