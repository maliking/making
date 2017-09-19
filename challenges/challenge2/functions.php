<?php
        function play() {
            for ($i = 1 ; $i < 3 ; $i++) {
                ${randomValue . $i} = rand(10, 14);
            }
            displayCard1($randomValue1);
            displayCard2($randomValue2);
            displayResult($randomValue1, $randomValue2);
        }

        function displayCard1($randomValue1) {
            switch ($randomValue1) {
                case 10:
                    echo '<img class="card-left" src="cards/ten.png">';
                    break;
                case 11:
                    echo '<img  class="card-left" src="cards/jack.png">';
                    break;
                case 12:
                    echo '<img class="card-left"  src="cards/queen.png">';
                    break;
                case 13:
                    echo '<img  class="card-left" src="cards/king.png">';
                    break;
                case 14:
                    echo '<img  class="card-left" src="cards/ace.png">';
                    break;
            }

        }

        echo '<h3 id="left"> Human </h3>';

        function displayCard2($randomValue2) {
            switch ($randomValue2) {
                case 10:
                    echo '<img  class="card-right" src="cards/ten.png">';
                    break;
                case 11:
                    echo '<img  class="card-right" src="cards/jack.png">';
                    break;
                case 12:
                    echo '<img  class="card-right" src="cards/queen.png">';
                    break;
                case 13:
                    echo '<img  class="card-right" src="cards/king.png">';
                    break;
                case 14:
                    echo '<img  class="card-right" src="cards/ace.png">';
                    break;
            }

        }

        echo '<h3 id="right"> Computer </h3>';

        function displayResult($randomValue1, $randomValue2) {
            if ($randomValue1 > $randomValue2) {
                echo "<h2>Human wins</h2>";
            }
            else if ($randomValue1 < $randomValue2) {
                echo "<h2>Computer wins</h2>";
            }
            else {
                echo "<h2>It's a tie</h2>";
            }

        }
        ?>
