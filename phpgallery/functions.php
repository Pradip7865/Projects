<?php
function pdo_connect_mysql() {
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'phpgallery';
    try {
    	return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $exception) {

    	exit('Failed to connect to database!');
    }
}

function template_header($title) {
    echo <<<EOT
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <title>$title</title>
            <link href="style.css" rel="stylesheet" type="text/css">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
            <style>
            @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            button a{
                color: #6665ee;
                font-weight: 400;
            }
            button a:hover{
                text-decoration: none;
            }
            </style>

        </head>
        <body>
        <nav class="navtop">
            <div>
                <h1>Gallery</h1>
                <a href="home.php"><i class="fas fa-image"></i>Gallery</a>
                <button type="button" class="btn btn-light"><a href="logout-user.php">Logout</a></button>
            </div>
        </nav>
    EOT;
    }

function template_footer() {
    echo <<<EOT
        </body>
    </html>
    EOT;
    }
    ?>