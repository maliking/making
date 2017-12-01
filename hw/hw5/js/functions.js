/* global $ */
function checkAnswers() {
    var points = 0;
    var answer1 = document.getElementById("quizForm").elements.namedItem("q1").value;
    var answer2 = document.getElementById("quizForm").elements.namedItem("q2").value;
    var answer3 = document.getElementById("quizForm").elements.namedItem("q3").value;
    var answer4 = $("[name=q4]");
    var answer5 = $("[name=q5]");
    var answer6 = $("#q6");

    if (answer1 === 'is') {
        document.getElementById("answer1").style.color = 'green';
        document.getElementById("answer1").innerHTML = "<i class=\"fa fa-check\"></i> Correct! The answer was: is";
        points++;
    } else {
        document.getElementById("answer1").style.color = 'red';
        document.getElementById("answer1").innerHTML = "<i class=\"fa fa-times\"></i> Incorrect! The correct answer was: is";
    }

    if (answer2 === 'like') {
        document.getElementById("answer2").style.color = 'forestgreen';
        document.getElementById("answer2").innerHTML = "<i class=\"fa fa-check\"></i> Correct! The answer was: like";
        points++;
    } else {
        document.getElementById("answer2").style.color = 'red';
        document.getElementById("answer2").innerHTML = "<i class=\"fa fa-times\"></i> Incorrect! The correct answer was: like";
    }

    if (answer3 === 'seem') {
        document.getElementById("answer3").style.color = 'green';
        document.getElementById("answer3").innerHTML = "<i class=\"fa fa-check\"></i> Correct! The answer was: seem";
        points++;
    } else {
        document.getElementById("answer3").style.color = 'red';
        document.getElementById("answer3").innerHTML = "<i class=\"fa fa-times\"></i> Incorrect! The correct answer was: seem";
    }

    if (answer4[0].checked === true && answer4[2].checked === true) {
        document.getElementById("answer4").style.color = 'green';
        document.getElementById("answer4").innerHTML = "<i class=\"fa fa-check\"></i> Correct! The answers were: live & lived";
        points++;
    } else {
        document.getElementById("answer4").style.color = 'red';
        document.getElementById("answer4").innerHTML = "<i class=\"fa fa-times\"></i> Incorrect! The correct answers were: live & lived";
    }

    if (answer5[2].checked === true) {
        document.getElementById("answer5").style.color = 'green';
        document.getElementById("answer5").innerHTML = "<i class=\"fa fa-check\"></i> Correct! The answer was: are on holiday";
        points++;
    } else {
        document.getElementById("answer5").style.color = 'red';
        document.getElementById("answer5").innerHTML = "<i class=\"fa fa-times\"></i> Incorrect! The correct answer was: are on holiday";
    }

    if (answer6.val() === 'from') {
        document.getElementById("answer6").style.color = 'green';
        document.getElementById("answer6").innerHTML = "<i class=\"fa fa-check\"></i> Correct! The answer was: from";
        points++;
    } else {
        document.getElementById("answer6").style.color = 'red';
        document.getElementById("answer6").innerHTML = "<i class=\"fa fa-times\"></i> Incorrect! The correct answer was: from";
    }

    if (points >= 5) {
        document.getElementById("congrats").innerHTML = "Congratulations! You scored higher than 80%! Keep it up!";
    }
    document.getElementById("points").innerHTML = "Total Score: ";
    document.getElementById("score").innerHTML = points;

    $.ajax ({
        type: "GET",
        url: "insertScores.php",
        data: {"points" : $("#score").html()},
        dataType: "json",
        complete: function(data) {
            JSON.stringify(data);
            $("#avg").html(data.responseText);
        },
        error: function(err) {
            alert(err);
        }
    });
}
