<?php

function emailValid($boy){
  if(!empty($boy) && filter_var($boy,FILTER_VALIDATE_EMAIL) && (strlen($boy) < 256)){
    return true;
  }
  return false;
}

function Pverify($pass,$pass2){
    if(!empty($pass)){
    if(strlen($pass) < 6){
        return "1";
    }
    elseif($pass == $pass2){
        return true;
    }
}
    return false;
}

function insert($conn,$dbtab,$username,$password,$email){
  $msg = "INSERT INTO $dbtab(username ,email ,pwd) ('$username', '$email', '$password')";

  if(mysqli_query($conn,$msg)){
    return "saved";
  }
  return "something wen't wrong";
}