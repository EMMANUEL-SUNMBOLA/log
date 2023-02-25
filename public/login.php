<?php
 require("../private/log.php"); 
 require("head.php");
 ?>
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
            <input type="password" placeholder="PASSWORD" name="pass"> <br>
            <button type="submit" name="log">Login</button>
            <p>Don't have an account ?<a href="index.php">sign-up</a></p>
        </form>
    </div>
</body>
</html>