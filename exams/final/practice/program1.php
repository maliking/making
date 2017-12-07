<?php
$re
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Login </title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../../../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Caveat:700|Encode+Sans" rel="stylesheet">

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
                            <input id="password" class="form-control" type="password" name="password">
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-xs-12 col-md-8 col-md-offset-2">
                            <input class="btn btn-success btn-block" type="submit" name="loginForm" value="Login">
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <span id="display"></span>
                    </div>
                </form>
                </div>
            </div>
        </div>
        <script src="../../../bootstrap/js/jquery.min.js"></script>
        <script src="../../../bootstrap/js/bootstrap.min.js"></script>
        <script>
            function processInfo() {
                $.ajax ({
                    type: "POST",
                    url: "matchDB.php",
                    data: { "username": $("#username").val() },
                    dataType: 'json',
                    success: function(data, status) {
                        if (data == false) {
                            alert(data[0]);
                            // $("#display").html("<span id='green'>Last successful login: </span>" + data.username);
                        } else {
                            $("#display").html("<span id='red'>Username is already taken!</span>");
                        }
                    },
                }); // ajax
            } // checkUsername()

            $(document).ready( function(){
                $("#password").change(function(){ processInfo() });
                $("#password").keyup(processInfo);
            });//document.ready
        </script>
    </body>
</html>