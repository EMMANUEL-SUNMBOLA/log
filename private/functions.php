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
    return true;
  }
  return false;
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
        return true;
      }
    }
    return false;
  }
}
function dbverifyP($conn,$dbtab,$pwd,$userid){
  if(filter_var($userid,FILTER_VALIDATE_EMAIL)){
    $msg = "SELECT pwd FROM $dbtab WHERE email = '$userid";
    $result = $conn -> query($msg);
    $data = $result -> fetch_assoc();
    $savepwd = mysqli_real_escape_string($conn,$pwd);
    if(password_verify($savepwd,$data['pwd'])){
      return true;
    } else{
      return false;
    }
  }else{
    $msg = "SELECT pwd FROM $dbtab WHERE username = '$userid'";
    $result = $conn -> query($msg);

    if($result -> num_rows > 0){
      $data = $result -> fetch_assoc();
      $savepwd = mysqli_real_escape_string($conn,$pwd);
      if(password_verify($savepwd,$data['pwd'])){
        return true;
      } else{
        return false;
      }
    }else{
      return "404";
    }
  }
}
function dbverifyA($conn,$dbtab,$pwd,$userid){
  if(filter_var($userid,FILTER_VALIDATE_EMAIL)){
    $msg = "SELECT password FROM $dbtab WHERE email = '$userid";
    $result = $conn -> query($msg);
    $data = $result -> fetch_assoc();
    $savepwd = mysqli_real_escape_string($conn,$pwd);
    if(password_verify($savepwd,$data['password'])){
      return true;
    } else{
      return false;
    }
  }else{
    $msg = "SELECT password FROM $dbtab WHERE username = '$userid'";
    $result = $conn -> query($msg);

    if($result -> num_rows > 0){
      $data = $result -> fetch_assoc();
      $savepwd = mysqli_real_escape_string($conn,$pwd);
      if(password_verify($savepwd,$data['password'])){
        return true;
      } else{
        return false;
      }
    }else{
      return "404";
    }
  }
}

function insert_post($conn,$dbtab2,$name,$subject,$content,$price){
  $msg = "INSERT INTO $dbtab2 (loc, subject, content, price) VALUES ('$name','$subject', '$content', '$price'";
 
  if(mysqli_query($conn,$msg)){
    return true;
  }
  return false;
}