<!DOCTYPE html>
<html>

<head>
    <title> Challenge 4 </title>
</head>

<body>
    Enter the first number: <input type="text" id="numOne" /><br>
    Enter the second number: <input type="text" id="numTwo" /><br>
    <button onclick="compareNumber()" id="compare">Compare</button>

    <h2 id="answer"></h2>
    <h2 id="error"></h2>
</body>

<script>
    var numOne;
    var numTwo;


    function compareNumber() {
        numOne = document.getElementById("numOne").value;
        numTwo = document.getElementById("numTwo").value;

        if (numOne < 1 || numTwo < 1) {
            document.getElementById("error").innerHTML = "Error. Please enter a number larger than 1. ";
            } else if (numOne > 50 || numTwo > 50) {
                document.getElementById("error").innerHTML = "Error. Please enter a number smaller than 50. ";
            } else {
                   if (numOne > numTwo) {
                    document.getElementById("answer").innerHTML = numOne + " is greater than " + numTwo;
                } else if (numTwo > numOne) {
                    document.getElementById("answer").innerHTML = numTwo + " is greater than " + numOne;
                } else {
                    document.getElementById("answer").innerHTML = numOne + " is equal to " + numTwo;
                }
            }

    }
</script>

</html>
