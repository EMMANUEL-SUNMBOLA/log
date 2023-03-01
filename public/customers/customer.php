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

<section class="p-5  text-uppercase" id="products">
      <h1 class="bg-danger text-center">here are some of our products</h1>

      <div class="container bg-warning text-center">
        <div class="row">
          <div class="col">
            <div class="card" style="width: 18rem">
              <img src="../images/img-1.jpg" class="card-img-top" alt="..." />
              <div class="card-body">
                <h5 class="card-title">PINK FLOWER BUSH</h5>
                <p class="card-text">BEST FLOWER TO BUY ON YOYR FIRST DATE</p>
                <a href="login.php" class="pbut"><i class="fa-solid fa-naira-sign"></i>4000</a>
              </div>
            </div>
          </div>

          <div class="col">
            <div class="card" style="width: 18rem">
              <img src="../images/img-2.jpg" class="card-img-top" alt="..." />
              <div class="card-body">
                <h5 class="card-title">amber sunflower bush</h5>
                <p class="card-text">
                  has a very nice fragrance and is very appealing
                </p>
                <a href="login.php" class="pbut"><i class="fa-solid fa-naira-sign"></i>4000</a>
              </div>
            </div>
          </div>

          <div class="col">
            <div class="card" style="width: 18rem">
              <img src="../images/img-3.jpg" class="card-img-top" alt="..." />
              <div class="card-body">
                <h5 class="card-title">red flower bush</h5>
                <p class="card-text">
                  very bright and vibrantcan be gifeted in different occasions
                </p>
                <a href="login.php" class="pbut"><i class="fa-solid fa-naira-sign"></i>4000</a>
              </div>
            </div>
          </div>
        </div>

        <!--    ` SECOND ROW     BEGINS                                              -->
        <div class="row mt-4" id="rw-2">
          <div class="col">
            <div class="card" style="width: 18rem">
              <img src="../images/img-4.jpg" class="card-img-top" alt="..." />
              <div class="card-body">
                <h5 class="card-title">rose bush</h5>
                <p class="card-text">
                  the best han-picked rose sticks from our garden
                </p>
                <a href="login.php" class="pbut"><i class="fa-solid fa-naira-sign"></i>4000</a>
              </div>
            </div>
          </div>

          <div class="col">
            <div class="card" style="width: 18rem">
              <img src="../images/img-5.jpg" class="card-img-top" alt="..." />
              <div class="card-body">
                <h5 class="card-title">white rose</h5>
                <p class="card-text">
                  the best han-picked rose sticks from our garden
                </p>
                <a href="login.php" class="pbut"><i class="fa-solid fa-naira-sign"></i>4000</a>
              </div>
            </div>
          </div>

          <div class="col">
            <div class="card" style="width: 18rem">
              <img src="../images/img-6.jpg" class="card-img-top" alt="..." />
              <div class="card-body">
                <h5 class="card-title">rose bush</h5>
                <p class="card-text">
                  the best han-picked rose sticks from our garden
                </p>
                <a href="login.php" class="pbut"><i class="fa-solid fa-naira-sign"></i>4000</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <img src="../private/productimages/2006043.jpg" alt="">
      <?php
      // require("../../private/productimages");
        $file = fopen("../../private/public.txt","r");
        while(!feof($file)){
            $lin = fgets($file);
            $line = explode("|",$lin);
            echo '<div class="col">';
            echo '<div class="card" style="width:18rem">';
            echo '<img src="../productimages/' . $line[0] . '" alt="' . $line[0] . '" class="card-img-top">';
            echo '<h5 class="card-title">' . $line[1] . '</h5>';
            echo '<p class="card-text">' . $line[2] . '</p>';
            echo '<button class="price"> ' . $line[3] . '</button>';

        }
      ?>
      <img src="../../private/productimages/Screenshot (1).png" alt="">
    </section>
  <?php
    // include '../products.php';
    include '../footer.php'?>
</body>
</html> 


<?php 
// require '../head.php'
?>

