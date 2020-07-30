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
    $_SESSION['Blackjack'] = new Blackjack();
}
//New game
if (isset($_POST['nGame'])) {
    session_destroy();
}

//player
if (isset($_POST['hit'])) {
    $_SESSION['Blackjack']->getPlayer()->hit($_SESSION['Blackjack']);
    if ($_SESSION['Blackjack']->getPlayer()->hasLost()) {
        session_destroy();
    }
}

//stand
if (isset($_POST['stand'])) {
    $_SESSION['Blackjack']->getDealer()->hit($_SESSION['Blackjack']);
    $_SESSION['Blackjack']->Game();
    if ($_SESSION['Blackjack']->getDealer()->hasLost()) {
        session_destroy();
    }
}

//surrender
if (isset($_POST['surrender'])) {
    $_SESSION['Blackjack']->getPlayer()->surrender();
    session_destroy();
}


require_once 'view.php';


