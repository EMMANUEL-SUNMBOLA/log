<?php
$order = [];
if(isset($_SESSION["name"]) && $_SERVER["REQUEST_METHOD"]){
    for($i ;$i > 6 ; $i++){
        $order[$_SESSION["name"]] = $_POST[$i];
    }
    $rum = fopen("../private/orders.txt","a+");
    // $message = $ord
    // fwrite()
}