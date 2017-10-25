{"filter":false,"title":"test1.php","tooltip":"/test1.php","undoManager":{"mark":1,"position":1,"stack":[[{"start":{"row":0,"column":0},"end":{"row":119,"column":7},"action":"insert","lines":["<?php","","$letterArray = range(\"A\",\"Z\");","","//Displays the \"letter to find\" and \"letter to omit\" dropdown menus","function lettersDropdown(){","    global $letterArray;","    foreach($letterArray as $letter){","        echo \"<option value='$letter'>$letter</option>\";","    }","}","","//Creates array with all the random letters that will be displayed in the table","function getLetterTable($size,$letterToFind,$letterToOmit){","    global $letterArray;","    ","    $letterTable = array();","    for ($i=0; $i < $size*$size; $i++) {","        do {","          //loops until it gets a random letter different from \"letter to find\" AND \"letter to omit\"","\t\t  $randomLetter = $letterArray[array_rand($letterArray)];","\t\t} while ($randomLetter == $letterToFind || $randomLetter == $letterToOmit);","        $letterTable[] = $randomLetter;","    }","","    //places \"letter to find\" in a random position","    $letterTable[array_rand($letterTable)] = $letterToFind;     ","    ","    return $letterTable;","}","","function displayTable() {","\tif (isset($_GET['submit'])) {","\t\t$letterToFind = $_GET['letterToFind'];","\t\t$letterToOmit = $_GET['letterToOmit'];","\t\t$size         = $_GET['size'];","","        if ($letterToFind == $letterToOmit) {","\t\t\techo \"<br /><br /><strong>Error: Letter to Find MUST Be different from Letter to Omit!</strong>\";","\t\t\treturn;","        }","\t\t","\t\techo \"<hr><h1> Find the letter \" . $letterToFind . \"</h1>\";","\t\techo \"<strong> Letter to Omit: \" . $letterToOmit . \"</strong><br />\";","","        $letterTable = getLetterTable($size,$letterToFind,$letterToOmit);"," \t\techo \"<table border='1' style='margin:0 auto' cellpadding=7>\";"," \t \t$index = 0;","\t\tfor ($rows = 0; $rows < $size; $rows++) {","\t\t\techo \"<tr>\";","\t\t\tfor ($cols = 0; $cols < $size; $cols++) {","\t\t\t   $letterToDisplay = $letterTable[$index];","\t\t\t\tif ($letterToDisplay < 'H') {","\t\t\t\t\t$color=\"red\";","\t\t\t\t} else if ($letterToDisplay < 'P') {","\t\t\t\t\t$color=\"blue\";","\t\t\t\t} else {","\t\t\t\t\t$color=\"green\";","\t\t\t\t}","\t\t\t\techo \"<td style='color:$color'>\" . $letterToDisplay . \"</td>\";","\t\t\t\t$index++;","\t\t\t}//endFor (cols)","\t\t\techo \"</tr>\";","\t\t}//endFor (rows)","\t\techo \"</table>\";\t","\t\t","\t}//endIf (submit)\t","}//endFunction","?>","","<!DOCTYPE html>","<html lang=\"en\">","<head>","  <meta charset=\"utf-8\">","  <title>Midterm Practice - Program 1: Find the Letter</title>","  <style>","\ttd {","\t\tfont-size: 1.8em;","\t}","\t#wrapper {","\t\tmargin: 0 auto;","\t\twidth: 800px;","\t\ttext-align: center;","\t}","  </style>","</head>","","<body>","  <div id=\"wrapper\">","    \t<h3> Find the Letter!</h3>","    \t<form method='get'>","        \t<strong> Select a Letter to Find:</strong>","    \t\t<select name=\"letterToFind\">","    \t\t\t<?=lettersDropdown()?>","    \t\t</select>","    \t\t<br /><br />","    \t\t","    \t\tSelect Table Size:","    \t\t<select name=\"size\">","    \t\t\t<option value=\"6\">6x6</option>","    \t\t\t<option value=\"7\">7x7</option>","    \t\t\t<option value=\"8\">8x8</option>","    \t\t\t<option value=\"9\">9x9</option>","    \t\t\t<option value=\"10\">10x10</option>","    \t\t</select>","    \t\t<br /><br />","    \t\t","    \t\tSelect Letter to Omit:","    \t\t<select name=\"letterToOmit\">","    \t\t\t<?=lettersDropdown()?>","\t\t\t</select>","\t\t\t<br /><br />","\t\t\t<input type=\"submit\" value=\"Create Table\" name=\"submit\" />","\t\t\t","\t\t</form>","\t\t\t","\t\t<?=displayTable() ?>","   </div>","</body>","</html>"],"id":1}],[{"start":{"row":15,"column":0},"end":{"row":15,"column":4},"action":"remove","lines":["    "],"id":2},{"start":{"row":26,"column":59},"end":{"row":26,"column":64},"action":"remove","lines":["     "]},{"start":{"row":27,"column":0},"end":{"row":27,"column":4},"action":"remove","lines":["    "]},{"start":{"row":41,"column":0},"end":{"row":41,"column":2},"action":"remove","lines":["\t\t"]},{"start":{"row":64,"column":18},"end":{"row":64,"column":19},"action":"remove","lines":["\t"]},{"start":{"row":65,"column":0},"end":{"row":65,"column":2},"action":"remove","lines":["\t\t"]},{"start":{"row":66,"column":18},"end":{"row":66,"column":19},"action":"remove","lines":["\t"]},{"start":{"row":96,"column":0},"end":{"row":96,"column":6},"action":"remove","lines":["    \t\t"]},{"start":{"row":106,"column":0},"end":{"row":106,"column":6},"action":"remove","lines":["    \t\t"]},{"start":{"row":113,"column":0},"end":{"row":113,"column":3},"action":"remove","lines":["\t\t\t"]},{"start":{"row":115,"column":0},"end":{"row":115,"column":3},"action":"remove","lines":["\t\t\t"]}]]},"ace":{"folds":[],"scrolltop":525,"scrollleft":0,"selection":{"start":{"row":33,"column":11},"end":{"row":33,"column":11},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":{"row":31,"state":"php-start","mode":"ace/mode/php"}},"timestamp":1508428005585,"hash":"0f802b75eeef3f5e1690c02411eb2688292a87a2"}