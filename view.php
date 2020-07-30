<?php
declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once 'index.php';
/** @var Blackjack $_Session['Blackjack'] */
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="container-fluid">
    <?php
    if ($_SESSION['Blackjack']->getPlayer()->hasLost()) {
        echo '<div class="alert alert-dark" role="alert">You lose!</div>';
    }

    if ($_SESSION['Blackjack']->getDealer()->hasLost()) {
        echo '<div class="alert alert-dark" role="alert">You win!</div>';
    }
    ?>

    <div class="card-deck">
        <div class="card">
            <div class="card-body text-center">
                <h5 class="card-title">Player score: <?php echo $_SESSION['Blackjack']->getPlayer()->getScore() ?></h5>
                <?php
                foreach ($_SESSION['Blackjack']->getPlayer()->getCards() as $card) {
                    echo $card->getUnicodeCharacter(true);
                }
                //var_dump($game->getPlayer()->getCards());
                ?>
            </div>
        </div>
        <div class="card">
            <div class="card-body text-center">
                <h5 class="card-title">Dealer score: <?php echo $_SESSION['Blackjack']->getDealer()->getScore() ?></h5>
                <?php
                foreach ($_SESSION['Blackjack']->getDealer()->getCards() as $card) {
                    echo $card->getUnicodeCharacter(true);
                }
                //var_dump($game->getDealer()->getCards());
                ?>
            </div>
        </div>
    </div>
</div>


<form class="text-center mt-5" method="post" action="index.php">
    <button class="btn btn-info" name="nGame" value="nGame" type="submit">New game</button>
    <button class="btn btn-primary" name="hit" value="hit" type="submit">Hit</button>
    <button class="btn btn-danger" name="stand" value="stand" type="submit">Stand</button>
    <button class="btn btn-success" name="surrender" value="surrender" type="submit">Surrender</button>
</form>

<!-- Latest compiled and minified JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"></script>
</body>
</html>

