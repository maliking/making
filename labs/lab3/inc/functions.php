<?php

    $deck = range(1,41);
    shuffle($deck);
    $totalPoints = 0;

    function displayHand() {
        global $deck, $totalPoints;
        $handPoints = 0;
        $handAces = 0;

        for($i = 0; $i < 5; $i++) {
            $lastCard = array_pop($deck);
            $cardValue = $lastCard % 13;
            $cardSuit;
            if($lastCard <= 13) {
            $cardSuit = "clubs";
            } else if($lastCard > 13 && $lastCard <= 26) {
                $cardSuit = "diamonds";
            } else if($lastCard > 26 && $lastCard <= 39) {
                $cardSuit = "hearts";
            } else if($lastCard > 39) {
                $cardSuit = "spades";
            }
            if($cardValue == 0) {
                $cardValue = 13;
            }
            if ($cardValue == 1) { //identifies an ace
                echo "<img class='ace' src='img/$cardSuit/$cardValue.png' alt='Ace' />";
                $handAces = $handAces + 1;   //another way to do this is using the syntax: $handAces++;
            }
            else {
                echo "<img src='img/$cardSuit/$cardValue.png' alt='Ace' />";
            }
                $handPoints = $handPoints + $cardValue;
        }
        echo " <h4>Points: " . $handPoints . "</h4>";

        $totalPoints = $totalPoints + $handPoints;
        return $handAces;
    }







    function identifyWinner($player1Aces, $player2Aces) {
        if ($player1Aces > $player2Aces) {
            echo "Player 1";
        } else if ($player1Aces < $player2Aces) {
            echo "Player 2";
        } else {
            echo "Tie";
        }
    }


?>
