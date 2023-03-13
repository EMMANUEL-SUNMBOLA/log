<?php 

// require_once __DIR__ . '/app/cotnroller.php';

// if(isset($_POST['sp']) && $auth == 'true'){
//     echo 'user ' . strlen($hashedpassword);
// }
// elseif($auth !== 'true'){
//     header('Location: /register.php'); 
// }

?>
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
            <li><a href="index.php">HOME</a></li>
            <li><a href="register.php">SIGN-UP</a></li>
            <li><a href="login.php">LOG-OUT</a></li>
        </ul>
    </nav>
<body>
    Welcome <?=$firstname?>

    <section>
        <div class="box1">
            <h1>
                customer perks
            </h1> 
        </div>
        <div class="box1">
            <h1>
                customer perks
            </h1> 
        </div>
        <div class="box1">
            <h1>
                customer perks
            </h1> 
        </div>
    </section>
</body>
</html>