<?php

class Order{
    public $name;
    private $order;
    function TakeOrder(string $name, array $order, $dbTab, $conn){
        $this -> name = $name;
        $this -> order = $order;

        foreach($order as $celery){
            $msg = "INSERT INTO $dbTab(name, orders) VALUES('$name','$celery')";
            return ($conn -> query($msg)) ? true : false;
        }
    } 
}