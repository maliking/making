/* global $ */
$(document).ready(function() {
    var randomNumber = Math.floor(Math.random() * 99) + 1;
    var guesses = document.querySelector('#guesses');
    var lastResult = document.querySelector('#lastResult');
    var lowOrHi = document.querySelector('#lowOrHi');
    var guessSubmit = document.querySelector('.guessSubmit');
    var guessField = document.querySelector('.guessField')
    var guessCount = 1;
    var wins = document.getElementById('wins');
    var losses = document.getElementById('losses');
    var numWins = 0,
        numLosses = 0;
    guessField.focus();
    var resetButton = document.querySelector('#reset');
    resetButton.style.display = 'none';

    function checkGuess() {
        var userGuess = Number(guessField.value);
        if (guessCount === 1) {
            guesses.innerHTML = 'Preview guesses: ';
        }

        if (userGuess > 99 || isNaN(userGuess)) {
            alert('Please enter a number lower than 99');
            guessCount -= 1;
        }
        else {
            guesses.innerHTML = guesses.innerHTML + userGuess + ' ';
        }

        if (userGuess === randomNumber) {
            lastResult.innerHTML = 'Congratulations! You got it right!';
            $("#lastResult").css("background-color", "green");
            lowOrHi.innerHTML = '';
            iWin();
            setGameOver();
        }
        else if (guessCount === 7) {
            lastResult.innerHTML = 'Sorry, you lost!';
            iLose();
            setGameOver();
        }
        else {
            lastResult.innerHTML = 'Wrong!';
            $("#lastResult").css("background-color", "red");
            if (userGuess < randomNumber) {
                lowOrHi.innerHTML = 'Last guess was too low!';
            }
            else if (userGuess > randomNumber) {
                lowOrHi.innerHTML = 'Last guess was too high!';
            }
        }

        guessCount++;
        guessField.value = '';
        guessField.focus();
    }

    guessSubmit.addEventListener('click', checkGuess);

    function setGameOver() {
        guessField.disabled = true;
        guessSubmit.disabled = true;
        $("#reset").css("display", "inline");
        resetButton.addEventListener('click', resetGame);
    }

    function resetGame() {
        guessCount = 1;

        var resetParas = document.querySelectorAll('.resultParas p');
        for (var i = 0; i < resetParas.length; i++) {
            resetParas[i].textContent = '';
        }
        $("#reset").css("display", "none");
        guessField.disabled = false;
        guessSubmit.disabled = false;
        guessField.value = '';
        guessField.focus();
        $("#lastResult").css("background-color", "white");
        randomNumber = Math.floor(Math.random() * 99) + 1;
    }

    function iWin() {
        numWins += 1;
        wins.innerHTML = numWins;
    }

    function iLose() {
        numLosses += 1;
        losses.innerHTML = numLosses;
    }
});
