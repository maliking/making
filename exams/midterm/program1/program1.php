<?php

    if ($month == 'jan' || $month == 'dec') {
        $range = range(1,31);
        $numDays = 31;
    } else if ($month == 'feb') {
        $range = range(1,28);
        $numDays = 28;
    } else {
        $range = range(1,30);
        $numDays = 30;
    }

    $cities = array(
        array([
            'Chicago' => 'chicago.png',
            'Hollywood' => 'hollywood.png',
            'Las Vegas' => 'las_vegas.png',
            'New York' => 'ny.png',
            'Washington DC' => 'washington_dc.png',
            'Yosemite' => 'yosemite.png'
            ],[
            'Acapulco' => 'acapulco.png',
            'Cabos' => 'cabos.png',
            'Cancun' => 'cancun.png',
            'Chichenitza' => 'chichenitza.png',
            'Huatulco' => 'hualtulco.png',
            'Mexico City' => 'mexico_city.png'
            ],[
            'Alesund' => 'alesund.png',
            'Bergen' => 'bergen.png',
            'Hammerfest' => 'hammerfest.png',
            'Oslo' => 'oslo.png',
            'Stavanger' => 'stavanger.png',
            'Trondheim' => 'trondheim.png'
            ])
    );


    function createTable($month, $locations, $country, $order) {
        global $range, $numDays, $cities;
        $tableArray = array();
        for ($i = 0; $i < $locations ; $i++) {
            $randomNumber = $range[array_rand($range)];
            $tableArray[] = $randomNumber;
        }

        return $tableArray;

    }

    function showTable () {
        if (isset($_GET["submit"])) {
            $month = $_GET["month"];
            $locations = $_GET["locations"];
            $country = $_GET["country"];
            $order = $_GET["order"];

            echo "<h1>" . $month . " Itinerary</h1>";
            echo "<h3>Visiting " . $locations . " places in " . $country . "</h3>";

            if (!isset($country) || !isset($locations)) {
                echo "<h3>Please enter a country AND number of locations.";
                return;
            }

            $tableArray = createTable($month, $locations, $country, $order);
            $index = 0;

            for ($row = 0 ; $row < 5 ; $row++) {
                echo "<tr>";
                for ($col = 0; $col < 7 ; $col++) {
                    $numToDisplay = $tableArray[$index];
                    echo "<td>" . $numToDisplay . "</td>";
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
        <title>Program 1</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <style>
            table {
                margin-left: auto;
                margin-right: auto;
                margin-top: 300px;
            }
            #rubric {
                margin-top: 300px;
            }
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
            <h3>Select Month: </h3>
            <select name="month">
                <option value="November">November</option>
                <option value="December">December</option>
                <option value="January">January</option>
                <option value="February">February</option>
            </select>
            <h3>Number of Locations: </h3>
            <input type="radio" name="locations" value="3"> Three
            <input type="radio" name="locations" value="4"> Four
            <input type="radio" name="locations" value="5"> Five
            <h3>Country: </h3>
            <select name="country">
                <option value="USA">USA</option>
                <option value="Mexico">Mexico</option>
                <option value="Norway">Norway</option>
            </select>
            <h3>Visit locations in alphabetical order: </h3>
            <input type="radio" name="order" value="a-z"> A-Z
            <input type="radio" name="order" value="z-a"> Z-A <br><br>
            <input type="submit" name="submit">
        </form>
            <table class="table">
                <?=showTable();?>
            </table>


















		    <table class ="table" id="rubric" border="1" width="600">
		    <tbody><tr><th>#</th><th>Task Description</th><th>Points</th></tr>
		    <tr style="background-color:#99E999">
		      <td>1</td>
		      <td>The page includes the form elements as the Program Sample: dropdown menu, radio buttons, etc.</td>
		      <td width="20" align="center">3</td>
		    </tr>
		    <tr style="background-color:#99E999">
		      <td>2</td>
		      <td>Errors are displayed if country or number of locations are not submitted.</td>
		      <td width="20" align="center">5</td>
		    </tr>
		    <tr style="background-color:#99E999">
		      <td>3</td>
		      <td>Header and Subheader are displayed when submitting the form with all data. </td>
		      <td align="center">5</td>
		    </tr>
			<tr style="background-color:#FFC0C0">
		      <td>4</td>
		      <td>A table with days and weeks is displayed when submitting the form</td>
		      <td align="center">10</td>
		    </tr>
		    <tr style="background-color:#FFC0C0">
		      <td>5</td>
		      <td>The number of days in the table correspond to the month selected</td>
		      <td align="center">10</td>
		    </tr>
		    <tr style="background-color:#FFC0C0">
		      <td>6</td>
		      <td>Random images are displayed in random days</td>
		      <td align="center">5</td>
		    </tr>
		    <tr style="background-color:#FFC0C0">
		      <td>7</td>
		      <td>The number of random images correspond to the number of locations and country submitted</td>
		      <td align="center">10</td>
		    </tr>
		    <tr style="background-color:#FFC0C0">
		      <td>8</td>
		      <td>The proper name of the location is displayed below the image (e.g. "New York", "Las Vegas") </td>
		      <td align="center">10</td>
		    </tr>
		    <tr style="background-color:#FFC0C0">
		      <td>9</td>
		      <td>Random locations should be ordered alphabetically, if user checks corresponding radio button (A-Z or Z-A). </td>
		      <td align="center">15</td>
		    </tr>
		    <tr style="background-color:#99E999">
		      <td>10</td>
		      <td>The web page uses Bootstrap and has a nice look. </td>
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
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>