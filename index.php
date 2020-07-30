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

if (!isset($_SESSION['Blackjack'])) {
    session_start();
}

if (!isset($_SESSION['Blackjack'])) {
    $_SESSION['Blackjack'] = new Blackjack();
}
//New game
if (isset($_POST['newGame'])) {
    if (isset($_SESSION['Blackjack'])) {
        session_destroy();
        session_start();
        $_SESSION['Blackjack'] = new Blackjack();
    }
}

//player
if (isset($_POST['hit'])) {
    $_SESSION['Blackjack']->getPlayer()->hit();
    if ($_SESSION['Blackjack']->getPlayer()->hasLost()) {
        session_destroy();
    }
}

//stand
if (isset($_POST['stand'])) {
    $_SESSION['Blackjack']->getDealer()->hit($_SESSION['Blackjack']);
    if (!$_SESSION['Blackjack']->getPlayer()->hasLost() && !$_SESSION['Blackjack']->getDealer()->hasLost()) {
        if ($_SESSION['Blackjack']->getDealer()->getScore() < $_SESSION['Blackjack']->getPlayer()->getScore()) {
            $_SESSION['Blackjack']->getDealer()->setLost(true);
            session_destroy();
        } else {
            $_SESSION['Blackjack']->getPlayer()->setLost(true);
            session_destroy();
        }
    }
}

//surrender
if (isset($_POST['surrender'])) {
    $_SESSION['Blackjack']->getPlayer()->surrender();
    session_destroy();
}


require_once 'view.php';


