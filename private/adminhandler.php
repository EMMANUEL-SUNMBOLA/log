<?php


if (($_SERVER['REQUEST_METHOD']) && isset($_POST['admin_but'])) {

    include("functions.php");
    include("db.php");
    $desc = strip_tags($_POST["desc"]);
    $price = strip_tags($_POST["prc"]);
    $prdname = strip_tags($_POST["prdname"]);
    $img = $_FILES["img"];
    $err = $img["error"];
    $size = $img["size"];
    $type = $img["type"];
    $name = $img["name"];
    $tmp = $img["tmp_name"];
    $prob = [];
    // echo $type;

    // to write the price and description of the product
    if (isset($desc) && isset($price) && isset($prdname)) {
        if (duppost($conn, $dbtab2, $name) == false) {
            if (insert_post($conn, $dbtab2, $name, $prdname, $desc, $price)) {
                if (isset($img)) {
                    // to check the file chosen
                    if ($type == "image/jpg" || $type == "image/jpeg" || $type == "image/png" || $type == "image/webp" || $type == "image/gif") {
                        $dest = '../productimages/' . $name;
                        $move = move_uploaded_file($tmp, $dest);
                        if ($err == 0) {
                            $prob[] = 'file uploaded successfully ✔️';
                        } elseif ($err == 1) {
                            $prob[] = 'The uploaded file exceeds the upload_max_filesize directive in php.ini';
                        } elseif ($err == 3) {
                            $prob[] = 'The uploaded file was only partially uploaded';
                        } elseif ($err == 4) {
                            $prob[] = $name . 'No file was uploaded';
                        } elseif ($err == 7) {
                            $prob[] = 'Failed to write file to disk.';
                        }
                        $prob[] = "post uploaded";
                    } else {
                        $prob[] = "something wen't wrong";
                    }
                } else {
                    $prob[] = "please leave no input empty";
                }
            } else {
                $prob[] = "invalid file type : allowed files are png ,jpg ,jpeg ,gif etc";
            }
        } else {
            $prob[] = "duplicate posts not allowed : check file name if error is wrong";
        }
    }

}