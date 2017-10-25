<?php

$letterArray = range("A", "Z");

// creates dropdowns menus for letter selection
function letterDropdown () {
    global $letterArray;
    foreach ($letterArray as $letter) {
        echo "<option value='$letter'>$letter</option>";
    }
}

// creates table with random letters
function createTable($tableSize, $letterToFind, $letterToOmit) {
    global $letterArray;

    $letterTable = array();
    for ($i = 0; $i < ($tableSize*$tableSize); $i++) {
        do {
            $randomLetter = $letterArray[array_rand($letterArray)];
        } while ($randomLetter == $letterToFind || $randomLetter == $letterToOmit);
        $letterTable[] = $randomLetter;
    }

    $letterTable[array_rand($letterTable)] = $letterToFind; // put letter to find in random spot
    return $letterTable;
}

function showTable() {
    if (isset($_GET["submit"])) {

    $letterToFind = $_GET["letterToFind"];
    $letterToOmit = $_GET["letterToOmit"];
    $tableSize = $_GET["tableSize"];

    if ($letterToFind == $letterToOmit) {
        echo "<h3 class='error'>The 'Letter To Find' and the 'Letter To Omit' cannot be the same.</h3>";
        return;
    }

    $letterTable = createTable($tableSize, $letterToFind, $letterToOmit);
    $index = 0;

    for ($row = 0 ; $row < $tableSize ; $row++) {
        echo "<tr>";
            for ($col = 0 ; $col < $tableSize ; $col++) {
                $letterToDisplay = $letterTable[$index];
                if ($letterToDisplay < 'H') {
                    $color = "red";
                } else if ($letterToDisplay < 'P') {
                    $color = "blue";
                } else {
                    $color = "green";
                }

                echo "<td style='color:$color'>" . $letterToDisplay . "</td>";
                $index++;
            }
        echo "</tr>";
    }

}


}




?>

<!DOCTYPE html>
<html>
    <head>
        <title> Find the Letter </title>
        <style>
            body {
                text-align: center;
            }
            table {
                margin-left: auto;
                margin-right: auto;

            }
            table,th,td {
                border: 1px solid black;
            }
            th,td {
                padding: 20px;
            }
        </style>
    </head>
    <body>
        <form method="get">
            <h3>Select a Letter to Find: </h3>
            <select name="letterToFind">
                <?=letterDropdown();?>
            </select>
            <h3>Select a Table Size: </h3>
            <select name="tableSize">
                <?php
                $number = range("6", "10");
                for ($i = 0; $i < 5 ; $i++) {
                    echo "<option value='$number[$i]'>$number[$i]" . "x" . "$number[$i]</option>";
                }
                ?>
            </select>
            <h3>Select a Letter to Omit: </h3>
            <select name="letterToOmit">
                <?=letterDropdown();?>
            </select>
            <input type="submit" name="submit">
        </form>

        <table>
            <?=showTable();?>

        </table>



    </body>
</html>