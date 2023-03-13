<?php
    require_once 'functions.php';

if(isset($_POST['lg']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
   $passwordX = $_POST['passwordX'];
   $emailX    = strip_tags($_POST['emailX']);
   $lger = [];

   $myfl   =   fopen('users.txt','r') or die($auth = 'false');
   $data = array();

   while(!feof($myfl)){
      $line = fgets($myfl);
      $user_details =  explode(',,',$line);
      
      $pass = $user_details[4];
      $email = $user_details[2];
        $p = verify_password($passwordX,trim($pass));
        $q = same_email($emailX,$email);

        if(($p && $q) == true){
            $data = [
               'email' => $email,
               'firstname' => $user_details[0],
               'lastname' => $user_details[1]
            ];

            break;
        }elseif($p == false){
         $lger = 'wrong password';
        }elseif($q == false){
         $lger = 'invalid email';
        }
   }
   fclose($myfl);

   if(count($data) > 0){
      // $auth = 'true';
      $_SESSION[''] = '';
      header('Location: /Dashboard.php');
   }else{
      $_SESSION['error2'] = $lger;
      header('Location: /login.php');
   }
}