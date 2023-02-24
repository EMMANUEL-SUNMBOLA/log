<?php 
        $err = [];
    if($_SERVER["REQUEST_METHOD"] == 'POST' && isset($_POST["reg"])){
        $username = $_POST["user"];
        $pwd = $_POST["pass"];
        $email = $_POST["email"];

        if(empty($username)){
            $err[] = "username shouldn't be empty";
        }elseif(strlen($username) < 5){
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
       
       $file = fopen("private/text.txt","a+");
       // loop through to check if the username and / or the email are taken
       // we won't check for passwordd because more than 1 person can use a password
       // I think i should check for only gmail 🤔
           while(!feof($file)){
               $lin = fgets($file);
               if($lin == null){
                $lin = "end|of|file";
               }
               $line = explode("|",$lin);
            //    var_dump($line);
               if($username == $line[0]){
                $err[] = "username is taken"; 
               }
               if($email == $line[1]){
                $err[] = "Email has already been used"; 
               }
           }
       if(empty($err)){
        $file = fopen("private/text.txt","a+");
        $pwd2 = password_hash($pwd,PASSWORD_DEFAULT);
        $message = "\n" . $username . "|" . $email . "|" . $pwd2;
        fwrite($file,$message);
        fclose($file);
        echo '<div class="errs"> youv`e been registered successfully <br> <a href="login.php">Login...</a></div>';
        // header("locatio n:../private/customer.php");
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
            <input type="email" placeholder="email" name="email" value="<?php
            if((isset($_POST["reg"])) && (!empty($err))){
              echo $email;
            }?>">
           
            <input type="text" placeholder="username" name="user" value="<?php
            if((isset($_POST["reg"])) && (!empty($err))){
                echo $username;
            }?>" >
            <input type="password" placeholder="password" name="pass"><br>
            <input type="password" placeholder="password" name="pass2"><br>
            <button type="submit" name="reg">submit</button>
        </form>
    </div>
</body>
</html>