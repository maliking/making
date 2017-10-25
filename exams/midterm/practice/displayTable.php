<?php
include 'practice_program1.php';

if (isset($_GET["letterToFind"])) {
    if (isset($_GET["tableSize"])) {
        if (isset($_GET["letterToOmit"])) {
            if ($_GET["letterToFind"] === $_GET["letterToOmit"]) {
                echo "<h3 class='error'>The 'Letter To Find' and the 'Letter To Omit' cannot be the same.</h3>";
                die();
            } else {
                $alphabet = range("A", "Z");


            }
        }
    } else {
        echo "<h3 class='error'>Please select a table size.</h3>";
    }
} else {
    echo "<h3 class='error'>Please select a letter to find.</h3>";
}



?>
<!DOCTYPE HTML>
<html>
    <head>
        <title> Find the Letter </title>
    </head>
    <body>
        <hr>
        <h1>Find the Letter: <?=$_GET["letterToFind"]?></h1>
        <h5>Letter Omitted: <?=$_GET["letterToOmit"]?></h5>

        <table>
            <?php
                $tableSize = $_GET["tableSize"];
                $alpha = range("A", "Z");
                shuffle($alpha);

                for ($i = 0 ; $i < ($tableSize*2) ; $i++){
                    $random[$i] = array_rand($alpha, 1);
                }

                for ($row = 0 ; $row < $tableSize ; $row++) {
                    echo "<tr>";
                        for ($col = 0 ; $col < $tableSize ; $col++) {
                            echo "<td>$alpha[$col]</td>";
                        }
                    echo "</tr>";
                }
                echo "<pre>";
                print_r($random);
                echo "</pre>";


            ?>
        </table>









         <table border="1" width="600" style="margin-top: 200px">
    <tbody><tr><th>#</th><th>Task Description</th><th>Points</th></tr>
    <tr style="background-color:#FFC0C0">
      <td>1</td>
      <td>The page includes the basic form elements as in the Program Sample: Dropdown menus, radio buttons, submit button</td>
      <td width="20" align="center">5</td>
    </tr>
    <tr style="background-color:#99E999">
      <td>2</td>
      <td>When submitting the form, a "Find the Letter x" header is displayed, where "x" is the letter selected by the user</td>
      <td width="20" align="center">5</td>
    </tr>
    <tr style="background-color:#99E999">
      <td>3</td>
      <td>When submitting the form, a "Letter to Omit: x" message is displayed, where "x" is the letter to omit, selected by the user</td>
      <td width="20" align="center">5</td>
    </tr>
    <tr style="background-color:#99E999">
      <td>4</td>
      <td>When submitting the form, a table is created and filled with random letters</td>
      <td align="center">5</td>
    </tr>
    <tr style="background-color:#99E999">
      <td>5</td>
      <td>The size of the table corresponds to the one selected by the user </td>
      <td align="center">5</td>
    </tr>
     <tr style="background-color:#99E999">
       <td>6</td>
       <td>The letter selected by the user is shown only once</td>
       <td align="center">10</td>
     </tr>
     <tr style="background-color:#99E999">
       <td>7</td>
       <td>The letter to omit is not shown in the table</td>
       <td align="center">10</td>
     </tr>
      <tr style="background-color:#99E999">
       <td>8</td>
       <td>An error message must be displayed if the "letter to find" and "letter to omit" are the same</td>
       <td align="center">10</td>
     </tr>
      <tr style="background-color:#99E999">
       <td>9</td>
       <td>The letters are shown in the right colors: red, blue, and green </td>
       <td align="center">10</td>
     </tr>
      <tr style="background-color:#99E999">
       <td>10</td>
       <td>At least five CSS rules are included</td>
       <td align="center">5</td>
     </tr>
     <tr style="background-color:#99E999">
      <td>11</td>
      <td>This rubric is properly included AND UPDATED (BONUS)</td>
      <td width="20" align="center">2</td>
    </tr>
     <tr>
      <td></td>
      <td>T O T A L </td>
      <td width="20" align="center"><b></b></td>
    </tr>
  </tbody></table>
    </body>
</html>
