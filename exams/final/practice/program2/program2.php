<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: loginPage.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Program 2 </title>
        <meta charset="utf-8" />
        <script src="../../../../bootstrap/js/jquery.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
        <link href="https://fonts.googleapis.com/css?family=Coustard|Source+Sans+Pro" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="js/functions.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-sm-offset-4">
                    <h1>Easy Math Quiz</h1>
                    <form id="quizForm">
                        <div class="form-group">
                            <label for="q1">1. What is 2 + 2? </label>
                            <input type="text" class="form-control" id="q1">
                        </div>

                        <div class="form-group">
                            <label for="q2">1. What is 1 + 5? </label>
                            <input type="text" class="form-control" id="q2">
                        </div>

                        <div class="form-group">
                            <label for="q1"></label>
                            <input type="email" placeholder="Enter your email address" class="form-control" id="email" name="email">
                        </div>
                        Email: <p id="emailAddress"></p>
                        Q1: What is 2 + 2? <p id="answer1"></p>
                        Q2: What is 1 + 5? <p id="answer2"></p>
                        Attempt Score: <p id="attemptScore"></p>
                        Last Attempt Score: <p id="lastAttemptScore"></p>
                        Number of Attempts: <p id="numAttempts"></p>

                    </form>
                    <button id="myBtn" class="btn btn-success" onclick="checkAnswers()">Check Answers!</button>
                </div>
            </div>
        </div>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script>
        /* global $ */
            function checkAnswers() {
            var points = 0;
            var answer1 = $("#q1");
            var answer2 = $("#q2");

            if (answer1.val() === '4') {
                document.getElementById("answer1").style.color = 'red';
                document.getElementById("answer1").innerHTML = "<i class=\"fa fa-check\"></i> Correct! The answer was: 4";
                points++;
            } else {
                document.getElementById("answer1").style.color = 'red';
                document.getElementById("answer1").innerHTML = "<i class=\"fa fa-times\"></i> Incorrect! The correct answer was: 4";
            }

            if (answer2.val() === '6') {
                document.getElementById("answer2").style.color = 'red';
                document.getElementById("answer2").innerHTML = "<i class=\"fa fa-check\"></i> Correct! The answer was: 6";
                points++;
            } else {
                document.getElementById("answer2").style.color = 'red';
                document.getElementById("answer2").innerHTML = "<i class=\"fa fa-times\"></i> Incorrect! The correct answer was: 6";
            }

            document.getElementById("attemptScore").innerHTML = points;

            var attemptScore = $("#attemptScore").html();
            var email = $("#email").val();

            $.ajax ({
                type: "GET",
                url: "insertScores.php",
                data: { "lastScore" : attemptScore, "email": email },
                dataType: "json",
                success: function(data) {
                    alert(data.lastScore);
                    $("#lastAttemptScore").html(data.lastScore);
                    $("#numAttempts").html(data.numAttempts);
                    $("#emailAddress").val(data.email);
                }
            });
        }

        </script>
    </body>
</html>
