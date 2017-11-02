<?php

session_start();

if (!isset($_SESSION["username"])) {
    header("Location: index.php");
}

include '../../dbConnection.php';
$conn = getDatabaseConnection();

function getAuthorInfo() {
    global $conn;

    $sql = "SELECT *
            FROM q_author
            WHERE authorId = " . $_GET["authorId"];

    $stmt = $conn -> prepare($sql);
    $stmt = execute($np);
    $record = $stmt -> fetch(PDO::FETCH_ASSOC);
    return $record;
}

if (isset($_GET["updateForm"])) {
    $sql = "UPDATE q_author SET
                firstName = :fName,
                lastNAme = :lName,
                gender = :gender
            WHERE authorId = :authorId";
    $np = array();
    $np[":fName"] = $_GET["firstName"];
    $np[":lName"] = $_GET["lastName"];
    $np[":gender"] = $_GET["gender"];
    $np[":authorId"] = $_GET["authorId"];
    $stmt = $conn -> prepare($sql);
    $stmt -> execute($np);
    echo "Record was updated!";
}

if (isset($_GET["authorId"])) {
    $authorInfo = getAuthorInfo();
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Update Author Info </title>
    </head>
    <body>
        <h1>Updating Author Info</h1>

        <fieldset>
            <legend>Update Author</legend>
            <form>
                <input type="hidden" name="authorId" value=" <?=$authorInfo["authorId"]?> ">
                First Name: <input type="text" name="firstName" value=" <?=$authorInfo["firstName"]?> "> <br>
                Last Name: <input type="text" name="lastName" value="<?=$authorInfo["lastName"]?>" /> <br>
                Gender: <input type="radio" name="gender" value="F" id="genderF"
                    <?php
                    if ($authorInfo["gender"] == "F") {
                        echo " checked";
                    }
                    ?> >
                    <label for="genderF">Female</label>
                    <input type="radio" name="gender" value="F"
                    <?=($authorInfo["gender"] == "F") ? " checked":"" ?>
                    id="genderM" >
                    <label for="genderM">Male</label>
                    <input type="radio" name="gender" value="M"
                    <?=($authorInfo["gender"] == "M") ? " checked":"" ?>
                    id="genderM" >

                    <br>
                    Birth Date: <input type="date" name="dob" value="<?=$authorInfo["dob"]?>"> <br>
                    Death Date: <input type="date" name="dod" value="<?=$authorInfo["dod"]?>"> <br>
                    Profession: <input type="text" name="profession" value="<?=$authorInfo["profession"]?> ">
                    <br>
                    Country:
                    <select name="country">
                        <option value="USA">USA</option>
                        <option value="Germany">Germany</option>
                        <option value="China">China</option>
                        <option value="India">India</option>
                    </select>
                    <br>
                    Picture URL: <input type="text" name="picture" value="<?=$authorInfo["picture"]?>">
                    <br>
                    Biography:
                    <br>
                    <textarea name="biography" cols="55" rows="5">
                        <?=$authorInfo["biography"]?>
                    </textarea>
                    <br>
                    <input type="submit" value="Update Author" name="updateForm">

            </form>
        </fieldset>
    </body>
</html>