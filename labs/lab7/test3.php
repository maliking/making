<?php


 if (isset($_GET['addForm'])) { //checks if form was submitted

     //echo "Form was submitted!";
     INSERT INTO `q_author` (`authorId`, `firstName`, `lastName`, `gender`, `dob`, `dod`, `profession`, `country`, `picture`, `biography`) VALUES (NULL, 'a', 'a', 'm', '2017-10-01', '2017-10-02', 'a', 'a', 'a', 'a');
     $sql =

 }


?>

<!DOCTYPE html>
<html>
    <head>
        <title> Adding New Author</title>
    </head>
    <body>

        <h1> Add New Author </h1>

        <fieldset>

            <legend> Adding New Author </legend>

            <form>

                First Name: <input type="text" name="firstName"/> <br />
                Last Name: <input type="text" name="lastName"/> <br />
                Gender: <input type="radio" name="gender" value="F"
                            id="genderF"/><label for="genderF"></label>Female
                         <input type="radio" name="gender" value="M"
                            id="genderM"/><label for="genderF"></label>Male <br />
                Birth Date: <input type="date" name="dob"/><br />
                Death Date: <input type="date" name="dob"/><br />
                Profession: <input type="text" name="profession"/><br />
                Country: <select name="country">
                            <option>USA</option>
                            <option>Germany</option>
                            <option>China</option>
                            <option>India</option>
                        </select><br />
                Picture URL: <input type="text" name="picture"/>   <br>
                Biography: <br /> <textarea name="biography" cols="55" rows="5"></textarea><br>
                <input type="submit" value="Add Author" name="addForm">
            </form>

        </fieldset>
    </body>
</html>