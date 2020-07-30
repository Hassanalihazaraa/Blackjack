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
require_once './code/Dealer.php';

//start session
if (!isset($_SESSION['Blackjack'])) session_start();

//start a new game session
if (!isset($_SESSION['Blackjack'])) $_SESSION['Blackjack'] = new Blackjack();


switch (isset($_SESSION['Blackjack'])) {
    //New game
    case isset($_POST['newGame']):
        $_SESSION['Blackjack']->newGame();
        break;
    //hit
    case isset($_POST['hit']):
        $_SESSION['Blackjack']->getPlayer()->hit();
        if ($_SESSION['Blackjack']->getPlayer()->hasLost()) session_destroy();
        break;
    //stand
    case isset($_POST['stand']):
        $_SESSION['Blackjack']->getDealer()->hit($_SESSION['Blackjack']);
        $_SESSION['Blackjack']->defineWinner();
        break;
    //surrender
    case isset($_POST['surrender']):
        $_SESSION['Blackjack']->getPlayer()->surrender();
        session_destroy();
        break;
}

require_once 'view.php';


