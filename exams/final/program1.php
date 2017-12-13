<!DOCTYPE html>
<html>
    <head>
        <title> HW 5 | Login </title>
        <meta charset="utf-8" />
        <script src="../../bootstrap/js/jquery.min.js"></script>
        <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
        <script src="../../bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
        <link href="https://fonts.googleapis.com/css?family=Coustard|Source+Sans+Pro" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3 text-center">
                <h1>Admin Login</h1>
                <hr>
                <form class="form-horizontal" method="POST" action="login.php">
                    <div class="form-group">
                        <label class="control-label col-xs-2" for="password">Username: </label>
                        <div class="col-xs-10">
                            <input class="form-control" type="text" name="username">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-2" for="password">Password: </label>
                        <div class="col-xs-10">
                            <input class="form-control" type="password" name="password">
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <input class="btn btn-success btn-block" type="submit" name="loginForm" value="Login">
                    </div>
                </form>
                </div>
            </div>
        </div>
    </body>
</html>
  <table border="1" width="600">
    <tbody><tr><th>#</th><th>Task Description</th><th>Points</th></tr>
     <tr style="background-color:#FFC0C0">
      <td>1</td>
      <td>The program includes a login form with username and password elements.</td>
      <td width="20" align="center">3</td>
     </tr>
     <tr style="background-color:#FFC0C0">
      <td>2</td>
      <td>After typing the username, the number of days left to change the password is shown in orange if the value of daysLeftPwdChange is between 1 and 15</td>
      <td width="20" align="center">7</td>
    </tr>
     <tr style="background-color:#FFC0C0">
      <td>3</td>
      <td>After typing the username, the right error message is shown in red if the value of daysLeftPwdChange is 0</td>
      <td width="20" align="center">7</td>
    </tr>
     <tr style="background-color:#FFC0C0">
      <td>4</td>
      <td>After typing the username, the right error message is shown in red if the value of failedAttempts is 3</td>
      <td width="20" align="center">7</td>
    </tr>
     <tr style="background-color:#FFC0C0">
      <td>5</td>
      <td>After typing the username, the Submit button should be disabled/hidden if an error message is shown in red </td>
      <td width="20" align="center">3</td>
    </tr>

     <tr style="background-color:#FFC0C0">
      <td>6</td>
      <td>Validate that the username is not left blank in order to submit the form, using JavaScript</td>
      <td width="20" align="center">5</td>
    </tr>

     <tr style="background-color:#FFC0C0">
      <td>7</td>
      <td>Increase the value of "failedAttempts" if users type the wrong password for a specific username</td>
      <td width="20" align="center">10</td>
    </tr>

     <tr style="background-color:#99E999">
      <td>8</td>
      <td>This rubric is properly included AND UPDATED</td>
      <td width="20" align="center">2</td>
    </tr>
     <tr>
      <td></td>
      <td>T O T A L </td>
      <td width="20" align="center">&nbsp;</td>
    </tr>
  </tbody></table>