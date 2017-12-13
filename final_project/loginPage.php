<!DOCTYPE html>
<html>
    <head>
        <title> Solemates Login </title>
        <!-- HEADER TEMPLATE BEGIN -->
        <?php include 'templates/header.php'?>
        <!-- HEADER TEMPLATE END -->

    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3 text-center">
                <h1>Admin Login</h1>
                <hr>
                <form class="form-horizontal" method="POST" action="login.php">
                    <div class="form-group">
                        <label class="control-label col-xs-4" for="password">Username: </label>
                        <div class="col-xs-12 col-md-6">
                            <input class="form-control" type="text" name="username">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-4" for="password">Password: </label>
                        <div class="col-xs-12 col-md-6">
                            <input class="form-control" type="password" name="password">
                        </div>
                    </div>
                    <p>Username: admin</p>
                    <p>Password: secret</p>
                    <hr>
                    <div class="form-group">
                        <div class="col-xs-12 col-md-8 col-md-offset-2">
                            <input class="btn btn-success btn-block" type="submit" name="loginForm" value="Login">
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
        <!-- FOOTER TEMPLATE BEGIN -->
        <?php include 'templates/footer.php'?>
        <!-- FOOTER TEMPLATE END -->
    </body>
</html>