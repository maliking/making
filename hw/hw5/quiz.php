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
        <title>HW 4</title>
        <meta charset="utf-8" />
        <script src="../../bootstrap/js/jquery.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
        <link href="https://fonts.googleapis.com/css?family=Coustard|Source+Sans+Pro" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="js/functions.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header navbar-right">
                        <?php
                            if(isset($_SESSION['username']) && !empty($_SESSION['username'])) {
                                echo "<p class=\"navbar-text\">Signed in as " . $_SESSION['username'] . "</p>";
                                echo "<a class=\"btn btn-default navbar-btn\" href=\"logout.php\">Logout</a>";
                            } else {
                                echo "<a class=\"btn btn-success navbar-btn\" href=\"index.php\">Login</a>";
                            }
                        ?>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-sm-offset-4">
                    <h1>Grammar Quiz</h1>
                    <form id="quizForm">
                        <div class="form-group">
                            <label for="q1">1. Sorry, Lisa _____ not here at the moment.</label>
                            <input type="text" class="form-control" id="q1">
                        </div>
                        <p id="answer1"></p>
                        <div class="form-group">
                            <label for="optradio">2. Do you _____ chocolate milk?</label>
                            <div class="radio">
                                <label><input type="radio" value="like" name="q2">like</label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" value="likes" name="q2">likes</label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" value="be like" name="q2">be like</label>
                            </div>
                        </div>
                        <p id="answer2"></p>
                        <div class="form-group">
                            <label for="q3">3. You _____ so happy today!</label>
                            <select name="q3" class="form-control" id="q3">
                                <option value="looks">looks</option>
                                <option value="seem">seem</option>
                                <option value="be">be</option>
                            </select>
                        </div>
                        <p id="answer3"></p>
                        <div class="form-group">
                            <label for="checkbox">4. We _____ in that house.</label>
                            <div class="checkbox">
                              <label><input name="q4" type="checkbox" value="lived">lived</label>
                            </div>
                            <div class="checkbox">
                              <label><input name="q4" type="checkbox" value="living">living</label>
                            </div>
                            <div class="checkbox">
                              <label><input name="q4" type="checkbox" value="live">live</label>
                            </div>
                            <div class="checkbox">
                              <label><input name="q4" type="checkbox" value="to live">to live</label>
                            </div>
                        </div>
                        <p id="answer4"></p>
                        <div class="form-group">
                            <label for="q5">5. They're not here. They ____________ right now.</label>
                            <div class="radio">
                                <label><input type="radio" name="q5">go to school</label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" name="q5">swim at the beach</label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" name="q5">are on holiday</label>
                            </div>
                        </div>
                        <p id="answer5"></p>
                        <div class="form-group">
                            <label for="q6">6. Where are you coming _____?</label>
                            <input type="text" class="form-control" id="q6">
                        </div>
                        <p id="answer6"></p>
                        <p id="congrats"></p>
                        <p id="points">Total Score: </p>
                        <span id="score"></span>
                        <br>
                        <p id="avg"></p>
                    </form>
                    <button id="myBtn" class="btn btn-success" onclick="checkAnswers()">Check Answers!</button>
                </div>
            </div>
        </div>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    </body>
</html>
