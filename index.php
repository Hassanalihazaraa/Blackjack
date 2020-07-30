<?php
declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

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

//player
if (isset($_POST['hit']) && $_POST['hit'] === 'hit') {
    $game->getPlayer()->hit($game);
    if ($game->getPlayer()->hasLost()) {
        session_destroy();
    }
}
//stand
if (isset($_POST['stand']) && $_POST['stand'] === 'stand') {
    $game->getDealer()->hit($game);
    $game->Game();
    if ($game->getDealer()->hasLost()) {
        session_destroy();
    }
}
//surrender
if (isset($_POST['surrender']) && $_POST['surrender'] === 'surrender') {
    $game->getPlayer()->surrender();
    session_destroy();
}


require_once 'view.php';


