<?php

function play() {
    $head = rand(1, 6);
    $body = rand(1, 6);
    $legs = rand(1, 6);

    $robot = array($head, $body, $legs);

    displayBot($robot);
    displayName($robot);

}

function displayBot($robot) {

    echo "<img class='robot' alt='Robot Head' title='Robot Head' src='img/head$robot[0].png'>";
    echo "<img class='robot' alt='Robot Body' title='Robot Body' src='img/body$robot[1].png'>";
    echo "<img class='robot' alt='Robot Legs' title='Robot Legs' src='img/legs$robot[2].png'>";

}

function displayName($robot){

    echo "<h2>";
    switch($robot[0]) {
        case 1:
            echo "The Crystal ";
            break;
        case 2:
            echo "The Bulbous ";
            break;
        case 3:
            echo "The Mechanic ";
            break;
        case 4:
            echo "The Signaling ";
            break;
        case 5:
            echo "The Drooling ";
            break;
        case 6:
            echo "The Glassy-Eyed ";
            break;
        case 7:
            echo "The Crazy-Eyed ";
            break;
    }

    switch ($robot[1]) {
        case 1:
            echo "Computing ";
            break;
        case 2:
            echo "Spinning ";
            break;
        case 3:
            echo "Measuring ";
            break;
        case 4:
            echo "Bending ";
            break;
        case 5:
            echo "Recording ";
            break;
        case 6:
            echo "Oscillating ";
            break;
        case 7:
            echo "Helper ";
            break;
    }
    echo "Bot " . array_sum($robot) . "00";
    echo "</h2>";

    if ($robot[0] == 2 && $robot[1] == 4) {
        echo "<h3 id='rare'><span id='rare-color'>Congratulations!</span> <br>You made a rare robot! +" . array_rand($robot) . " point(s)</h3>";
    } else if ($robot[0] == 3 && $robot[1] == 1) {
        echo "<h3 id='very-rare'><span id='very-rare-color'>Congratulations!</span>  <br>You made a VERY rare robot! +" . array_rand($robot) . " point(s)</h3>";
    } else if ($robot[0] == 1 && $robot[1] == 1 && $robot[2] == 1) {
        array_push($robot, 7, 7, 7);
        echo "<h3 id='super-rare'><span id='super-rare-color'>Congratulations!</span>  <br>You unlocked a new pair of legs!</h3>";
    }
}


?>
