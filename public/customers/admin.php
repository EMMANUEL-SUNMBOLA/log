<?php
    if(($_SERVER['REQUEST_METHOD']) && isset($_POST['admin_but'])){

        $desc = $_POST["desc"];
        $price = $_POST["prc"];
        $img = $_FILES["img"]; 
        $err =  $img["error"];
        $size = $img["size"];
        $type = $img["type"];
        $name = $img["name"];
        $tmp = $img["tmp_name"];
        $prob = [];
        // echo $type;
        if(isset($img)){
            // to check the file chose
        if($type == "image/jpg" || $type == "image/jpeg" || $type == "image/png" || $type == "image/webp" || $type == "image/gif"){
            $dest = __DIR__ . '/images/' . $name;
            $move = move_uploaded_file($tmp,$dest);
            if($err == 0){
                $prob[] = 'file uploaded successfully ✔️';
            }elseif($err == 1){
                    $prob[] = 'The uploaded file exceeds the upload_max_filesize directive in php.ini';
                    // $co[] = $name;
                }
                elseif($err == 3){
                    echo 'The uploaded file was only partially uploaded';
                    $prob[] = $name;
                    }
                elseif($err == 4){
                    $prob[] = $name . 'No file was uploaded';
                    }
                elseif($err == 7){
                    echo 'Failed to write file to disk.';
                    $prob[] = $name;
                }
                // to write the price and description of the product
                if( isset($desc) && isset($price) ){
                    $file = fopen("public.txt","a+");
                    $message = "\n" . $name . "|" . $price . "|" . $desc;
                    fwrite($file,$message);
                    fclose($file);
                }
                else{
                    $prob[] = "please leave no input empty";
                }
            }
            else{
                $prob[] = "invalid file type " . "<br>" . "allowed files are png ,jpg ,jpeg ,gif etc";
            }
        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="dist/style.css">
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
            <input type="text" placeholder="DESCRIPTION" name="desc"><br>
        <button type="submit" name="admin_but">SUBMIT</button>
        </form>
    </section>
</body>
</html>