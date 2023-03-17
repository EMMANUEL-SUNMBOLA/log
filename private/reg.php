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

        if(!Pverify($pwd,$pwd2)){
            $err[] = "check passwords";
        }

        if(!emailValid($email)){
            $err[] = "email not right";
        }
        if(dbverifyE($conn,$dbtab,$email) == "true1"){
            $err[] = "email has been used";
        }

        if(dbverifyU($conn,$dbtab,$username) == "true1"){
            $err[] = "sorry username taken";
        }
        
       if(empty($err)){
        $pwd2 = password_hash($pwd,PASSWORD_DEFAULT);
        insert($conn,$dbtab,$username,$pwd2,$email);
        // fclose($file);
        echo '<div class="errs"> you`ve been registered successfully__<br> <a href="login.php">Login...</a></div>';
        // // header("locatio n:../private/customer.php");

       }
    }
    else{
        $err[] = "something went wrong" . "<br>" . "check the following" . "<br>" . "form method" . "<br>" . "button name";
    }