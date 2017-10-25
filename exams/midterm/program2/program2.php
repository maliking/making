<?php
include '../../../dbConnection.php';
$dbConn = getDatabaseConnection("midterm");

function getData () {
    global $dbConn;
    // List of all female students (10 points)
    echo "<h4>List of all female students (10 points)</h4>";
    $sql = "SELECT lastName, firstName
            FROM m_students
            WHERE gender='F'
            ORDER BY lastName ASC
            ";
    $stmt = $dbConn -> prepare($sql);
    $stmt -> execute();
    $records = $stmt -> fetchAll();
    echo "<table><tr>";
    echo "<th>Name</th>";
    echo "</tr>";
    foreach ($records as $record) {
        echo "<tr>";
        echo "<td>" . $record['firstName'] . " " . $record['lastName'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";

        // List of students that have assignments with a grade lower than 50 (10 points)

    echo "<h4>List of students that have assignments with a grade lower than 50 (10 points)</h4>";
    $sql = "SELECT m_students.lastName, m_students.firstName, m_gradebook.grade
            FROM m_students
            INNER JOIN m_gradebook ON m_students.studentId = m_gradebook.studentId
            WHERE `grade` <50
            GROUP BY lastName, firstName
            ORDER BY grade ASC
            ";

    $stmt = $dbConn -> prepare($sql);
    $stmt -> execute();
    $records = $stmt -> fetchAll();
    echo "<table><tr>";
    echo "<th>Name</th>";
    echo "<th>Grade</th>";
    echo "</tr>";
    foreach ($records as $record) {
        echo "<tr>";
        echo "<td>" . $record['firstName'] . " " . $record['lastName'] . "</td>";
        echo "<td>" . $record['grade'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";


    // List of assignments that have not been graded (15 points)

    echo "<h4>List of assignments that have not been graded (15 points)</h4>";
    $sql = "SELECT title, dueDate
            FROM m_assignments
            WHERE `dueDate` > '2017-10-19'
            ORDER BY dueDate ASC
            ";

    $stmt = $dbConn -> prepare($sql);
    $stmt -> execute();
    $records = $stmt -> fetchAll();
    echo "<table><tr>";
    echo "<th>Title</th>";
    echo "<th>Due Date</th>";
    echo "</tr>";
    foreach ($records as $record) {
        echo "<tr>";
        echo "<td>" . $record['title'] . "</td>";
        echo "<td>" . $record['dueDate'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";

    // Gradebook (15 points) //Ordered by last name and title.


    echo "<h4>Gradebook (15 points)</h4>";
        $sql = "SELECT m_students.firstName, m_students.lastName, m_assignments.title, m_gradebook.grade
                FROM ((m_students
                INNER JOIN m_gradebook ON m_gradebook.studentId = m_students.studentId)
                INNER JOIN m_assignments ON m_assignments.assignmentId = m_gradebook.assignmentId)
                ORDER BY lastName, title";

    $stmt = $dbConn -> prepare($sql);
    $stmt -> execute();
    $records = $stmt -> fetchAll();
    echo "<table><tr>";
    echo "<th>Name</th>";
    echo "<th>Title</th>";
    echo "<th>Grade</th>";
    echo "</tr>";
    foreach ($records as $record) {
        echo "<tr>";
        echo "<td>" . $record['firstName'] . " " . $record['lastName'] . "</td>";
        echo "<td>" . $record['title'] . "</td>";
        echo "<td>" . $record['grade'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";

    // List of average grade per student (average of the three assignments) (15 points)

    echo "<h4>List of average grade per student (average of the three assignments) (15 points)</h4>";
        $sql = "SELECT m_students.studentId, m_students.firstName, m_students.lastName, m_assignments.title, AVG(m_gradebook.grade) average
                FROM ((m_students
                INNER JOIN m_gradebook ON m_gradebook.studentId = m_students.studentId)
                INNER JOIN m_assignments ON m_assignments.assignmentId = m_gradebook.assignmentId)
                GROUP BY lastName, firstName
                ORDER BY average DESC"
                ;

    $stmt = $dbConn -> prepare($sql);
    $stmt -> execute();
    $records = $stmt -> fetchAll();
    echo "<table><tr>";
    echo "<th>Student Id</th>";
    echo "<th>Name</th>";
    echo "<th>Avg Grade</th>";
    echo "</tr>";
    foreach ($records as $record) {
        echo "<tr>";
        echo "<td>" . $record['studentId'] . "</td>";
        echo "<td>" . $record['firstName'] . " " . $record['lastName'] . "</td>";
        echo "<td>" . $record['average'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Program 2</title>
    </head>
    <body>
        <?=getData()?>


  <table border="1" width="600">
    <tbody><tr><th>#</th><th>Task Description</th><th>Points</th></tr>
    <tr style="background-color:#99E999">
      <td>1</td>
      <td>A report shows all female students ordered by last name, from A to Z</td>
      <td width="20" align="center">10</td>
    </tr>
    <tr style="background-color:#99E999">
      <td>2</td>
      <td>A report shows students  that have  assignments with a grade lower than 50, ordered by grade, in ascending order</td>
      <td width="20" align="center">15</td>
    </tr>
    <tr style="background-color:#99E999">
      <td>3</td>
      <td>A report lists those assignments that have not been graded and their due date, ordered by due date, ascending</td>
      <td width="20" align="center">15</td>
    </tr>
     <tr style="background-color:#99E999">
       <td>4</td>
       <td>A report shows the Gradebook, which includes first name, last name, assignment title, and grade. It should be ordered by last name and assignment title </td>
       <td align="center">15</td>
     </tr>
     <tr style="background-color:#99E999">
      <td>5</td>
      <td>A report lists each student along with his/her average grade, ordered by average grade, from highest to lowest</td>
      <td width="20" align="center">15</td>
    </tr>
     <tr style="background-color:#99E999">
      <td>6</td>
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