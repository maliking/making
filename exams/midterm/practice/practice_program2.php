<?php
    include '../../../dbConnection.php';
    $dbConn = getDatabaseConnection("midterm");

    function getData() {
        global $dbConn;
        // List all cities/towns that have a population between 50,000 and 80,000
        echo "<h4>List all cities/towns that have a population between 50,000 and 80,000</h4>";
        $sql = "SELECT
                town_name
                FROM mp_town
                WHERE population
                BETWEEN 50000
                AND 80000";
        $stmt = $dbConn -> prepare($sql);
        $stmt -> execute();
        $records = $stmt -> fetchAll();
        foreach ($records as $record) {
            echo $record['town_name'];
        }

        // List all towns along with their county name and population,
        // ordered by population (from biggest to smallest)
        echo "<h4>List all towns along with their county name and population, ordered by population (from biggest to smallest)</h4>";
        $sql = "SELECT mp_town.town_name, mp_county.county_name, mp_town.population
                FROM mp_town
                NATURAL JOIN mp_county
                ORDER BY population
                DESC";
        $stmt = $dbConn -> prepare($sql);
        $stmt -> execute();
        $records = $stmt -> fetchAll();
        echo "<table>";
        echo "<tr>";
        echo "<th>Town</th>";
        echo "<th>County</th>";
        echo "<th>Population</th>";
        echo "</tr>";
        foreach ($records as $record) {
            echo "<tr>";
            echo "<td>" . $record['town_name'] . "</td>";
            echo "<td>" . $record['county_name'] . "</td>";
            echo "<td>" . $record['population'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";

        // List the total population per county
        echo "<h4>List the total population per county</h4>";
        $sql = "SELECT mp_county.county_name, SUM(population) total
                FROM mp_town
                NATURAL JOIN mp_county
                GROUP BY county_name";
        $stmt = $dbConn -> prepare($sql);
        $stmt -> execute();
        $records = $stmt -> fetchAll();
        echo "<table>";
        echo "<tr>";
        echo "<th>County</th>";
        echo "<th>Population</th>";
        echo "</tr>";
        foreach ($records as $record) {
            echo "<tr>";
            echo "<td>" . $record['county_name'] . "</td>";
            echo "<td>" . $record['total'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";

        // List the total population per state
        echo "<h4>List the total population per state</h4>";
        $sql = "SELECT mp_state.state_name, SUM(population) total
                FROM ((mp_town
                INNER JOIN mp_county ON mp_county.county_id = mp_town.county_id)
                INNER JOIN mp_state ON mp_state.state_id = mp_county.state_id)
                GROUP BY state_name";
        $stmt = $dbConn -> prepare($sql);
        $stmt -> execute();
        $records = $stmt -> fetchAll();
        echo "<table>";
        echo "<tr>";
        echo "<th>State</th>";
        echo "<th>Population</th>";
        echo "</tr>";
        foreach ($records as $record) {
            echo "<tr>";
            echo "<td>" . $record['state_name'] . "</td>";
            echo "<td>" . $record['total'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";

        // List the three least populated towns
        echo "<h4>List the three least populated towns</h4>";
        $sql = "SELECT mp_town.town_name, mp_town.population
                FROM mp_town
                ORDER BY population ASC
                LIMIT 3";
        $stmt = $dbConn -> prepare($sql);
        $stmt -> execute();
        $records = $stmt -> fetchAll();
        echo "<table>";
        echo "<tr>";
        echo "<th>Town</th>";
        echo "<th>Population</th>";
        echo "</tr>";
        foreach ($records as $record) {
            echo "<tr>";
            echo "<td>" . $record['town_name'] . "</td>";
            echo "<td>" . $record['population'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";

        // List the counties that do not have a town in the "town" table
        echo "<h4>List the counties that do not have a town in the \"town\" table</h4>";
        $sql = "SELECT county_name FROM mp_county c
                LEFT JOIN mp_town t
                ON c.county_id = t.county_id
                WHERE t.county_id IS NULL";
        $stmt = $dbConn -> prepare($sql);
        $stmt -> execute();
        $records = $stmt -> fetchAll();
        echo "<table>";
        echo "<tr>";
        echo "<th>County</th>";
        echo "</tr>";
        foreach ($records as $record) {
            echo "<tr>";
            echo "<td>" . $record['county_name'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Reports </title>
        <style>
            table {
                margin-left: auto;
                margin-right: auto;
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
    <?=getData();?>

    <table border="1" width="600">
        <tbody><tr><th>#</th><th>Task Description</th><th>Points</th></tr>
            <tr style="background-color:#99E999">
              <td>1</td>
              <td>The report shows all cities/towns that have a population between 50,000 and 80,000</td>
              <td width="20" align="center">10</td>
            </tr>
            <tr style="background-color:#99E999">
              <td>2</td>
              <td>The report shows all towns along with their county name ordered by population (from biggest to smallest)</td>
              <td width="20" align="center">10</td>
            </tr>
            <tr style="background-color:#99E999">
              <td>3</td>
              <td>The report lists the total population per county</td>
              <td width="20" align="center">15</td>
            </tr>
             <tr style="background-color:#99E999">
               <td>4</td>
               <td>The report lists the total population per state</td>
               <td align="center">15</td>
             </tr>
             <tr style="background-color:#99E999">
              <td>5</td>
              <td>The report lists the three least populated towns</td>
              <td width="20" align="center">10</td>
            </tr>
            <tr style="background-color:#99E999">
              <td>6</td>
              <td>List the counties that do not have a town in the "town" table</td>
              <td width="20" align="center">10</td>
            </tr>
             <tr style="background-color:#99E999">
              <td>7</td>
              <td>This rubric is properly included AND UPDATED (BONUS)</td>
              <td width="20" align="center">2</td>
            </tr>
             <tr>
              <td></td>
              <td>T O T A L </td>
              <td width="20" align="center"><b></b></td>
            </tr>
        </tbody>
      </table>

    </body>
</html>
