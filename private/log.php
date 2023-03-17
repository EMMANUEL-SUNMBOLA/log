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
    if(dbverifyP($conn,$dbtab,$pass,$userid) == false){
        $err[] = "CHECK PASSWORD OR USERNAME";
    }    

    if(empty($err)){
        $_SESSION["name"] = $userid;
        header("Location:customers/customer.php");
    }
}