<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon_io/favicon-16x16.png">
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
      integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="../assets/dist/style.css">
    <link rel="stylesheet" href="../assets/style.css">
    <title>Document</title>
</head>
<body>
<section class="cust">
    <div class="wel">

        Welcome
        <span>
            <?php 
            require("../../private/log.php");
    
            if(!isset($_SESSION['name'])){
                header("Location:../404.php");
            }
            else{
                echo $_SESSION['name'];
            }
    
            if(isset($_POST['out'])){
                session_unset();
                header("Location:../login.php");
            }
            ?>
        </span>
    </div>
    <form action="" method="post">
        <button type="submit" name="out">
            Log out
        </button>
    </form>
</section>


  
    
        
    <?php
    // include '../reviews.php';
    // include '../card.php';
    include '../products.php';
    include '../footer.php'?>
</body>
</html> 


<?php 
// require '../head.php'
?>

