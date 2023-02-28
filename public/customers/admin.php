<?php 

require("../../private/log.php");

if(!isset($_SESSION['name'])){
    header("Location:../404.php");
}
else{

    require("../../private/adminhandler.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assets/dist/admin.css">
    <title>ADMIN-PAGE</title>
</head>
<body>
    <?php
        if(isset($_POST["admin_but"]) && !empty($prob)){
                        echo '<div class="err">';
                        foreach($prob as $cellary){
                            echo $cellary;
                        }
                        echo '</div>';
                 }
    ?>
    <nav>
        <ul>
            <li><img src="images/images.jpg" alt=""></li>
        </ul>
        
        <h1>Welcome ADMIN</h1>
    </nav>
    <div class="side">
      <button type="submit">  <i class="fa-solid fa-paintbrush"></i></button>
            <div class="line"></div>
    </div>
    <section>
        <form action="" method="post" enctype="multipart/form-data">
            <h1>Add more products</h1>
            <label for="img">add image</label>
            <input type="file" name="img"  id="" accept="image/*"><br>
            <input type="text" placeholder="PRICE" name="prc"><br>
            <input type="text" placeholder="PRODUCT NAME" name="prdname"><br>
            <input type="text" placeholder="DESCRIPTION" name="desc"><br>
        <button type="submit" name="admin_but">SUBMIT</button>
        </form>
    </section>
</body>
</html>