<?php
session_start();
if(($_SERVER["REQUEST_METHOD"]) && (isset($_POST["adminbut"]))){

    include("../private/db.php");
    include("../private/functions.php");
    $admin = $_POST["key"];
    $pass = $_POST["pass"];

    if(empty($admin)){
        $issues[] = "please fill admin key field";
    }
    if(empty($pass)){
        $issues[] = "please fill password field";
    }
    if(dbverifyU($conn,$dbtab3,$admin) == true){
        $_SESSION['name'] = 'admin';
        if(dbverifyA($conn,$dbtab3,$pass,$admin)){
            header("Location:customers/admin.php");
        }else{
            $issues[] = "invalid password chief";
        }
    }else{
        $issues[] = "invalid username pls signup for admin program";
    }
}

?>

<?php
    require("head2.php");
?>
<body>
    <div class="formdiv">
        <form action="" method="post">
            <h1>ADMIN</h1>
            <input type="text" placeholder="adminkey" name="key"><br>
            <input type="password" placeholder="password" name="pass"><br>
            <button name="adminbut" type="submit">Login</button>
        </form>
    </div>
    <?php
        if(isset($_POST["adminbut"]) && !empty($issues)){
            echo '<div class="errs">';
            foreach($issues as $cellary){
                echo $cellary;
            }
            echo '</div>';
        }
    ?>
</body>
</html>