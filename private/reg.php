<?php 
        $err = [];
    if($_SERVER["REQUEST_METHOD"] == 'POST' && isset($_POST["reg"])){
        include("db.php");
        include("functions.php");
        $username = strip_tags($_POST["user"]);
        $pwd = strip_tags($_POST["pass"]);
        $pwd2 = strip_tags($_POST["pass2"]);
        $email = strip_tags($_POST["email"]);

        if(empty($username)){
            $err[] = "username shouldn't be empty";
        }elseif(strlen($username) < 5){
            $err[] = "username should be at least 8 characters long";
        }

        // if(empty($pwd)){
        //     $err[] = "please fill password area";
        // }
        // elseif(strlen($pwd) < 8){
        //     $err[] = "password too short";
        // }
        // elseif($pwd !== $pwd2){
        //     $err[] = "confirm your password";
        // }

        if(!Pverify($pwd,$pwd2)){
            $err[] = "check passwords";
        }

        if(!emailValid($email)){
            // $err[] = "email can't be left empty";
            $err[] = "eemail not right";
        }
        // FILTER_VALIDATE_EMAIL
    //    elseif(filter_var($email,FILTER_VALIDATE_EMAIL) == false){
    //     $err[] = "invalid email <br>";
    //    }
       
    //    $file = fopen("../private/text.txt","a+");
    //    // loop through to check if the username and / or the email are taken
    //    // we won't check for passwordd because more than 1 person can use a password
    //    // I think i should check for only gmail 🤔
    //        while(!feof($file)){
    //            $lin = fgets($file);
    //            if($lin == null){
    //             $lin = "end|of|file";
    //            }
    //            $line = explode("|",$lin);
    //         //    var_dump($line);
    //            if($username == $line[0]){
    //             $err[] = "username is taken"; 
    //            }
    //            if($email == $line[1]){
    //             $err[] = "Email has already been used"; 
    //            }
    //        }
        if(dbverifyE($conn,$dbtab,$email) == "true1"){
            $err[] = "email has been used";
        }

        if(dbverifyU($conn,$dbtab,$username) == "true1"){
            $err[] = "sorry username taken";
        }
        
       if(empty($err)){
        // $file = fopen("../private/text.txt","a+");
        $pwd2 = password_hash($pwd,PASSWORD_DEFAULT);
        // $message = "\n" . $username . "|" . $email . "|" . $pwd2;
        // fwrite($file,$message);
        // fclose($file);
        // echo '<div class="errs"> youv`e been registered successfully <br> <a href="login.php">Login...</a></div>';
        // // header("locatio n:../private/customer.php");

        insert($conn,$dbtab,$username,$pwd2,$email);
       }
    }
    else{
        $err[] = "something went wrong" . "<br>" . "check the following" . "<br>" . "form method" . "<br>" . "button name";
    }