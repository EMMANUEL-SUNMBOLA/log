<?php

class Order{
    private $name;
    private $items = [];
    private $email;
    private $price;

    function TakeOrder(string $name, array $order, $dbTab, $conn){
        $this -> name = $name;
        $this -> items = $order;

        foreach($order as $celery){
            $msg = "INSERT INTO $dbTab(name, orders) VALUES('$name','$celery')";
            return ($conn -> query($msg)) ? true : false;
        }
    } 
}