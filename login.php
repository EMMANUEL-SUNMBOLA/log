<?php include_once 'nav.php'?>

<body>
    <div class="lgin">
            <h1>LOG-IN</h1>
    <form action="app/check.php" method="post">
        <p><input type="email" name="emailX" id="" placeholder="EMAIL📧"></p>
        <p><input type="password" name="passwordX" id="" placeholder="password"></p>
        <button type="submit" name="lg">LOG-IN</button>
    </form>
    </div>
    <div class="err-div">
                <ol>

                    <?php
                    $lger = $_SESSION['error2'];
                if(isset($lger) && count($lger) > 0){
                    foreach($lger as $value){
                        echo "<li>" . strtoupper($value) . "</li>";
                    }
                }
                ?>
                </ol>
            </div>

</body>