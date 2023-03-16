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
  $msg = "INSERT INTO $dbtab(username ,email ,pwd) VALUES ('$username', '$email', '$password')";

  if(mysqli_query($conn,$msg)){
    return "saved";
  }
  return "something wen't wrong";
}

function dbverifyE($conn,$dbtab,$email){
  $msg = "SELECT email FROM $dbtab";
  $result = $conn -> query($msg);
  if($result -> num_rows > 0){
    while($data = $result -> fetch_assoc()){
      if($data["email"] == $email){
        return "true1";
      }
    }
  }
  return false;
}
function dbverifyU($conn,$dbtab,$username){
  $msg = "SELECT username FROM $dbtab";
  $result = $conn -> query($msg);
  if($result -> num_rows > 0){
    while($data = $result -> fetch_assoc()){
      if($data["username"] == $username){
        return "true1";
      }
    }
    return false;
  }
}
function dbverifyP($conn,$dbtab,$pwd){
  $msg = "SELECT pwd FROM $dbtab";
  $result = $conn -> query($msg);
  if($result -> num_rows > 0){
    while($data = $result -> fetch_assoc()){
      if($data["pwd"] == $pwd){
        return "true1";
      }
      return false;
    }
  }
}