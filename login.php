<?php
$err = [];
    if(($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["log"])){
        $userid = $_POST["userid"];
        $pass = $_POST["pass"];

        if(!isset($userid)){
            $err[] = "please fill usernsme or email";
        }
        if(!isset($pass)){
            $err[] = "please fill password";
        }
        if(empty($err)){
            if(filter_var($userid,FILTER_VALIDATE_EMAIL) == TRUE){
                $file = fopen("private/text.txt","r");
                while(!feof($file)){
                    $line = explode("|",$lin);
                    if($userid == $line[1]){
                        if(password_verify($pass,$line[2]) == true){
                            header("Location:customer.php");
                        }
                    }
                }
                fclose($file);
            }
            else{
                $file = fopen("text.txt","r");
                while(!feof($file)){
                    $lin = fgets($file);
                    $line = explode("|",$lin);
                    if($userid == $line[0]){
                       if(password_verify($pass,$line[2]) == true){
                            header("Location:customer.php");
                       }
                    }
                    fclose($file);
                }
            }
        }
    }
    else{
        $err[] = "something wen't wrong";
    }
?>
<?php require("head.php")?>
<body>
<?php
        if(!empty($err) && isset($_POST["log"])){
            echo '<div class="errs">';
            foreach($err as $celary){
                echo $celary . "<br>";
            }
            echo "</div>";
        }
    ?>
    <div class="formdiv">
        <form action="" method="post">
            <h1>Log in</h1>
            <input type="text" placeholder="Email or Username" name="userid"> <br>
            <input type="password" placeholder="password" name="pass"> <br>
            <button type="submit" name="log">Login</button>
            <p>Don't have an account ?<a href="index.php">sign-up</a></p>
        </form>
    </div>
</body>
</html>