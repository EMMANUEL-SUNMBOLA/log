<?php

$err = [];
    if(($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["log"])){
        $userid = strip_tags($_POST["userid"]);
        $pass = strip_tags($_POST["pass"]);

        if(empty($userid)){
            $err[] = "please fill username or email";
        }
        if(empty($pass)){
            $err[] = "please fill password";
        }
        if(empty($err)){
            if(filter_var($userid,FILTER_VALIDATE_EMAIL) == TRUE){
                $file = fopen("../private/text.txt","r");
                while(!feof($file)){
                    $lin = fgets($file);
                    if($lin == null){
                        $lin = "end|of|file";
                    }
                    $line = explode("|",$lin);
                    if($userid == $line[1]){
                        if(password_verify($pass,$line[2]) == true){
                            header("Location:customers/customer.php?$username");
                        }
                        else{
                            $err[] = "wrong  password";
                        }
                    }
                    else{
                        $err[] = "Inavlid email";
                    }
                }
                fclose($file);
            }
            else{
                $file = fopen("../private/text.txt","r");
                while(!feof($file)){
                    $lin = fgets($file);
                    if($lin == null){
                        $lin = "end|of|file";
                    }
                    $line = explode("|",$lin);
                    if($userid == $line[0]){
                       if(password_verify($pass,$line[2]) == true){
                            header("Location:customers/customer.php?$username");
                       }
                       else{
                        $err[] = "wrong  password";
                       }
                    }
                    else{
                        $err[] = "Inavlid username";
                    }
                }
                fclose($file);
            }
        }
    }
    else{
        $err[] = "something wen't wrong";
    }
