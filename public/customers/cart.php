<?php
// session
include("../../private/orders.php")

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=7"> -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cart</title>
</head>
<body>
    <?php echo (isset($_SESSION["name"])) ? $_SESSION["name"] : false ?>
    <h1>hello</h1>
</body>
</html>