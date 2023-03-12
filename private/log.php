<?php
session_start();
$err = [];
    if(($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["log"])){
        require("functions.php");
        $userid = strip_tags($_POST["userid"]);
        $pass = strip_tags($_POST["pass"]);

        if(empty($userid)){
            $err[] = "please fill username or email";
        }
        if(empty($pass)){
            $err[] = "please fill password";
        }

        // if(($userid == "admin") && ($pass == "10000001")){
        //     $_SESSION['name'] == $userid;
        //     header("Location:customers/admin.php");
        // }
        // else
        
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
                            $_SESSION['name'] = $line[0];
                            header("Location:customers/customer.php");
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
                        $_SESSION['name'] = $line[0];
                            header("Location:customers/customer.php");
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
