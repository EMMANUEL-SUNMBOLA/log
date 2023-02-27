<?php
session_start();
if(($_SERVER["REQUEST_METHOD"]) && (isset($_POST["adminbut"]))){
    $name = $_POST["key"];
    $pass = $_POST["pass"];
    if($pass == 1000001){
        $_SESSION['name'] = 'admin';
        header("Location:customers/admin.php");
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
</body>
</html>