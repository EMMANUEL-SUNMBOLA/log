<?php

function emailValid($boy){
  if(filter_var($boy,FILTER_VALIDATE_EMAIL)){
    return true;
  }
  return false;
}

function Pverify($pass,$pass2){
    if(strlen($pass) < 6){
        return "1";
    }
    elseif($pass == $pass2){
        return true;
    }
    return false;
}

function fileH($read){
   $file = fopen("../private/text.txt","$read");
}