<?php

function wsan(string $value){
    return strip_tags(trim($value));
}

function wval(string $value){
    if (strlen($value) < 3){
        return false;
    }
    return true;
}

function plen(string $value){
    if(strlen($value) < 6){
        return false;
    }
    return true;
}

function emval(string $value){
    return filter_var($value,FILTER_VALIDATE_EMAIL);
}

function elen(string $value){
        if(strlen($value) > 225){
            return false;
        }
        return true;
}

function numval( $value){

    if((str_starts_with($value,'0')) && (strlen($value) == 11 )){
        return true;
    }
    elseif(str_starts_with($value,'+234') && strlen($value) == 15 ){
        return true;
    }
    elseif(str_starts_with($value,'+234') && strlen($value) == 14 ){
        return true;
    }
        return false;
    
}

// verification for login 
function verify_password(string $a,$b){
    if(password_verify($a,$b) == true){
        return true;
    }
    return false;
}

function same_email(string $a,$b){
    if($a == $b){
        return true;
    }
    return false;
}
