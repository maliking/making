
<!DOCTYPE html>
<html>
    <head>
        <title>Cards</title>
        <link href="https://fonts.googleapis.com/css?family=Baloo+Tammudu" rel="stylesheet">
        <style>

            body {
                font-family: 'Baloo Tammudu', sans-serif;
            }
            h2 {
                text-align: center;
                color: green;
            }

            h1 {
                text-align: center;
                text-
            }
            #left {
                float: left;
                margin-left: 23px;
            }

            #right {
                float: right;
                margin-right: 10px;
            }
            div {
                margin-left: auto;
                margin-right: auto;
                display: block;
                width: 200px;

            }

            img {
                margin-left: auto;
                margin-right: auto;
                display: inline-block;
                padding-left: 20px;
            }
        </style>
    </head>
    <body>
        <h1>Random Card Game</h1>
        <div id="content">
            <?php include 'functions.php'; ?>
            <?php
                play();
            ?>
        </div>
    </body>
</html>