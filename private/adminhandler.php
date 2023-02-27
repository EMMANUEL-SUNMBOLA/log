<?php



if(($_SERVER['REQUEST_METHOD']) && isset($_POST['admin_but'])){

        $desc = strip_tags($_POST["desc"]);
        $price = strip_tags($_POST["prc"]);
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
            $dest = __DIR__ . '/productimages/' . $name;
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
                    $file = fopen("../../private/public.txt","a+");
                    $message =  "\n" . $name . "|" . $price . "|" . $desc;
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

