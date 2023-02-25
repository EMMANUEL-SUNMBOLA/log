<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon_io/favicon-16x16.png">
    <link rel="stylesheet" href="../assets/dist/style.css">
    <title>Document</title>
</head>
<body>
<section class="cust">
    Welcome
    <?php 
    require("../../private/log.php");

    if(!isset($_SESSION['name'])){
        header("Location:../login.php");
    }
    else{
        echo $_SESSION['name'];
    }

    if(isset($_POST['out'])){

        session_unset();
        header("Location:login.php");
    }
    ?>
    <form action="" method="post">
        <button type="submit" name="out">
            Log out
        </button>
    </form>
</section>
</body>
</html>