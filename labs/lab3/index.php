<?php include 'inc/functions.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Ace Poker | Mali King</title>
    <link href="https://fonts.googleapis.com/css?family=Cabin" rel="stylesheet">
    <style>
        body {
            font-family: 'Cabin', sans-serif;
        }
        #main {
            width: 750px;
            margin: 40px auto 0px auto;
            display: block;
            text-align: center;
        }

        .ace {
            border: 3px solid yellow;
        }

        img {
            width: 100px;
            margin-left: 10px;
        }

        h3 {
            text-align: left;
        }
        h4 {
            text-align: right;
            display: inline;
            position: relative;
            bottom: 65px;
            left: 20px;
        }
    </style>
    </head>

    <body>
        <div id="main">
            <h1>Ace Poker</h1>
            <h2>The player with the most aces wins all the points!</h2>
            <h3>Your Hand</h3>
            <div class="card-row">
            <?php
                $player1Aces = displayHand();
            ?>
            </div>
            <h3>Computer's Hand</h3>
            <div class="card-row">
            <?php
                $player2Aces = displayHand();

            ?>

            </div>
            <h2>
            <?=identifyWinner($player1Aces, $player2Aces)?>
            Wins: <?=$totalPoints?> points!</h2>
        </div>


    </body>
</html>