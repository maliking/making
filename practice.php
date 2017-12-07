<?php
// $letters = array("A","B","C");


// echo "<pre>";
// print_r($letters);
// echo "</pre>";

// $letters[2] = "E";

// echo "<pre>";
// print_r($letters);
// echo "</pre>";

// array_push($letters,"I");

// echo "<pre>";
// print_r($letters);
// echo "</pre>";

// $letters[] = "F";

// echo "<pre>";
// print_r($letters);
// echo "</pre>";

// $message = "Good";
// function displayGreeting() {
//     $greeting = $message . "morning";
//     echo $greeting;
// }

// displayGreeting();

// $letters = array("a", "b", "c", "d", "e");
// function displayLetters () {
//     print_r($letters);
//     if ($letters[0] == "a")
//         echo "The letter is A";
//     else
//         echo "The letter is not an A";
// }
// displayLetters();

// echo $_POST["lName"] . " " . $_POST["fName"];

include 'dbConnection.php';
$conn = getDatabaseConnection();

$sql = "SELECT * FROM department NATURAL JOIN employee";
$stmt = $conn -> prepare($sql);
$stmt -> execute();
$records = $stmt -> fetchAll(PDO::FETCH_ASSOC);

echo "SELECT * FROM department NATURAL JOIN employee";
foreach ($records as $record){
    echo "<pre>";
    print_r($record);
     echo "</pre>";
}

$sql = "SELECT * FROM employee JOIN department ON depId = depId";
$stmt = $conn -> prepare($sql);
$stmt -> execute();
$records = $stmt -> fetchAll(PDO::FETCH_ASSOC);

echo "SELECT * FROM employee JOIN department ON depId";

foreach ($records as $record){
    echo "<pre>";
    print_r($record);
     echo "</pre>";
}
?>

<!--<form type="POST">-->
<!--    <input type="text" name="fName">-->
<!--    <input type="text" name="lName">-->
<!--    <input type="submit">-->
<!--</form>-->