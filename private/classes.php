<?php

// class Order{
//     private $name;
//     private $items = [];
//     private $email;
//     private $price;

//     function TakeOrder(string $name, array $order, $dbTab, $conn){
//         $this -> name = $name;
//         $this -> items = $order;

//         foreach($order as $celery){
//             $msg = "INSERT INTO $dbTab(name, orders) VALUES('$name','$celery')";
//             return ($conn -> query($msg)) ? true : false;
//         }
//     } 
// }

class Order {
    private $customerName;
    private $customerEmail;
    private $items = array();
    private $totalPrice;

    public function __construct($customerName, $customerEmail) {
        $this->customerName = $customerName;
        $this->customerEmail = $customerEmail;
    }

    public function addItem($name, $price) {
        $this->items[] = array('name' => $name, 'price' => $price);
        $this->totalPrice += $price;
    }

    public function getItems() {
        return $this->items;
    }

    public function getTotalPrice() {
        return $this->totalPrice;
    }

    public function sendEmail() {
        // Code to send email to customer goes here
    }
}
