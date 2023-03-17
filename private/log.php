<?php
session_start();
$err = [];
    if(($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["log"])){
        require("functions.php");
        require("db.php");
        $userid = strip_tags($_POST["userid"]);
        $pass = strip_tags($_POST["pass"]);

        if(empty($userid)){
            $err[] = "please fill username or email";
        }
        if(empty($pass)){
            $err[] = "please fill password";
        }
    //     $pver = dbverifyP($conn,$dbtab,$pass,$userid);
    // if($pver == 1){
    //     header("Location:customers/customer.php");
    // }
    // elseif($pver == 404){
    //     $err[] = "account not found check username or signup";
    // }
    // elseif($pver == 101){
    //     $err[] = "invalid password";
    // }
    // else{
    //     $err[] = "something wen't wrong";
    // }
    
    if(dbverifyP($conn,$dbtab,$pass,$userid) == false){
        $err[] = "CHECK PASSWORD OR USERNAME";
    }    

    if(empty($err)){
        $_SESSION["name"] = $userid;
        header("Location:customers/customer.php");
    }
}