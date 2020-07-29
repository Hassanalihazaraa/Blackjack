<?php
declare(strict_types=1);

?>

<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid">
    <div class="card-deck">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Player</h5>
                <?php
                
                foreach ($) {

                }
                ?>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Dealer</h5>
                <?php
                foreach () {

                }
                ?>
            </div>
        </div>
    </div>
</div>
<form class="text-center mt-5" method="post" action="">
    <button class="btn btn-info" name="newgame" value="new game" type="submit">New game</button>
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