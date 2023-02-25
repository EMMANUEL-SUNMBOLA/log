<?php
 require("../private/reg.php");
 require("head.php");
 ?>
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
            <input type="email" placeholder="EMAIL" name="email" value="<?php
            if((isset($_POST["reg"])) && (!empty($err))){
              echo $email;
            }?>">
           
            <input type="text" placeholder="USERNAME" name="user" value="<?php
            if((isset($_POST["reg"])) && (!empty($err))){
                echo $username;
            }?>" >
            <input type="password" placeholder="PASSWORD" name="pass"><br>
            <input type="password" placeholder="CONFIRM YOUR PASSWORD" name="pass2"><br>
            <button type="submit" name="reg">submit</button>
            <p> Already have an account ? <a href="login.php">log-in</a></p>
        </form>
    </div>
</body>
</html>