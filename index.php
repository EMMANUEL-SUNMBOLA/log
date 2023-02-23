<?php 
        $err = [];
    if($_SERVER["REQUEST_METHOD"] == 'POST' && isset($_POST["reg"])){
        $username = $_POST["user"];
        $pwd = $_POST["pass"];
        $email = $_POST["email"];

        if(empty($username)){
            $err[] = "username shouldn't be empty";
        }elseif(strlen($username) <= 7){
            $err[] = "username should be at least 8 characters long";
        }

        if(empty($pwd)){
            $err[] = "please fill password area";
        }
        elseif(strlen($pwd) < 8){
            $err[] = "password too short";
        }

        if(empty($email)){
            $err[] = "email can't be left empty";
        }
        // FILTER_VALIDATE_EMAIL
       elseif(filter_var($email,FILTER_VALIDATE_EMAIL) == false){
        $err[] = "invalid email <br>";
       }
       
       if(empty($err)){
        $pwd2 = password_hash($pwd,PASSWORD_DEFAULT);
        $file = fopen("text.txt","a+");
        $message = $username . "|" . $email . "|" . $pwd2 . "\n";
        fwrite($file,$message);
        fclose($file);
        echo "youv'e been registered successfully";
        header("location:../private/customer.php");
       }
    }
    else{
        $err[] = "something went wrong" . "<br>" . "check the following" . "<br>" . "form method" . "<br>" . "button name";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180" href="favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon_io/favicon-16x16.png">
    <link rel="stylesheet" href="dist/style.css">
    <title>Document</title>
</head>
<body>
    <?php
        if(!empty($err) && isset($_POST["reg"])){
            echo '<div class="errs">';
            foreach($err as $celary){
                echo $celary . "<br>";
            }
            echo "</div>";
        }
    ?>
    
    <div class="formdiv">
        <form action="" method="post">
            <h1>sign up</h1>
            <input type="email" placeholder="email" name="email"><br>
            <input type="text" placeholder="username" name="user"><br>
            <input type="password" placeholder="password" name="pass"><br>
            <button type="submit" name="reg">submit</button>
        </form>
    </div>
</body>
</html>