<?php

session_start();

define('ADMIN_USERNAME', 'admin');
define('ADMIN_PASSWORD', 'password');

$username = $_POST['username'];
$password = $_POST['password'];

if ($_SESSION['logged_in'] or ($username == ADMIN_USERNAME and $password == ADMIN_PASSWORD)) {
    $_SESSION['logged_in'] = true;
    header("Location: reports.php");
    die();
}

?><html>
    <head>
        <title>Login | Winrock ARCH</title>
        <link type="text/css" href="css/style.css" rel="stylesheet" />
    </head>
    <body>
        <div id="wrapper">
            <div id="header">
                <img class="logo" src="images/winrock_logo_trim.png" />
                <span class="title">Winrock ARCH</span>
                <span class="subtitle winrock-blue"> &nbsp;// Login</span>
                <ul id="navigation"></ul>
            </div>
            <div id="content">
                <form id="login-form" method="post">
                    <div><input name="username" type="text" placeholder="Username" /></div>
                    <div><input name="password" type="password" placeholder="Password" /></div>
                    <div><input type="submit" value="Login" /></div>
                </form>
            </div>
        </div>
    </body>
</html>