<?php
declare(strict_types=1);

require_once 'autoload/autoloader.php';

session_start();

if (!isset($_SESSION['Blackjack.class'])) {
    $game = new Blackjack();
    $_SESSION['Blackjack.class'] = serialize($game);
} else {
    $game = unserialize($_SESSION['Blackjack.class'], [Blackjack::class]);
}
//player
if (isset($_POST['hit'])) {
    $game->getPlayer()->hit($game);
    $_SESSION['Blackjack.class'] = serialize($game);
    if ($game->getPlayer()->hasLost()) {
        unset($_SESSION['Blackjack.class']);
    }
}
//dealer
if (isset($_POST['stand'])) {
    $game->getDealer()->hit($game);
    $_SESSION['Blackjack.class'] = serialize($game);
    if ($game->getDealer()->hasLost()) {
        unset($_SESSION['Blackjack.class']);
    }
}
//surrender


require 'view.php';


