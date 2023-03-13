<?php
session_start();
$method =   $_SERVER['REQUEST_METHOD'];

if (($method !== 'POST') && (!isset($_POST['sp']))){
    header('location: ../register.php');
}
else{
    // SANITIZING    
    // require '../index.php';
    require_once 'functions.php';
    $firstname  =   wsan(trim($_POST['firstname']));  
    $lastname   =   wsan(trim($_POST['lastname']));
    $email      =   wsan(trim($_POST['email']));
    $phone      =   wsan(trim($_POST['phone']));
    $password   =   $_POST['password'];
    $password1  =   $_POST['password1'];
    $err        =   [];
    
    // firstname validation
    if(isset($firstname) && empty($firstname)){
        $err['firstname'] = 'firstname is required';
        $auth = 'false';
    }
    elseif(isset($firstname) && wval($firstname) == false){
        $err['firstname'] = 'firstname cannot be less than 3 characters';
        $auth = 'false';
    }

    // lastname validation
    if(isset($lastname) && empty($lastname)){
        $err['lastname'] = 'lastname is required';
    }
    elseif(isset($lastname) && wval($lastname) == false){
        $err['lastname'] = 'lastname cannot be less than 3 characters';
        $auth = 'false';
    }
    // password validation
    if(isset($password) && empty($password)){
        $err['password'] = 'password field is required';
        $auth = 'false';
    }
    elseif(isset($password) && plen($password) == false){
        $err['password'] = 'password has to be at least 6 characters long';
        $auth = 'false';
    }
    elseif(isset($password) && ($password !== $password1)){
        $err['password'] = 'password must match';
        $auth = 'false';
    }

    // EMAIL VALIDATION

    if(isset($email) && !emval($email)){
        $err['email'] = 'invalid email';
        $auth = 'false';
    }
    elseif(isset($email) && !elen($email)){
        $err['email'] = 'email cannot be over 225 characters';
        $auth = 'false';
    }

    //  NUMBER VALIDATION

    if(isset($phone) && empty($phone)){
        $err['phone'] = 'phone number is required to complete registeration';
        $auth = 'false';
    }elseif(isset($phone) && numval($phone) == false){
        $err['phone'] = 'invalid phone number';
        $auth = 'false';
    }

    
    if(count($err) == 0 ){
        $myfl   =   fopen('users.txt','a+') or die($auth = 'false');
        $hashedpassword = password_hash($password,PASSWORD_DEFAULT);
        $users    = "$firstname,,$lastname,,$email,,$phone,,$hashedpassword\n";
        fwrite($myfl,$users);
        fclose($myfl);
        $auth = 'true';
        header('Location: /login.php');
        
    }
    elseif(isset($err) && count($err)>0){
        $_SESSION['error'] = $err;
        header('Location: /register.php');
    } 
}