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