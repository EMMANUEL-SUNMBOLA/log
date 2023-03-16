<?php include_once 'nav.php';
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
?>
<body>
 <section>
    <h1>SIGN-UP 🙄</h1>
        <form action="app/cotnroller.php" method="post">
            <p>
                <input type="text" name="firstname" value="<?php if(isset($_POST['sp'])){echo $firstname;};?>" placeholder="First name" >
                <input type="text" name="lastname" value="<?php if(isset($_POST['sp'])){echo $lastname;};?>" placeholder="Last name" >
            </p>
            <p>
                <input type="email" name="email" id="" placeholder="E-MAIL" >
                <input type="tel" name="phone" id="" placeholder="PHONE NUMBER" >
            </p>
            <p>
                <input type="password" name="password" id="" placeholder="******" >
                <input type="password" name="password1" id="" placeholder="confirm password" >
            </p>
            <p>
                <button type="submit" name="sp">SIGN-UP</button>
            </p>
        </form>
            <div class="err-div">
                <ol>

                    <?php
                    $err = $_SESSION['error'];
                if(isset($err) && count($err) > 0){
                    foreach($err as $value){
                        echo "<li>" . strtoupper($value) . "</li>";
                    }
                }
                if(isset($_GET['msg'])){
                    if($_GET['msg'] == 'suc'){
                        echo 'SIGNUP SUCCESSFUL';
                    }
                }
                ?>
                </ol>
            </div>
        
    </section>
</body>
</html>