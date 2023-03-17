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
/**
 * Summary of dbverifyP
 * @param mixed $conn
 * @param mixed $dbtab
 * @param mixed $pwd
 * @param mixed $username
 * @return int
 */
// function dbverifyP($conn,$dbtab,$pwd,$userid){
//   $end = '';
//     if(filter_var($userid,FILTER_VALIDATE_EMAIL)){
//     $msg = "SELECT * FROM $dbtab WHERE email = '$userid";
//     $result = $conn -> query($msg);
//     if($result -> num_rows > 0){
//       $data = $result -> fetch_assoc();
//       // while($data = $result -> fetch_assoc()){
//         if($data["email"] == $userid){
//           if(password_verify($pwd,$data['pwd'])){
//             $end = 1;
//           }
//           else{
//             $end = 101;
//           }
//         }else{
//           $end = 404;
//         }
//       // }
//     }
//   }else{
//     $msg = "SELECT * FROM  $dbtab WHERE username = '$userid'";
//     $result = $conn -> query($msg);
//     if($result -> num_rows > 0){

//     }
//   }
//   return $end;
// }

function dbverifyP($conn,$dbtab,$pwd,$userid){
  if(filter_var($userid,FILTER_VALIDATE_EMAIL)){
    $msg = "SELECT * FROM $dbtab WHERE email = '$userid";
    $result = $conn -> query($msg);
    $data = $result -> fetch_assoc();
    if(password_verify($pwd,$data['pwd']) == true){
      return true;
    } else{
      return false;
    }
  }else{
    $msg = "SELECT * FROM $dbtab WHERE username = '$userid'";
    $result = $conn -> query($msg);
    $data = $result -> fetch_assoc();
    foreach($data as $key => $value){
    
    if(password_verify($pwd,$data['pwd']) == true){
      return true;
    } else{
      return false;
    }
  }
  }
    return false;
  
}

// function vhmc($conn,$dbtab,$id){
//   $msg = "SELECT * FROM $dbtab WHERE id = '$id'";
//   $result = $conn -> query($msg);
//   $data = $result -> fetch_assoc();
//   foreach ($data as $key => $value) {
//       # code...
//       echo $key . '->' . $value;
//   }

// }