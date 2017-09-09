<?php
    function play() {
        for ($i = 1 ; $i < 4 ; $i++) {
            // Find 3 random numbers from 0 to 3
            ${"randomValue" . $i} = rand(0,3);
            // Display 3 symbols according to their corresponding numbers
            displaySymbol(${"randomValue" . $i}, $i);
        }
        displayPoints($randomValue1, $randomValue2, $randomValue3);
    }

    function displaySymbol($randomValue, $pos) {
        switch ($randomValue) {
            case 0: $symbol = "seven";
                    break;
            case 1: $symbol = "grapes";
                    break;
            case 2: $symbol = "cherry";
                    break;
            case 3: $symbol = "lemon";
                    break;
        }
        echo "<img id='reel$pos' src='img/$symbol.png' alt='$symbol' title='" . ucfirst($symbol) . "' width='70' />";
    }

    function displayPoints($randomValue1, $randomValue2, $randomValue3) {
        echo '<div id="output">';
        if ($randomValue1 == $randomValue2 && $randomValue2 == $randomValue3 ) {
                switch ($randomValue1) {
                case 0: $totalPoints = 1000;
                        echo '<h1>Jackpot!</h1>';
                        echo '<audio autoplay>';
                        echo '  <source src="sounds/jackpot.ogg" type="audio/ogg">';
                        echo '  <source src="sounds/jackpot.mp3" type="audio/mpeg">';
                        echo '  Your browser does not support the audio element.';
                        echo '</audio>';
                        break;
                case 1: $totalPoints = 900;
                        break;
                case 2: $totalPoints = 500;
                        break;
                case 3: $totalPoints = 250;
                        break;
            }
            echo "<h2>You won $totalPoints points!</h2>";
        } else {
            echo "<h3>Try again!</h3>";
        }
        echo '</div>';
    }

    //     if ($randomValue == 0) {
    //         $symbol = "cherry";
    //     }
    //     else if ($randomValue == 1) {
    //         $symbol = "seven";
    //     }
    //     else {
    //         $symbol = "lemon";
    //     }
?>