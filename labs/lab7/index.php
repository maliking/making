<!DOCTYPE html>
<html>
    <head>
        <title> Lab 7 | Admin Login </title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Saira+Semi+Condensed|Source+Sans+Pro" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3 text-center">
                <h1>Admin Login</h1>
                <hr>
                <form class="form-horizontal" method="POST" action="loginProcess.php">
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

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>