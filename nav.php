<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/dist/style.css">
    <title>Document</title>
</head>
<nav>
        <ul>
            <li class="<?php if($_SERVER['REQUEST_URI'] == '/index.php'){echo 'blue';}?>" ><a href="index.php">HOME</a></li>
            <li class="<?php if($_SERVER['REQUEST_URI'] == '/register.php'){echo 'blue';}?>" ><a href="register.php">SIGN-UP</a></li>
            <li><a href="login.php">LOG-IN</a></li>
        </ul>
    </nav>